<nav class="breadcrumb" aria-label="Breadcrumb">
    @unless ($breadcrumbs->isEmpty())
        <ol role="list" class="lists">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li>
                        <div class="flex items-center">
                            <i class="{{ $breadcrumb->icon }} {{ $breadcrumb->color }} flex-shrink-0"></i>
                            <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                        </div>
                    </li>
                @else
                    <li>
                        <div class="flex items-center">
                            <i class="{{ $breadcrumb->icon }} {{ $breadcrumb->color }} flex-shrink-0"></i>
                            <a>{{ $breadcrumb->title }}</a>
                        </div>
                    </li>
                @endif
            @endforeach
        </ol>
    @endunless
</nav>
