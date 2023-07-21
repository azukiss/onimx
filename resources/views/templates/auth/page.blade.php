<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme', 'light') }}">

@include('templates.global.head')

<body class="h-full auth">
<div class="auth-page">
    <div class="auth-header">
        <a href="{{ route('page.home') }}">
            <img class="logo" src="{{ asset('assets/images/logo_small.png') }}" alt="{{ config('app.name') }}">
        </a>
        @hasSection('auth_title')
            @yield('auth_title')
        @endif
    </div>

    <div class="auth-base">
        <div class="auth-form">
            @hasSection('auth_form')
                @yield('auth_form')
            @endif
        </div>
    </div>
</div>
</body>

</html>
