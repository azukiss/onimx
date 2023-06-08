<div class="header">
    <button @click="sideMenu = true" type="button" class="mobile-menu-button">
        <i class="fa-solid fa-bars fa-fw text-xl"></i>
    </button>
    <div class="flex flex-1 justify-between px-4">
        <div class="flex flex-1">
            <form class="flex w-full md:ml-0" action="#" method="GET">
                <label for="search-field" class="sr-only">Search</label>
                <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                        <i class="fa-regular fa-magnifying-glass fa-fw"></i>
                    </div>
                    <input id="search-field" class="block h-full w-full border-transparent py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 focus:border-transparent focus:placeholder-gray-400 focus:outline-none focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search">
                </div>
            </form>
        </div>
        <div class="ml-4 flex items-center md:ml-6">
            @auth
                <div class="relative ml-3" x-data="{profileMenu: false}">
                    <div>
                        <button @click="profileMenu = !profileMenu" @click.outside="profileMenu = false" type="button" class="avatar" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="#" alt="user-avatar" onerror="this.src='{{ asset('assets/images/default_avatar.jpg') }}'">
                        </button>
                    </div>
                    <div x-show="profileMenu" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>

                        <a href="{{ route('user.settings.index') }}" class="block px-4 py-2 text-sm text-gray-700 @if(Route::is('settings')) bg-gray-100 @endif">Settings</a>

                        <a class="block px-4 py-2 text-sm text-gray-700 cursor-pointer" onclick="event.preventDefault(); document.getElementById('logout').submit();">Sign out</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <div class="hidden sm:block ml-3 space-x-2">
                    <a href="{{ route('login') }}" x-data x-ripple class="relative inline-flex items-center rounded-md border border-gray-300 bg-transparent px-4 py-2 text-sm font-medium text-black shadow-sm hover:border-gray-400">Login</a>
                    <a href="{{ route('register') }}" x-data x-ripple class="relative inline-flex items-center rounded-md border border-transparent bg-oni-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-oni-700">Register</a>
                </div>
            @endauth
        </div>
    </div>
</div>
{{--@include('templates.global.breadcrumbs')--}}
{{ Breadcrumbs::render() }}
{{--<div class="flex items-center justify-center px-4 sm:px-6 md:px-8">
    <a href="#">
        <img src="https://4play.to/assets/ads/00/728x90.png" loading="lazy">
    </a>
</div>--}}
