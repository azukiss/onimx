<nav class="links">
    <div class="space-y-2">
        <a href="{{ route('page.home') }}" class="link @if(Route::is('page.home')) bg-oni-100 text-gray-900 @endif">
            <i class="fa-regular fa-home fa-fw"></i>
            {{ __('Home') }}
        </a>
        <a href="{{ route('page.upgrade') }}" class="link @if(Route::is('page.upgrade')) bg-oni-100 text-gray-900 @endif">
            <i class="fa-regular fa-star fa-fw"></i>
            {{ __('Upgrade') }}
        </a>
    </div>
    <div class="navbar-tags overflow-y-auto overflow-x-hidden py-3">
        @foreach($categories as $category)
            <div class="pt-3 px-2" x-data="{ expanded: @if(in_array(str_replace('tag-', '', $page_id), $category->tags->pluck('slug')->toArray())) true @else false @endif }">
                <div class="flex justify-between align-middle cursor-pointer mb-2" @click="expanded = !expanded">
                    <div class="font-semibold text-sm">{{ $category->name }}</div>
                    <i class="fa-solid fa-chevron-down" x-show="!expanded"></i>
                    <i class="fa-solid fa-minus" x-show="expanded"></i>
                </div>
                <div x-show="expanded" x-collapse.duration.500ms>
                    @foreach($category->tags as $tag)
                        <a href="{{ route('tag.show', $tag->slug) }}" class="link @if($page_id == 'tag-' . $tag->slug) bg-oni-100 text-gray-900 @endif">
                            <i class="group {{ (!empty($tag->icon)) ? $tag->icon : 'fa-regular fa-circle fa-fw' }}"></i>
                            {{ !empty($tag->name) ? $tag->name : 'Undifined' }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</nav>
