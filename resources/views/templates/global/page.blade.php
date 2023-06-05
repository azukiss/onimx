<!doctype html>
<html lang="en" class="light">

@include('templates.global.head')

<body class="{{ (!empty($page_id) ? $page_id : null) }}">
    <div x-data="{ sideMenu: false }">
        @include('templates.global.sidebar')
        <div class="main-section">
            @include('templates.global.header')
            <div class="page-section">
                @hasSection('main')
                    @yield('main')
                @endif
            </div>
            @include('templates.global.footer')
        </div>
    </div>
</body>

</html>
