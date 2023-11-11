@extends('pagess.login.login')
@section("content")

        <div id="singipp" class="form-container sign-up-container">
<form method="POST" action="{{ route('register') }}"  id="signUp-form">
                
                @csrf
                <h1>Create Account</h1>
                <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook-f" style="color: #4b82e2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-linkedin-in" style="color: #2e64c2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-google" style="color: #5089ed;"></i></a>
                </div> -->
                <strong> use your email for registration</strong>
                <br>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Name"
                    :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                <br>
                <x-text-input id="email" class="block mt-1 w-full" type="email" placeholder="Email" name="email"
                    :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <br>

                <x-text-input id="password" class="block mt-1 w-full" type="password" placeholder="Password"
                    name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <br>
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />


                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>


                </div>
                <button name="singup">Sign Up</button>

            </form>
         </div>

@endsection