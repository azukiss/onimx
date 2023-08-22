<div x-show="sideMenu" class="sidebar-m" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" x-show="sideMenu" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"></div>

    <div class="fixed inset-0 flex">
        <div x-on:click.away="sideMenu = false" class="body" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="mobile-close-body">
                <button x-on:click="sideMenu = false" class="mobile-close-button">
                    <i class="fa-solid fa-x fa-fw"></i>
                </button>
            </div>
            <div class="logo">
                <a href="{{ route('page.home') }}" class="text-center" title="{{ __('Homepage') }}">
                    <div class="text-xl font-semibold tracking-widest">{{ str(config('app.name'))->upper() }}</div>
                    <div class="text-sm font-normal">{{ str(config('app.desc'))->headline() }}</div>
                </a>
            </div>
            @guest
            <div class="authentication">
                <a href="{{ route('login') }}" x-data x-ripple class="login-button">
                    <i class="mr-2 fa-regular fa-right-to-bracket fa-fw"></i>
                    <span>{{ __('Login') }}</span>
                </a>
                <a href="{{ route('register') }}" x-data x-ripple class="register-button">
                    <i class="mr-2 fa-regular fa-user-plus fa-fw"></i>
                    <span>{{ __('Register') }}</span>
                </a>
            </div>
            @endguest
            @include('templates.global.navbar')
            <div class=footer>
                @include('templates.ads.sidebar')
            </div>
        </div>
        <div class="flex-shrink-0 w-14" aria-hidden="true"></div>
    </div>
</div>
