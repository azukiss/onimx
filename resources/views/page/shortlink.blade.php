<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme', 'light') }}">

@include('templates.global.head')

<body class="h-full short-link">
    <div class="short-page min-h-full">
        <div class="short-header">
            <a href="{{ route('page.home') }}">
                <img class="logo" src="{{ asset('assets/images/logo_small.png') }}" alt="{{ config('app.name') }}">
            </a>
        </div>
        @include('templates.ads.header')
        <div class="short-main">
            <div class="short-form">
                @livewire('post.short-link', ['link' => $link])
            </div>
        </div>
        @include('templates.ads.footer')
    </div>
</body>
</html>
