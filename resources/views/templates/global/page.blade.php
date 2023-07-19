<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme', 'light') }}">

@include('templates.global.head')

<body class="{{ (!empty($page_id) ? $page_id : null) }}">
    <div class="onimx" id="onimx" x-data="{ sideMenu: false }">
        @include('templates.global.sidebar')
        <div class="main-section">
            @include('templates.global.header')
            @include('templates.ads.header')
            <div class="page-section">
                @hasSection('main')
                    @yield('main')
                @endif
            </div>
            @include('templates.ads.footer')
            @include('templates.global.footer')
        </div>
    </div>
</body>

</html>
