@include('templates.global.sidebar-mobile')
<div class="sidebar-d">
    <div class="body">
        <div class="logo">
            <a href="{{ route('page.home') }}" class="text-center" title="{{ __('Homepage') }}">
                <div class="text-xl font-semibold tracking-widest text-gray-900">{{ str(config('app.name'))->upper() }}</div>
                <div class="text-sm font-normal tracking-wide text-gray-500">{{ str(config('app.desc'))->headline() }}</div>
            </a>
        </div>
        @include('templates.global.navbar')
        <div class="footer">
            @include('templates.ads.sidebar')
        </div>
    </div>
</div>

@section('navbarJS')
    <script type="text/javascript" id="currentUrl">
        const currentUrl = () => {
            return {
                current: '{{ url()->current() }}'
            };
        };
    </script>
    <script type="text/javascript" id="sidebarLinks">
        const sidebarLinks = () => {
            return {
                links: [
                    {title: 'Home', icon: 'fa-regular fa-home', route: '{{ route('page.home') }}'},
                    {title: 'Upgrade', icon: 'fa-regular fa-star', route: '{{ route('page.upgrade.index') }}'},
                ]
            };
        };
    </script>
    <script type="text/javascript" id="sidebarTags">
        const sidebarTags = () => {
            return {
                catId: @isset($tag) {{ $tag->cat_id }} @else null @endisset,
                categories: [
                    @foreach ($categories as $category)
                    {
                        id: {{ $category->id }},
                        title: '{{ $category->name }}',
                        tags:
                            [
                                @foreach ($category->tags as $tag)
                                {title: '{{ $tag->name }}', catId: '{{ $tag->cat_id }}', route: '{{ route('tag.show', $tag->slug) }}', icon: '{{ $tag->icon }}'},
                                @endforeach
                            ],
                    },
                    @endforeach
                ],
            };
        };
    </script>
@endsection
