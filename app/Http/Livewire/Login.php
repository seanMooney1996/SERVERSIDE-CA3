<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;
    public function render()
    {

        return view('livewire.login');
    }

    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        } else {
            session()->flash('error', 'Invalid credentials. Please try again.');
        }
    }
}
