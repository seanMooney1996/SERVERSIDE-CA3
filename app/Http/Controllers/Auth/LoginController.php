<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('livewire.login');
    }


    public function login(Request $request)
    {

    }

    public function logout(Request $request)
    {

    }
}
