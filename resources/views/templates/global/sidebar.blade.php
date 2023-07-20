@include('templates.global.sidebar-mobile')
<div class="sidebar-d">
    <div class="body">
        <div class="logo">
            <img class="h-8 w-auto" src="{{ asset('assets/images/logo_small.png') }}" alt="Logo">
        </div>
        @include('templates.global.navbar')
        <div class="footer">
            @include('templates.ads.sidebar')
            <div class="links">
                <a href="#" class="link">Advertising</a>
                <a href="#" class="link">Terms of Service</a>
            </div>
        </div>
    </div>
</div>
