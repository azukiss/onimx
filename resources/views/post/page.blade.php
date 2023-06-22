@extends('templates.global.page')

@section('main')
    <div class="cosplay-content">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
                @include('templates.post.image')

                <article class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                    <div class="space-y-2">
                        <h1 class="text-3xl font-bold text-gray-900">{{ !empty($page_title) ? $page_title : "Undefined Page Title" }}</h1>
                        <h2>{{ $post->code ?? "-" }}</h2>
                    </div>

                    @if(!empty(array_values($post->info)))
                        <div class="mt-5">
                            <div class="mb-2 font-medium">{{ __('Content Information') }}</div>
                            <div class="font-mono">
                                <div>{{ 'Pics: ' . $post->info['pics'] }}</div>
                                <div>{{ 'Vids: ' . $post->info['vids'] }}</div>
                                <div>{{ 'Size: ' . $post->info['size'] }}</div>
                            </div>
                        </div>
                    @endif

                    @if(!empty($post->description))
                        <div class="mt-5">
                            <div class="mb-2 font-semibold">{{ __('Description') }}</div>
                            <div class="space-y-6 text-base text-gray-700">
                                <p>{{ $post->description }}</p>
                            </div>
                        </div>
                    @endif

                    @isset($post->tags)
                        <div class="mt-5">
                            <div class="mb-2 font-medium">{{ __('Tags') }}</div>
                            @foreach($post->tags->pluck('name') as $tag)
                                <div class="badge-base badge-circle badge-amber">{{ $tag }}</div>
                            @endforeach
                        </div>
                    @endisset

                    <div class="mt-10 flex flex-col space-y-2">
                        @foreach($post->link as $link)
                            <a href="{{ $link['link'] }}" target="_blank" class="btn btn-primary btn-lg btn-scooter w-full">Download</a>
                        @endforeach
                    </div>

                    @include('templates.post.acordion.carousel')
                </article>
            </div>


        </div>
    </div>
@endsection
