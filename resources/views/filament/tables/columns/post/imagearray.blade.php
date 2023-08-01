<div style="margin-bottom: 10px">
    <img src="{{ !empty($getState()[0]) ? Storage::disk(config('filesystems.default', 'public'))->url($getState()[0]) : asset(array_values($getState())[0]) }}" style="border-radius: 10px; height: 250px" alt="First Image" loading="lazy">
</div>
