@include('templates.ads.footer')

@hasSection('footerJS')
    @yield('footerJS')
@endif

@include('sweetalert::alert')
@livewireScripts
