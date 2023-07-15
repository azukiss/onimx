@extends('templates.global.page')

@section('main')
    <div class="cosplay-content">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
                @include('templates.post.image')

                <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                    <div id="post-info">
                        <div class="space-y-1">
                            <h1 class="text-3xl font-bold text-gray-900">{{ !empty($page_title) ? $page_title : "Undefined Page Title" }}</h1>
                            <div class="text-sm">{{__('Posted by')}} {{ $post->author->username }} &bull; {{ \Carbon\Carbon::parse($post->created_at)->locale(config('app.locale'))->diffForHumans() }}</div>
                        </div>
                    </div>

                    @if(!empty(array_values($post->info)))
                        <div class="mt-5">
                            <div class="mb-2 font-medium">{{ __('Content Information') }}</div>
                            <div class="font-mono">
                                <div class="flex">
                                    <span>Code:&nbsp;</span>
                                    <h2 class="font-mono">{{ $post->code ?? "-" }}</h2>
                                </div>
                                <div>{{ 'Pics: ' . $post->info['pics'] }}</div>
                                <div>{{ 'Vids: ' . $post->info['vids'] }}</div>
                                <div>{{ 'Size: ' . $post->info['size'] }}</div>
                            </div>
                        </div>
                    @endif

                    @if(!empty($post->description))
                        <article class="mt-5 prose prose-cyan">
                            <div class="mb-2 font-semibold">{{ __('Description') }}</div>
                            <div class="space-y-6 text-base text-gray-700">
                                <p>{!! Str::markdown($post->description) !!}</p>
                            </div>
                        </article>
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
                        @foreach($links as $link)
                            <a href="{{ $link->default_short_url }}" target="_blank" class="btn btn-primary btn-lg btn-scooter w-full" x-data x-ripple>{{ __('Download') }}</a>
                        @endforeach
                    </div>

                    @include('templates.post.acordion.carousel')
                </div>
            </div>


        </div>
    </div>
@endsection
