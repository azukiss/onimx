@extends('templates.global.page')

@section('main')
    <div class="flex flex-col lg:flex-row flex-shrink-0 gap-6">
        <div class="basis-full md:basis-3/4 lg:basis-4/5">

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                @foreach($posts as $post)
                    <div class="card card-hover">
                        <a href="{{ route('post.page', [$post->id, $post->slug]) }}" class="relative" x-data x-ripple>
                            <div class="absolute top-0 left-0 text-xs font-medium px-2 py-1 bg-oni-200 rounded-br-md font-mono z-10">{{ $post->code }}</div>
                            <div class="bg-gray-50">
                                <img src="{{ array_values($post->image)[0] }}" alt="{{ $post->slug }}" loading="lazy" class="h-40 md:h-52 w-full object-contain onject-center">
                            </div>
                            <div class="px-4 mt-4">
                                <div class="font-medium text-lg">{{ $post->title }}</div>
                            </div>
                            @isset($post->tags)
                                <div class="px-4 mt-1">
                                    @foreach($post->tags->pluck('name') as $tag)
                                        <div class="badge-base badge-circle badge-scooter">{{ $tag }}</div>
                                    @endforeach
                                </div>
                            @endisset
                        </a>
                        <div class="border-t px-4 py-3 mt-4">
                            <div class="flex items-center justify-between">
                                <div class="space-y-1">
                                    <div class="font-medium text-sm">{{ $post->author->username }}</div>
                                    <div class="text-xs font-medium text-gray-500">{{ \Carbon\Carbon::now()->format('d M Y') }}</div>
                                </div>
                                <div class="text-xs font-medium">{{ $post->is_nsfw ? 'NSFW' : null }}</div>
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
