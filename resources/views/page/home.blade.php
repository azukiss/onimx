@extends('templates.global.page')

@section('main')
    <div class="flex flex-col lg:flex-row flex-shrink-0 gap-6">
        <div class="basis-full md:basis-3/4 lg:basis-4/5">

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                @foreach($posts as $post)
                    <div class="card card-hover">
                        <a href="{{ route('post.page', $post->id) }}" class="relative text-gra" x-data x-ripple>
                            <img src="{{ array_values($post->image)[0] }}" alt="{{ $post->slug }}" loading="lazy">
                            <div class="px-4 mt-4">
                                <div class="font-medium text-base">{{ $post->title }}</div>
{{--                                <div class="font-medium text-xl">Chapayev</div>--}}
                            </div>
                            @if(isset($post->info))
                                <div class="px-6 mt-4">
                                    <div class="text-sm text-gray-500 font-mono space-y-0.5">
{{--                                        <div class="flex items-center space-x-3">--}}
{{--                                            <div>Pics:</div>--}}
{{--                                            <div>20 Pics</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex items-center space-x-3">--}}
{{--                                            <div>Vids:</div>--}}
{{--                                            <div>20 Vids</div>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex items-center space-x-3">--}}
{{--                                            <div>Size:</div>--}}
{{--                                            <div>20 MB</div>--}}
{{--                                        </div>--}}
                                        @foreach($post->info as $info => $key)
                                            <div class="flex items-center space-x-3">
                                                <div>{{ $key }}</div>
                                                <div>{{ $info }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </a>
                        <div class="border-t px-4 py-3 mt-4">
                            <div class="flex items-center justify-between">
                                <div class="space-y-1">
{{--                                    <div class="font-medium">--}}
{{--                                        <a href="#" class="hover:text-oni-600">Coser Name</a>--}}
{{--                                    </div>--}}
                                    <div class="text-sm text-gray-500">{{ \Carbon\Carbon::now()->format('d M Y') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="basis-full md:basis-1/4 lg:basis-1/5">
{{--            --}}
        </div>
    </div>
@endsection
