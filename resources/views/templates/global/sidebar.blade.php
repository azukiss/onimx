<div x-show="sideMenu" class="relative z-40 lg:hidden" role="dialog" aria-modal="true" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" x-show="sideMenu" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"></div>

    <div class="fixed inset-0 z-40 flex">
        <div @click.away="sideMenu = false" class="relative flex w-full max-w-xs flex-1 flex-col bg-white pt-5 pb-4 overflow-x-hidden" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button @click="sideMenu = false" type="button" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <i class="fa-solid fa-x fa-fw text-lg text-white"></i>
                </button>
            </div>
            <div class="flex flex-shrink-0 items-center px-4">
                <img class="h-8 w-auto" src="{{ asset('assets/images/logo_small.png') }}" alt="{{ config('app.name') }}">
            </div>
            <div class="mt-5 h-0 flex-1">
                <nav class="space-y-1 px-2">
                    <a href="{{ route('home') }}" class="@if(Route::is('home')) bg-gray-100 text-gray-900 @else text-gray-600 @endif group flex items-center px-2 py-2 text-base font-medium rounded-md hover:bg-gray-50 hover:text-gray-900">
                        <i class="fa-solid fa-home fa-fw text-gray-500 mr-4 flex-shrink-0"></i>
                        Home
                    </a>
                    <a href="#" class="text-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md hover:bg-gray-50 hover:text-gray-900">
                        <i class="fa-solid fa-home fa-fw text-gray-500 mr-4 flex-shrink-0"></i>
                        Coser
                    </a>
                    <a href="#" class="text-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md hover:bg-gray-50 hover:text-gray-900">
                        <i class="fa-solid fa-home fa-fw text-gray-500 mr-4 flex-shrink-0"></i>
                        Cosplay
                    </a>
                </nav>
            </div>
            <div class="flex flex-col flex-shrink-0 items-center justify-center">
                <a href="#">
                    <img src="https://4play.to/assets/ads/00/150x150.png" loading="lazy" class="max-w-[150px] max-h-[150px] z-0">
                </a>
                <div class="flex flex-col mt-5 text-center space-y-1">
                    <a href="#" class="font-medium text-sm hover:text-oni-600">Advertising</a>
                    <a href="#" class="font-medium text-sm hover:text-oni-600">Terms of Service</a>
                </div>
            </div>
        </div>
        <div class="w-14 flex-shrink-0" aria-hidden="true"></div>
    </div>
</div>

<div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col">
    <div class="flex flex-grow flex-col overflow-y-auto border-r border-gray-200 bg-white py-5">
        <div class="flex flex-shrink-0 items-center px-4">
            <img class="h-8 w-auto" src="{{ asset('assets/images/logo_small.png') }}" alt="{{ config('app.name') }}">
        </div>
        <div class="mt-5 flex flex-grow flex-col">
            <nav class="flex-1 space-y-1 px-2 pb-4">
                <a href="{{ route('home') }}" class="@if(Route::is('home')) bg-gray-100 text-gray-900 @else text-gray-600 @endif group flex items-center px-2 py-2 text-base font-medium rounded-md hover:bg-gray-50 hover:text-gray-900">
                    <i class="fa-solid fa-home fa-fw text-gray-500 mr-4 flex-shrink-0"></i>
                    Home
                </a>
                <a href="#" class="text-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md hover:bg-gray-50 hover:text-gray-900">
                    <i class="fa-solid fa-home fa-fw text-gray-500 mr-4 flex-shrink-0"></i>
                    Coser
                </a>
                <a href="#" class="text-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md hover:bg-gray-50 hover:text-gray-900">
                    <i class="fa-solid fa-home fa-fw text-gray-500 mr-4 flex-shrink-0"></i>
                    Cosplay
                </a>
            </nav>
        </div>
        <div class="flex flex-col flex-shrink-0 items-center justify-center">
            <div>
                <a href="#">
                    <img src="https://4play.to/assets/ads/00/150x150.png" loading="lazy" class="h-full w-full max-w-[150px] max-h-[150px]">
                </a>
            </div>
            <div class="flex flex-col mt-5 text-center space-y-1">
                <a href="#" class="font-medium text-sm hover:text-oni-600">Advertising</a>
                <a href="#" class="font-medium text-sm hover:text-oni-600">Terms of Service</a>
            </div>
        </div>
    </div>
</div>
