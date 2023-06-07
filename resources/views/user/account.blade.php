@extends('templates.user.settings')

@section('user-settings')
    <div class="card">
        <form action="#" method="post">
            <div class="card-body space-y-6">
                <div>
                    <h2 class="text-lg font-medium leading-6 text-gray-900">{{ __('Change Avatar') }}</h2>
                </div>

                <div></div>

            </div>
            <div class="card-footer">
                <button type="submit" name="remove" x-data x-ripple class="btn btn-base btn-primary btn-oni">Remove</button>
                <button type="submit" name="save" x-data x-ripple class="btn btn-base btn-primary btn-scooter">Save</button>
            </div>
        </form>
    </div>
    <div class="card">
        <form action="{{ route('user-profile-information.update') }}" method="post">
            @csrf
            @method('put')
            <div class="card-body space-y-6">
                <div>
                    <h2 class="text-lg font-medium leading-6 text-gray-900">{{ __('Account Preferences') }}</h2>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-full">
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="username" id="username" class="form-input @if($errors->updateProfileInformation->first('username')) form-error @endif" value="{{ auth()->user()->username }}">
                        @if($errors->updateProfileInformation->first('username'))
                            <p class="text-oni-500 mt-1">{{ $errors->updateProfileInformation->first('username') }}</p>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-full">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" class="form-input @if($errors->updateProfileInformation->first('email')) form-error @endif" value="{{ auth()->user()->email }}">
                        @if($errors->updateProfileInformation->first('email'))
                            <p class="text-oni-500 mt-1">{{ $errors->updateProfileInformation->first('email') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" x-data x-ripple class="btn btn-base btn-primary btn-scooter">Save</button>
            </div>
        </form>
    </div>
@endsection
