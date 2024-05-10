
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@include('navbar')

<x-guest-layout>


    <div class="loginBox">
        <x-slot name="logo">
        </x-slot>

        <x-validation-errors class="mb-4" />
   

        @if (session('status'))
            <!-- <div class="mb-4 font-medium text-sm text-green-600"> -->
           <div class="#">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email" value="{{ __('Email') }}" >Email</label>
                <x-input id="email" class="emailContainer" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div >
                <label for="password" value="{{ __('Password') }}">Password</label>
                <x-input id="password" class="emailContainer" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">

                <button class="LoginButton">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
