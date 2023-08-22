<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ (!empty($page_title) ? $page_title . ' - ' : null) . config('app.name') }}</title>

    @vite('resources/js/global.js')
    @hasSection('headerJS')
        @yield('headerJS')
    @endif

    @vite('resources/css/global.css')
    @vite('resources/css/ripple.css')
    @vite('resources/css/tippy.css')
    @vite('resources/css/fa.css')
    @hasSection('headerCSS')
        @yield('headerCSS')
    @endif
    @livewireStyles
</head>
