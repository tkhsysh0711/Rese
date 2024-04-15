<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register()
    {

        return redirect('/thanks');
    }

    public function login()
    {
        return view('index');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
