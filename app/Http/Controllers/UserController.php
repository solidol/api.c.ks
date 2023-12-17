<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function index()
    {

    }

    function show(User $user)
    {
        if (Auth::user()->isAdmin()) {
            return view('auth.profile', ['user' => $user]);
        } else
            return view('auth.login');
    }

    function showMy()
    {
        $user = Auth::user();
        if (\request()->ajax()) {
            $toJson = $user->getShortObj();
            return response()->json(['user' => $toJson]);
        }
        return view('auth.profile', ['user' => $user]);
    }

    function loginAs(User $user)
    {

        if (Auth::user()->isAdmin()) {
            Log::loginAs($user->id);
            Auth::loginUsingId($user->id);
            Session::put('localrole', null);
            return redirect()->route('journals.index');
        } else
            return view('auth.login');
    }

    function createToken(Request $request)
    {
        $token = $request->user()->createToken($request->token_name);
        return ['token' => $token->plainTextToken];
    }
}
