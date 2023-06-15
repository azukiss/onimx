@extends('templates.auth.page')

@section('auth_title')
    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">{{ __('Reset Password') }}</h2>
    <p class="mt-2 text-center text-sm text-gray-600">
        {{ __('Remember your password?') }} <a href="{{ route('login') }}" class="font-medium text-oni-600 hover:text-oni-500">Login</a>
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
    <form action="{{ route('password.update') }}" method="post" class="space-y-6">
        @csrf
        <input type="hidden" name="token" value="{{ request()->route('token') }}">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
            <div class="mt-1">
                <input id="email" name="email" type="email" required class="block w-full form-input" value="{{ request()->get('email') }}">
            </div>
        </div>
        <div class="border"></div>
        <div class="grid grid-cols-1 gap-6">
            <div class="col-span-full">
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" name="password" id="password" class="form-input" required min="8">
            </div>
            <div class="col-span-full">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>
            </div>
        </div>
        <div>
            <button x-data x-ripple type="submit" class="btn btn-base btn-primary btn-oni w-full">{{ __('Reset Password') }}</button>
        </div>
    </form>
@endsection
