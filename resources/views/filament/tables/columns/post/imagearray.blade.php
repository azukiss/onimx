<div style="margin-bottom: 10px">
    @if(!empty(array_values($getState())[0]))
        <img src="{{ asset(array_values($getState())[0]) }}" style="border-radius: 10px; height: 250px" alt="First Image" loading="lazy">
    @endif
</div>
