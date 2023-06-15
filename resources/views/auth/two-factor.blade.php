@extends('templates.auth.page')

@section('auth_title')
    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Two Factor Authentication</h2>
@endsection

@section('auth_form')
    <form class="space-y-6" action="{{ route('two-factor.login') }}" method="post" x-data="{ recovery: false }">
        @csrf
        <div x-show="!recovery">
            <label for="code" class="block text-sm font-medium text-gray-700">One Time Password</label>
            <div class="mt-1">
                <input id="code" name="code" type="text" class="block w-full form-input">
            </div>
        </div>

        <div x-show="recovery">
            <label for="recovery_code" class="block text-sm font-medium text-gray-700">Recovery Code</label>
            <div class="mt-1">
                <input id="recovery_code" name="recovery_code" type="text" class="block w-full form-input">
            </div>
        </div>

        <div class="text-center">
            <a class="cursor-pointer text-sm font-medium hover:text-oni-600" x-show="!recovery" x-on:click="recovery = true;">{{ __('Use a recovery code') }}</a>
            <a class="cursor-pointer text-sm font-medium hover:text-oni-600" x-show="recovery" x-on:click="recovery = false;">{{ __('Use an one time password') }}</a>
        </div>

        <div>
            <button x-data x-ripple type="submit" class="relative w-full justify-center rounded-md border border-transparent bg-oni-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-oni-700">Confirm</button>
        </div>
    </form>
@endsection
