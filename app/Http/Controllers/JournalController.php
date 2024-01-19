<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Journal;


class JournalController extends Controller
{
    function index()
    {
        $user = Auth::user();

        if ($user->isTeacher()) {
            $journals = $user->userable->journals()->with('group')->with('subject')->get(); //->sortBy('group.title');
        } elseif ($user->isStudent()) {
            $journals = $user->userable->group->journals()->with('subject')->get(); //->sortBy('subject.subject_name');
        } else {
            $journals = array();
        }
        return response()->json($journals);
    }

    function show(Journal $journal)
    {
        $user = Auth::user();


        if ($journal == null)
            return response()->json([], 404);
        $journal->lessons;
        $journal->subject;
        if ($user->isTeacher()) {
            if ($journal->teacher_id == $user->userable_id) {
                return response()->json($journal);
            } else {
                return response()->json((object) [], 403);
            }
        } elseif ($user->isStudent()) {
            if ($journal->group_id == $user->userable->group->id) {
                return response()->json($journal);
            } else {
                return response()->json((object) [], 403);
            }
        } else {
            return response()->json((object) [], 403);
        }
    }

}
