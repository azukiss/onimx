<div class="flex items-center space-x-2">
    <form action="{{ route('two-factor.generate-recovery-codes') }}" method="post">
        @csrf
        <button x-data x-ripple class="btn btn-base btn-sm btn-tertiary" type="submit">Generate Recovery Codes</button>
    </form>
    <a href="{{ route('two-factor.show-recovery-codes') }}" x-data x-ripple class="btn btn-base btn-sm btn-tertiary">Show Recovery Codes</a>
</div>
