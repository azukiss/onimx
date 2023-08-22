@extends('templates.global.page')

@section('main')
    <div class="max-w-4xl mx-auto my-10 space-y-6">
        <div class="py-10 border rounded-lg shadow px-7">
            <div class="mb-10 text-3xl font-bold text-gray-900">{{ __('Order Confirmation') }}</div>

            <form action="{{ route('page.upgrade.payment', ['plan' => $plan->code]) }}" method="post">
                @csrf
                <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                    <li class="flex py-6 sm:py-10">
                        <div class="relative flex flex-col justify-between flex-1 px-4 sm:px-6">
                            <div class="flex justify-between sm:grid sm:grid-cols-2">
                                <div class="pr-6">
                                    <p class="font-semibold text-gray-900">{{ $plan->name . ' ' . __('Membership') }}</p>
                                    <p class="mt-1 text-sm font-medium text-gray-500">{{ __('Monthly') }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-right text-gray-900" id="price"></p>
                                    <p class="mt-1 text-sm font-medium text-right text-gray-500">{{ $plan->currency->value }}</p>
                                </div>
                            </div>

                            <div class="flex items-center mt-4 sm:absolute sm:top-0 sm:left-1/2 sm:mt-0 sm:block">
                                <select class="form-select" id="quantity" name="quantity"
                                    class="block max-w-full rounded-md border border-gray-300 py-1.5 text-left text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                                    x-model.number="quantity" onchange="totalPrice('total')">
                                    <template x-for="(quantity, index) in 12" :key="index">
                                        <option x-bind:value="quantity"
                                            x-text="(quantity > 1) ? quantity + ' {{ __('months') }}' : quantity + ' {{ __('month') }}'"
                                            x-bind:selected="index == 0"></option>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="max-w-md mx-auto mt-10">
                    <div class="px-4 py-6 bg-gray-100 rounded-lg sm:p-6 lg:p-8">
                        <div class="flow-root">
                            <dl class="-my-4 text-sm divide-y divide-gray-200">
                                <div class="flex items-center justify-between py-4">
                                    <dt class="text-base font-medium text-gray-900">{{ __('Payment') }}</dt>
                                    <select class="w-full ml-20 form-select" name="payment" id="payment">
                                        @foreach ($payments as $payment)
                                        <option value="{{ $payment->code }}">{{ $payment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex items-center justify-between py-4">
                                    <dt class="text-base font-medium text-gray-900">{{ __('Total') }}</dt>
                                    <dd class="text-base font-medium text-gray-900" id="total"></dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <div class="mt-10">
                        <button type="submit"
                            class="w-full font-semibold btn btn-xl btn-primary btn-oni">{{ __('Proses Payment') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footerJS')
<script>
    function totalPrice(htmlId){
        var item = Number({{ $plan->price }});
        var quantity = Number(document.getElementById('quantity').value);
        var total = Number(item * quantity);

        document.getElementById(String(htmlId)).innerHTML = numberFormat(total);
    }

    function numberFormat(rawNumber) {
        var number = Number(rawNumber);
        return number.toLocaleString('{{ $plan->locale }}', { style: 'currency', currency: '{{ $plan->currency }}' }).replace(',00', '');
    }

    window.onload = function() {
        totalPrice('total');
        document.getElementById('price').innerHTML = numberFormat({{ $plan->price }});
    }
</script>
@endsection
