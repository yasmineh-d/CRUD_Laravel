@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Dummy inputs (anti autofill) -->
            <input type="text" style="display:none">
            <input type="password" style="display:none">

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">Email Address</label>
                <input id="email" type="email"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('email') border-red-500 @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="nop" autofocus>

                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block font-medium mb-1">Password</label>
                <input id="password" type="password"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('password') border-red-500 @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                       type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label for="remember" class="ml-2 text-gray-700">
                    Remember Me
                </label>
            </div>

            <!-- Submit -->
            <div class="flex flex-col gap-3 mt-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">
                    Login
                </button>

                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 text-center hover:underline"
                       href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
