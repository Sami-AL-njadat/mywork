<x-guest-layout>
    <div class="min-h-screen flex justify-center items-center">
        <div class="w-full max-w-md">
            <div class="bg-white p-8 rounded shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">{{ __('Reset Password') }}</h2>
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                        @if ($errors->has('email'))
                            <p class="text-sm text-red-600 mt-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                        @if ($errors->has('password'))
                            <p class="text-sm text-red-600 mt-1">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-600">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                        @if ($errors->has('password_confirmation'))
                            <p class="text-sm text-red-600 mt-1">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark focus:outline-none focus:bg-primary-dark">{{ __('Reset Password') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
