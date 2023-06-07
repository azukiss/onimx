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
                    <div>
                        <h3 class="text-sm font-medium text-green-800">Two factor authentication is now enabled.</h3>
                        <div class="mt-2 text-sm text-green-700">
                            <p>Scan the following QR code or input secret key using your phone's authenticator application.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row items-start space-y-6 md:space-y-0 md:space-x-10 my-10">
            <div>
                <div class="font-medium mb-2">QR Code</div>
                <div class="inline-block ring ring-scooter-500 ring-opacity-50 rounded p-2 bg-white">{!! auth()->user()->twoFactorQrCodeSvg() !!}</div>
            </div>
            <div>
                <div class="font-medium mb-2">Secret Key</div>
                <div class="inline-block ring ring-scooter-500 ring-opacity-50 rounded p-2 bg-white tracking-widest">{{ decrypt(auth()->user()->two_factor_secret) }}</div>
            </div>
        </div>
        <form action="{{ route('two-factor.confirm') }}" method="post" class="lg:w-[30%] space-y-6">
            @csrf
            <div>
                <label for="code" class="block text-sm font-medium text-gray-700">2FA Code</label>
                <div class="mt-1">
                    <input type="text" name="code" id="code" class="form-input">
                </div>
            </div>
            <button x-data x-ripple type="submit" class="btn btn-base btn-primary btn-scooter">Confirm 2FA</button>
        </form>
    </div>
    <div class="card-footer">
        <form action="{{ route('two-factor.disable') }}" method="post">
            @csrf
            @method('delete')
            <button x-data x-ripple type="submit" class="btn btn-base btn-primary btn-oni">Disable 2FA</button>
        </form>
    </div>
</div>
