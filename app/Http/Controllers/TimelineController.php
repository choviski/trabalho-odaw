<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Publication;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function listPublications(Request $request)
    {
        $user = $request->session()->get('authenticatedUser');
        $courses = Course::all();
        $allPublications = Publication::whereIn('group_id', $user->groups->pluck('id')->toArray())
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('timeline.index')
            ->with([
                'publications' => $allPublications,
                'courses' => $courses,
                'user' => $user
            ]);
    }
}
