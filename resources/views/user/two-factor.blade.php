@extends('templates.user.settings')

@section('user-settings')
    @if (!empty(auth()->user()->two_factor_secret))
        @if (empty(auth()->user()->two_factor_confirmed_at))
            @include('templates.user.two-factor.scan-code')
        @endif

        @if(!empty(auth()->user()->two_factor_confirmed_at))
            @include('templates.user.two-factor.enabled')
        @endif
    @else
        @include('templates.user.two-factor.disabled')
    @endif
@endsection
