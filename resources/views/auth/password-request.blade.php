@extends('templates.auth.page')

@section('auth_title')
    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">{{ __('Forgot Password') }}</h2>
    <p class="mt-2 text-center text-sm text-gray-600">
        {{ __('Remember your password?') }} <a href="{{ route('login') }}" class="font-medium text-oni-600 hover:text-oni-500">{{ __('Login') }}</a>
    </p>
@endsection

@section('auth_form')
    @if (session('status'))
        <div class="rounded-md bg-green-50 p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fa-solid fa-circle-check fa-fw text-green-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('status') }}</p>
                </div>
            </div>
        </div>
    @endif
    <form action="{{ route('password.email') }}" method="post" class="space-y-6">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" required class="block w-full form-input">
            </div>
        </div>
        <div>
            <button x-data x-ripple type="submit" class="btn btn-base btn-primary btn-oni w-full">{{ __('Send Reset Password Link') }}</button>
        </div>
    </form>
@endsection
