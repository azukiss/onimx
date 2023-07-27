@extends('templates.global.page')

@section('main')
    <div class="lg:mx-auto lg:max-w-4xl space-y-6">
        <div class="">
            <div class="font-semibold text-3xl">{{ $plan->name . ' ' . __('Membership') }}</div>
            <div class="font-medium font-mono text-base tracking-wide text-gray-400">{{ $plan->code }}</div>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="payment_type">Payment Type</label>
                <select name="payment_type" id="payment_type" class="form-select">
                    <option value="dana">DANA</option>
                    <option value="gopay">Gopay</option>
                    <option value="ovo">OVO</option>
                </select>
            </div>
        </div>
    </div>
@endsection
