<?php

namespace App\Http\Controllers;

use App\Actions\AttachmentAction;
use App\Enums\RoleEnum;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Group;
use App\Models\Publication;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function createPublication(Request $request)
    {
        $attachment = AttachmentAction::createAttachment($request->file('imagePublication'), 'publication');
        $user = $request->session()->get('authenticatedUser');

        $newPublication = Publication::create([
            'content' => $request['content'],
            'group_id' => $request->group_id,
            'up_vote_count' => 0,
            'down_vote_count' => 0,
            'user_id' => $user->id,
        ]);

        $newPublication->attachments()->sync($attachment->id);

        $newUser = User::find($user->id);
        $request->session()->put('authenticatedUser', $newUser);

        return redirect()->route('timeline');
    }

    public function deletePublication($id)
    {
        Publication::destroy($id);

        return redirect()->route('timeline');
    }

    public function like(string $id, Request $request)
    {

        $user = $request->session()->get('authenticatedUser');
        $publication = Publication::find($id);

        $userLikedPublication = $user->likedPublications->contains($publication->id);

        if ($userLikedPublication) {
            $user->likedPublications()->detach($publication->id);
            $publication->up_vote_count--;
        } else {
            $user->likedPublications()->attach($publication->id);
            $publication->up_vote_count++;
        }

        $publication->save();

        $request->session()->put('authenticatedUser', User::find($user->id));

        return redirect()->route('timeline');
    }

    public function myPublications(Request $request)
    {

        $user = $request->session()->get('authenticatedUser');
        $courses = Course::all();
        $publications = Publication::where('user_id', $user->id)->get();

        return view('timeline.my-publications')
            ->with([
                'publications' => $publications,
                'courses' => $courses,
                'user' => $user
            ]);
    }

    public function likedPublications(Request $request)
    {

        $user = $request->session()->get('authenticatedUser');
        $courses = Course::all();
        $publications = $user->likedPublications;

        return view('timeline.liked-publications')
            ->with([
                'publications' => $publications,
                'courses' => $courses,
                'user' => $user
            ]);
    }

    public function createComment(Request $request)
    {
        Comment::create($request->all());
        return redirect()->route('timeline');
    }


    public function filterByTerm(Request $request)
    {
        $user = $request->session()->get('authenticatedUser');
        $courses = Course::all();
        $term = $request->term;

        $publications = Publication::where('content', 'like', "%$term%")
            ->orWhereHas('group', fn($group) => $group->where('name', 'like', "%$term%"))
            ->orWhereHas('userCreator', fn($user) => $user->where('name', 'like', "%$term%"))
            ->get();

        return view('timeline.index')
            ->with([
                'publications' => $publications,
                'courses' => $courses,
                'user' => $user
            ]);
    }
}
