<div x-show="sideMenu" class="sidebar-m" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" x-show="sideMenu" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"></div>

    <div class="fixed inset-0 z-40 flex">
        <div @click.away="sideMenu = false" class="body" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button @click="sideMenu = false" type="button" class="burger-button">
                    <i class="fa-solid fa-x fa-fw text-lg text-white"></i>
                </button>
            </div>
            <div class="logo">
                <img class="h-8 w-auto" src="{{ asset('assets/images/logo_small.png') }}" alt="{{ config('app.name') }}">
            </div>
            <nav class="links">
                <a href="{{ route('page.home') }}" class="link @if(Route::is('home')) bg-gray-100 text-gray-900 @else text-gray-600 @endif">
                    <i class="fa-regular fa-home fa-fw text-gray-500 mr-4 flex-shrink-0"></i>
                    Home
                </a>
                @foreach($tags as $tag)
                    <a href="#" class="link">
                        <i class="{{ (!empty($tag->icon)) ? $tag->icon : 'fa-regular fa-circle fa-fw' }}"></i>
                        {{ !empty($tag->name) ? $tag->name : 'Undifined' }}
                    </a>
                @endforeach
            </nav>
            <div class=footer>
                @cannot('hide-sponsor')
                    <div class="sponsors">
                        <a href="#">
                            <img src="https://4play.to/assets/ads/00/150x150.png" loading="lazy">
                        </a>
                    </div>
                @endcannot
                <div class="links">
                    <a href="#" class="link">Advertising</a>
                    <a href="#" class="link">Terms of Service</a>
                </div>
            </div>
        </div>
        <div class="w-14 flex-shrink-0" aria-hidden="true"></div>
    </div>
</div>
