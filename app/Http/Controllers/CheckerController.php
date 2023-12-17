<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CheckerController extends Controller
{
    public function moodle(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|string',
            'password' => 'required|string'
        ]);
        $mdlUser = DB::connection('moodle')->table('mdl_user')->where('username', $request->login)->get()->first();
        if (Hash::check($request->password, $mdlUser->password)) {
            $toJson['id'] = $mdlUser->id;
            $toJson['email'] = $mdlUser->email;
            $toJson['firstname'] = $mdlUser->firstname;
            $toJson['lastname'] = $mdlUser->lastname;
            return response()->json($toJson);
        } else {
            $err = ['status' => '401'];
            return response()->json($err, 401);
        }
    }
}
