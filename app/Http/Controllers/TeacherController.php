<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return response()->json($teachers);
    }
    public function indexMy()
    {
        $user = Auth::user();
        if ($user->isStudent()) {
            $teachers = $user->userable->group->teachers;
            return response()->json($teachers);
        } else {
            return response()->json((object)[], 403);
        }

    }
    public function avatar(Teacher $teacher)
    {
        if ($teacher->image && Storage::disk('public')->exists($teacher->image))
            return Storage::disk('public')->download($teacher->image);

        return Storage::disk('public')->download('system/np_n.jpg');

    }
}
