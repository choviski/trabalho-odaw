<?php

namespace App\Http\Controllers;

use App\Actions\AttachmentAction;
use App\Enums\RoleEnum;
use App\Models\Course;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function createGroup(Request $request)
    {
        $attachment = AttachmentAction::createAttachment($request->file('image'), 'group');
        $user = $request->session()->get('authenticatedUser');

        $newGroup = Group::create($request->except('image'));

        $newGroup->attachments()->sync($attachment->id);
        $newGroup->participants()->sync([
            $user->id => ['role_id' => Role::where('name', RoleEnum::ADMIN)->first()->id]
        ]);

        $newGroup->update([
            'participants_count' => 1
        ]);

        $newUser = User::find($user->id);
        $request->session()->put('authenticatedUser', $newUser);
        return redirect()->route('timeline');
    }

    public function listGroups(Request $request)
    {
        $groups = Group::all();
        $courses = Course::all();
        $user = $request->session()->get('authenticatedUser');

        return view('timeline.group-list')->with([
            'groups' => $groups,
            'user' => $user,
            'courses' => $courses
        ]);
    }

    public function enterInGroup(string $id, Request $request)
    {
        $user = $request->session()->get('authenticatedUser');
        $group = Group::find($id);

        $userIsInGroup = $group->participants->contains($user->id);

        if ($userIsInGroup) {
            $group->participants()->detach($user->id);
            $group->participants_count--;
        } else {
            $group->participants()->attach($user->id, ['role_id' => Role::where('name', RoleEnum::USER)->first()->id]);
            $group->participants_count++;
        }

        $group->save();

        $request->session()->put('authenticatedUser', User::find($user->id));

        return redirect()->route('grupos');
    }

    public function deleteGroup(string $id)
    {
        $group = Group::find($id);
        $group->participants()->detach();
        $group->publications()->delete();
        $group->delete();

        return redirect()->route('grupos');
    }

    public function getGroupData($id)
    {
        return Group::find($id);
    }

    public function editGroup(Request $request)
    {
        if ($request->file('image_edit')) {
            $attachment = AttachmentAction::createAttachment($request->file('image_edit'), 'group');
        }

        Group::where('id', $request->group_id_edit)->update([
            'name' => $request->name_edit,
            'course_id' => $request->course_id_edit,
            'user_id' => $request->user_id_edit,
            'description' => $request->description_edit,
            'background_color' => $request->background_color_edit
        ]);

        if ($request->file('image_edit')) {
            $newGroup = Group::find($request->group_id_edit);
            $newGroup->attachments()->sync($attachment->id);
        }

        return redirect()->route('grupos');
    }
}
