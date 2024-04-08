<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register()
    {

        return view('thanks');
    }

    public function login()
    {
        return view('index');
    }
}
