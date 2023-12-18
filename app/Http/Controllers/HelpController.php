<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function api1_0()
    {
        return view('helpers.api1_0.show');
    }
}
