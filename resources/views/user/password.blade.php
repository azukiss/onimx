@extends('templates.user.settings')

@section('user-settings')
    <div class="card">
        <form action="{{ route('user-password.update') }}" method="post">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="mb-6">
                    <h2 class="text-lg font-medium leading-6 text-gray-900">{{ __('Change Password') }}</h2>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-full">
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-input" required>
                    </div>
                </div>
                <div class="border-t-2 my-6"></div>
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
            </div>
            <div class="card-footer">
                <button x-data x-ripple type="submit" class="btn btn-base btn-primary btn-scooter">Change Password</button>
            </div>
        </form>
    </div>
@endsection
