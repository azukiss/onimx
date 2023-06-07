@extends('templates.global.page')

@section('main')
    <div class="flex flex-col lg:flex-row flex-shrink-0 gap-6">
        <div class="basis-full md:basis-3/4 lg:basis-4/5">

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                <div class="card card-hover">
                    <a href="#" class="relative text-gra" x-data x-ripple>
                        <img src="https://raw.githubusercontent.com/ShareCosplay/images-6/main/Makachan%20-%201685665804006%20-%20Azur%20Lane%20-%20Chapayev/cover/d801d9e4d85ecfbe0a1b5a0e1e32802a.jpg" alt="product-1" class="rounded-t-lg" loading="lazy">
                        <div class="p-4">
                            <div class="font-normal text-base">Azur Lane</div>
                            <div class="font-medium text-xl">Chapayev</div>
                        </div>
                        <div class="px-6">
                            <div class="text-sm text-gray-500 font-mono space-y-0.5">
                                <div class="flex items-center space-x-3">
                                    <div>Pics:</div>
                                    <div>20 Pics</div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div>Vids:</div>
                                    <div>20 Vids</div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div>Size:</div>
                                    <div>20 MB</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="border-t p-4 mt-4">
                        <div class="flex items-center justify-between">
                            <div class="space-y-1">
                                <div class="font-medium">
                                    <a href="#" class="hover:text-oni-600">Coser Name</a>
                                </div>
                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::now() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="basis-full md:basis-1/4 lg:basis-1/5">
{{--            --}}
        </div>
    </div>
@endsection
