<div class="flex flex-col space-y-5">
    <div class="font-semibold space-y-3">
        <div class="text-base text-gray-400">{{ __('Please Wait') }}</div>
        <div class="font-mono text-5xl text-red-70o">
            <span id="countdown" wire:poll.1000ms="countdown">{{ $count }}</span>
        </div>
    </div>
    <div>
        @if ($finishedCount)
            <a href="{{ $link }}" class="btn btn-lg btn-primary btn-oni">{{ __('Download Now') }}</a>
        @else
            <button class="btn btn-lg btn-primary btn-scooter cursor-pointer">{{ __('Download Now') }}</button>
        @endif
    </div>
</div>
