@extends('templates.auth.page')

@section('auth_title')
    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Verification Email</h2>
@endsection

@section('auth_form')
    @if (session('status') == 'verification-link-sent')
        <div class="rounded-md bg-green-50 p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fa-solid fa-circle-check fa-fw text-green-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">A new email verification link has been emailed to you!</p>
                </div>
            </div>
        </div>
    @endif
    <form class="space-y-6" action="{{ route('verification.send') }}" method="post">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" required class="block w-full form-input" value="{{ auth()->user() ? auth()->user()->email : old('email') }}">
            </div>
        </div>

        <div>
            <button x-data x-ripple type="submit" class="relative w-full justify-center rounded-md border border-transparent bg-oni-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-oni-700">Send Verification Link</button>
        </div>
    </form>
@endsection
