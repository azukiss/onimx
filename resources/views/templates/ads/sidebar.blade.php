@if(!isset($show_ads) || $show_ads != false)
    @cannot('hide-sponsor')
        <div class="sponsors-sidebar">
            <a href="#">
                <img src="{{ asset('assets/images/ads/150x150.png') }}" loading="lazy">
            </a>
        </div>
    @endcannot
@endif
