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
                        @foreach($post->info as $key => $info)
                            <div>{{ Str::title($key) . ': ' . $info }}</div>
                        @endforeach
                    @endif

                    @if(empty($post->description))
                        <div class="mt-6">
                            <div class="mb-2 font-semibold">{{ __('Description') }}</div>
                            <div class="space-y-6 text-base text-gray-700">
                                <p>{{ $post->description }}</p>
                            </div>
                        </div>
                    @endif

                    <div class="mt-10 flex flex-col space-y-2">
                        @foreach($post->link as $link)
                            <a href="{{ $link['link'] }}" class="btn btn-primary btn-lg btn-scooter w-full">Download</a>
                        @endforeach
                    </div>

                    @include('templates.post.acordion.carousel')
                </article>
            </div>


        </div>
    </div>
@endsection
