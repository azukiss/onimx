<div class="header">
    <button x-on:click="sideMenu = true" class="mobile-menu-button">
        <i class="text-xl fa-solid fa-bars fa-fw"></i>
    </button>
    <div class="header-body">
        <div class="search-bar">
            <form action="#" method="GET">
                <div class="search-body">
                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                        <i class="fa-regular fa-magnifying-glass fa-fw"></i>
                    </div>
                    <input id="search-field" class="search-input" placeholder="Search" name="search">
                </div>
            </form>
        </div>
        <div class="user-bar">
            @auth
                <div class="relative ml-3" x-data="{profileMenu: false}">
                    <div>
                        <button x-on:click="profileMenu = !profileMenu" x-on:click.outside="profileMenu = false" class="avatar">
                            <span class="sr-only">Open user menu</span>
                            <img src="{{ !empty(auth()->user()->avatar) ? Storage::disk(config('filesystems.default'))->url(auth()->user()->avatar) : asset('assets/images/default_avatar.jpg') }}" alt="user-avatar">
                        </button>
                    </div>
                    <div class="profile-menu" x-show="profileMenu"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95">
                        @if(auth()->user()->hasVerifiedEmail())
                        <a href="{{ route('page.invoice.index') }}" class="link @if(Route::is('page.invoice.*')) href active @endif">
                            <i class="mr-1 fa-light fa-receipt fa-fw"></i>
                            <span>{{ __('Invoices') }}</span>
                        </a>
                        @endif
                        <a href="{{ route('user.settings.index') }}" class="link @if(Route::is('user.settings.*')) href active @endif">
                            <i class="mr-1 fa-regular fa-gear fa-fw"></i>
                            <span>{{ __('Settings') }}</span>
                        </a>
                        @can('access-filament')
                            <a href="{{ route('filament.pages.dashboard') }}" class="link" target="_blank">
                                <i class="mr-1 fa-regular fa-user-secret fa-fw"></i>
                                <span>{{ __('Admin Panel') }}</span>
                            </a>
                        @endcan
                        <a class="cursor-pointer link" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                            <i class="mr-1 fa-regular fa-right-from-bracket fa-fw"></i>
                            <span>{{ __('Sign Out') }}</span>
                        </a>
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            @endauth
            @guest
                <div class="authentication">
                    <a href="{{ route('login') }}" x-data x-ripple class="login-button">{{ __('Sign In') }}</a>
                    <a href="{{ route('register') }}" x-data x-ripple class="register-button">
                        <i class="mr-2 fa-regular fa-user-plus fa-fw"></i>
                        <span>{{ __('Register') }}</span>
                    </a>
                </div>
            @endguest
        </div>
    </div>
</div>
{{ Breadcrumbs::render() }}
