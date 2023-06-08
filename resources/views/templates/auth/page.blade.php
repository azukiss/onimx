<!doctype html>
<html lang="en" class="light">

@include('templates.global.head')

<body class="h-full auth">
<div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <img class="mx-auto h-32 w-auto" src="{{ asset('assets/images/logo_small.png') }}" alt="{{ config('app.name') }}">
        </a>
        @hasSection('auth_title')
            @yield('auth_title')
        @endif
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            @hasSection('auth_form')
                @yield('auth_form')
            @endif
        </div>
    </div>
</div>
</body>

</html>
