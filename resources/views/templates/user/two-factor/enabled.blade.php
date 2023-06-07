<div class="card">
    <div class="card-body space-y-6">
        <div>
            <h2 class="text-lg font-medium leading-6 text-gray-900">{{ __('Two Factor Authentication') }}</h2>
        </div>
        <div class="rounded-md bg-green-100 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fa-solid fa-circle-check fa-fw text-green-400"></i>
                </div>
                <div class="ml-3">
                    <div class="text-sm font-medium text-green-800">
                        <p>Two factor authentication confirmed and enabled successfully</p>
                    </div>
                </div>
            </div>
        </div>
        @if(!empty(auth()->user()->two_factor_confirmed_at))
            @include('templates.user.two-factor.recovery-code')
        @endif
    </div>
    <div class="card-footer">
        <form action="{{ route('two-factor.disable') }}" method="post">
            @csrf
            @method('delete')
            <button x-data x-ripple type="submit" class="btn btn-base btn-primary btn-oni">Disable 2FA</button>
        </form>
    </div>
</div>
