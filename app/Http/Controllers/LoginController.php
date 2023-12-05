<?php

namespace App\Http\Controllers;

use App\Actions\AttachmentAction;
use App\Enums\RoleEnum;
use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function validateUser(Request $request)
    {
        $user = User::where('login', $request->login)->first();

        if (!$user) {
            $request->session()->flash("mensagem", "Usuario ou senha incorretos");
            return redirect()->back();
        }

        if ($user->password == $request->password) {
            $request->session()->put('authenticatedUser', $user);
            return redirect()->route('timeline');
        }

        $request->session()->flash("mensagem", "Usuario ou senha incorretos");
        return redirect()->back();
    }

    public function getNewUserView(): View
    {
        $courses = Course::all();
        $roleId = Role::where('name', RoleEnum::USER)->first()->id;
        return view('login.createNewUser')->with(['courses' => $courses, 'roleId' => $roleId]);
    }

    public function storeUser(Request $request)
    {
        $attachment = AttachmentAction::createAttachment($request->file('image'), 'user');

        $newUser = User::create($request->except('image'));
        $newUser->attachments()->sync($attachment->id);

        return redirect()->route('welcome');
    }


    public function logOut(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('welcome');
    }
}
