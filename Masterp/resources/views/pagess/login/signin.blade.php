@extends('pagess.login.login')
@section("login")





        <div id="signinn" class="form-container sign-in-container">
            <!-- <a href="index.html"> <button  type="button" class="btn btn-outline-success" >Back Home</button></a> -->
            <!-- <i  href="index.html" class="fa-solid fa-arrow-left-long" style="color: #94ee58;"></i> -->


            <a href="{{ ('/') }}"> <i class="fa fa-arrow-left" aria-hidden="true"
                    style="color: #94ee58; font-size: x-large;"></i>
            </a>
            <form method="POST" action="{{ route('login') }}" id="signIn-form">
                @csrf
                <h1>Sign in</h1>
                <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook-f" style="color: #4b82e2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-linkedin-in" style="color: #2e64c2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-google" style="color: #5089ed;"></i></a>
                </div> -->
                <strong> use your account</strong>
                <br>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    placeholder="Email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <br>

                <x-text-input id="password" class="block mt-1 w-full" placeholder="Password" type="password"
                    name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <br>

                <!-- Remember Me -->

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif


                </div>
                <button name="login">Log in</button>



            </form>
        </div>



@endsection