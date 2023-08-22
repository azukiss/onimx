<nav class="breadcrumb">
    @unless ($breadcrumbs->isEmpty())
        <ol class="lists">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!is_null($breadcrumb->url) && $loop->first)
                <li class="home">
                    <a class="href" href="{{ $breadcrumb->url }}" x-tooltip.raw="{{ __('Home') }}"><i class="fa-regular {{ $breadcrumb->icon ?? 'fa-slash-forward' }} flex-shrink-0"></i></a>
                </li>
                @elseif (!is_null($breadcrumb->url) && !$loop->last)
                <li>
                    <i class="fa-regular {{ $breadcrumb->icon ?? 'fa-slash-forward' }} flex-shrink-0"></i>
                    <a class="ml-4 truncate href" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                </li>
                @elseif (is_null($breadcrumb->url) && !$loop->last)
                <li>
                    <i class="fa-regular {{ $breadcrumb->icon ?? 'fa-slash-forward' }} flex-shrink-0"></i>
                    <span class="ml-4 truncate href">{{ $breadcrumb->title }}</span>
                </li>
                @else
                <li>
                    <i class="fa-regular {{ $breadcrumb->icon ?? 'fa-slash-forward' }} flex-shrink-0"></i>
                    <a class="ml-4 truncate href active">{{ $breadcrumb->title }}</a>
                </li>
                @endif
            @endforeach
        </ol>
    @endunless
</nav>
