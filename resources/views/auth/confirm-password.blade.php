@extends('templates.auth.page')

@section('auth_title')
    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Confirm Password</h2>
@endsection

@section('auth_form')
    <form class="space-y-6" action="{{ route('password.confirm') }}" method="post">
        @csrf
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="mt-1">
                <input id="password" name="password" type="password" autocomplete="password" required class="block w-full form-input">
            </div>
        </div>

        <div>
            <button x-data x-ripple type="submit" class="relative w-full justify-center rounded-md border border-transparent bg-oni-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-oni-700">Confirm</button>
        </div>
    </form>
@endsection
