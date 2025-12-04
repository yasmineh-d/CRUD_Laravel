@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold text-center mb-4">
            {{ __('Verify Your Email Address') }}
        </h2>

        @if (session('resent'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-300 rounded-lg">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <p class="text-gray-700 mb-4">
            {{ __('Before proceeding, please check your email for a verification link.') }}
        </p>

        <p class="text-gray-700 mb-4">
            {{ __('If you did not receive the email') }},
        </p>

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit"
                class="text-blue-600 hover:underline font-medium">
                {{ __('click here to request another') }}
            </button>
        </form>
    </div>
</div>
@endsection
