<div class="card">
    <div class="card-body space-y-6">
        <div>
            <h2 class="text-lg font-medium leading-6 text-gray-900">{{ __('Two Factor Authentication') }}</h2>
        </div>
        <div class="rounded-md bg-red-100 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fa-solid fa-hexagon-exclamation fa-fw text-red-400"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">2FA Disabled</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <p>You have not enabled two-factor authentication.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <form action="{{ route('two-factor.enable') }}" method="post">
            @csrf
            <button x-data x-ripple type="submit" class="btn btn-base btn-primary btn-scooter">Enable 2FA</button>
        </form>
    </div>
</div>
