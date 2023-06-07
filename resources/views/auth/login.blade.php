@extends('templates.auth.page')

@section('auth_title')
    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Login</h2>
    <p class="mt-2 text-center text-sm text-gray-600">
        Don't have an account? <a href="{{ route('register') }}" class="font-medium text-oni-600 hover:text-oni-500">Register</a>
    </p>
@endsection

@section('auth_form')
    <form class="space-y-6" action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" required class="block w-full form-input">
            </div>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="mt-1">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full form-input">
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox" class="cursor-pointer form-checkbox">
                <label for="remember" class="ml-2 block text-sm text-gray-900 cursor-pointer">Remember me</label>
            </div>

            <div class="text-sm">
                <a href="#" class="font-medium text-oni-600 hover:text-oni-500">Forgot your password?</a>
            </div>
        </div>

        <div>
            <button x-data x-ripple type="submit" class="relative w-full justify-center rounded-md border border-transparent bg-oni-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-oni-700">Login</button>
        </div>
    </form>
@endsection
