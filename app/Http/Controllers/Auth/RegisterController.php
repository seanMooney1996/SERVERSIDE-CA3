<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    private int $userLevel = 1;

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request.
     *
     * @param Request $request
     * @return RedirectResponse
     */


    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        dump($validatedData);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->userLevel = $this->userLevel;

        $user->save();

        if ($user->exists) {
            dump('User successfully registered.');
        } else {
            dump('Failed to register user.');
        }
        auth()->login($user);

        return redirect()->to('/');

    }
}
