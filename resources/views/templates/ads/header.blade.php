@if(!isset($show_ads) || $show_ads != false)
    @cannot('hide-sponsor')
        <div class="ads-header">
            <a href="#">
                <img src="{{ asset('assets/images/ads/728x90.png') }}" loading="lazy">
            </a>
        </div>
    @endcannot
@endif
