<!doctype html>
<html lang="en" class="light">

@include('templates.global.head')

<body class="{{ (!empty($page_id) ? $page_id : null) }}">
    <div x-data="{ sideMenu: false }">
        @include('templates.global.sidebar')
        <div class="flex flex-1 flex-col md:pl-64">
            @include('templates.global.header')
            @include('templates.global.breadcrumb')
            <main class="flex-1">
                <div class="py-6">
                    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 md:px-8">
                        @hasSection('main')
                            @yield('main')
                        @endif
                    </div>
                </div>
            </main>
            @include('templates.global.footer')
        </div>
    </div>
</body>

</html>
