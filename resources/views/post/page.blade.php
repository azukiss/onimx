@extends('templates.global.page')

@section('main')
    <div class="cosplay-content">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
                @include('templates.post.image')

                <article class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                    <div class="space-y-2">
                        <h1 class="text-3xl font-bold text-gray-900">{{ !empty($page_title) ? $page_title : "Undefined Page Title" }}</h1>
                        <h2>{{ !empty($code_collection) ? $code_collection : "-" }}</h2>
                    </div>

                    <div class="mt-6">
                        <div class="mb-2 font-semibold">Description</div>
                        <div class="space-y-6 text-base text-gray-700">
                            <p>The Zip Tote Basket is the perfect midpoint between shopping tote and comfy backpack.
                                With convertible straps, you can hand carry, should sling, or backpack this convenient
                                and spacious bag. The zip top and durable canvas construction keeps your goods protected
                                for all-day use.</p>
                        </div>
                    </div>

                    <div class="mt-10 flex">
                        <a href="#" class="btn btn-primary btn-lg btn-scooter w-full">Download</a>
                    </div>

                    @include('templates.post.acordion.carousel')
                </article>
            </div>


        </div>
    </div>
@endsection
