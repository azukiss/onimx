@include('templates.global.sidebar-mobile')
<div class="sidebar-d">
    <div class="body">
        <div class="logo">
            <img class="h-8 w-auto" src="{{ asset('assets/images/logo_small.png') }}" alt="Logo">
        </div>
        <nav class="links">
            <a href="{{ route('page.home') }}" class="link @if(Route::is('page.home')) bg-oni-100 text-gray-900 @else text-gray-600 @endif">
                <i class="fa-regular fa-home fa-fw"></i>
                Home
            </a>
            @foreach($tags as $tag)
                <a href="#" class="link">
                    <i class="group {{ (!empty($tag->icon)) ? $tag->icon : 'fa-regular fa-circle fa-fw' }}"></i>
                    {{ !empty($tag->name) ? $tag->name : 'Undifined' }}
                </a>
            @endforeach
        </nav>
        <div class="footer">
            @cannot('hide-sponsor')
                <div class="sponsors">
                    <a href="#">
                        <img src="https://4play.to/assets/ads/00/150x150.png" loading="lazy" class="">
                    </a>
                </div>
            @endcannot
            <div class="links">
                <a href="#" class="link">Advertising</a>
                <a href="#" class="link">Terms of Service</a>
            </div>
        </div>
    </div>
</div>
