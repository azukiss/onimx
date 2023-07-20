<nav class="links">
    <a href="{{ route('page.home') }}" class="link @if(Route::is('page.home')) bg-oni-100 text-gray-900 @else text-gray-600 @endif">
        <i class="fa-regular fa-home fa-fw"></i>
        Home
    </a>
    @foreach($tags as $tag)
        <a href="{{ route('tag.show', $tag->slug) }}" class="link">
            <i class="group {{ (!empty($tag->icon)) ? $tag->icon : 'fa-regular fa-circle fa-fw' }}"></i>
            {{ !empty($tag->name) ? $tag->name : 'Undifined' }}
        </a>
    @endforeach
</nav>
