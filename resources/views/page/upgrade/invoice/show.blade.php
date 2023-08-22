@extends('templates.global.page')

@section('main')
<div class="max-w-4xl mx-auto">
    <div class="px-6 py-6 border rounded-lg shadow sm:py-7 md:py-10 sm:px-10 md:px-14">
        <div class="flex flex-col pb-3 border-b border-gray-100 sm:flex-row sm:justify-between">
            <div class="flex flex-row justify-between mb-10 sm:flex-col sm:justify-normal sm:mb-0">
                <div class="space-y-2">
                    <div class="text-lg font-bold uppercase sm:text-3xl">{{ __('Invoice') }}</div>
                    <h3 class="font-mono text-base font-medium">#{{ $invoice->code }}</h3>
                </div>
                <div class="my-auto">
                    <div
                        class="badge badge-lg sm:badge-xl badge-rounded {{ 'badge-' . \App\Enum\PlanInvoice\StatusBadgeEnum::from($invoice->status->value)->name }}">
                        {{ str($invoice->status->value)->upper() }}</div>
                </div>
            </div>
            <div class="flex flex-row-reverse items-center justify-between sm:space-y-5 sm:flex-col sm:text-right">
                <img class="h-14 sm:h-20 sm:ml-auto w-fit" src="{{ asset('assets/images/logo_small.png') }}" alt="logo">
                <div class="sm:text-right">
                    <h1 class="text-lg font-semibold tracking-widest text-gray-900 sm:text-xl">
                        {{ str(config('app.name'))->upper() }}</h1>
                    <h2 class="text-sm font-normal tracking-wide text-gray-500 sm:text-base">
                        {{ str(config('app.desc'))->headline() }}</h2>
                    <div class="mt-1 text-xs text-gray-500 sm:text-sm">
                        {{ str(config('app.url'))->replace('https://', 'www.') }}</div>
                </div>
            </div>
        </div>
        <div class="flex justify-between my-5">
            <div>
                <div class="text-sm font-semibold">{{ __('Due Date') }}</div>
                <div class="text-sm">{{ date_format($invoice->due_at, config('custom.format.datetime')) }}</div>
            </div>
            <div class="text-right">
                <div class="text-sm font-semibold">{{ __('Invoice Date') }}</div>
                <div class="text-sm">{{ date_format($invoice->created_at, config('custom.format.datetime')) }}</div>
            </div>
        </div>
        <div class="my-8 table-section">
            <div class="table-overflow">
                <div class="table-display">
                    <div class="table-border">
                        <table class="table">
                            <thead class="table-head">
                                <tr>
                                    <th class="table-head-col text-center-important">{{ __('Plan') }}</th>
                                    <th class="table-head-col text-center-important">{{ __('Quantity') }}</th>
                                    <th class="table-head-col text-center-important">{{ __('Price') }}</th>
                                    <th class="table-head-col text-center-important">{{ __('Total') }}</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <tr>
                                    <td class="table-body-col text-center-important font-medium">{{ $invoice->item['name'] }}</td>
                                    <td class="table-body-col text-center-important">{{ $invoice->item['quantity'] }}
                                    </td>
                                    <td class="table-body-col text-center-important" id="price">
                                        {{ $invoice->item['price'] }}</td>
                                    <td class="table-body-col text-center-important" id="priceTotal">
                                        {{ $invoice->item['total'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-10 mb-5 sm:gap-5 sm:grid-cols-2">
            <div class="order-last space-y-5 sm:order-first">
                <div>
                    <div class="mb-3 text-lg font-semibold">{{ __('Bill To') }}</div>
                    <div class="px-5 py-3 bg-gray-100 rounded-md">
                        <div class="font-medium mb-2">{{ $invoice->payment['holder'] }}</div>
                        <div>{{ $invoice->payment['name'] . ' (' . $invoice->payment['type'] . ')' }}</div>
                        <div>{{ $invoice->payment['address'] }}</div>
                    </div>
                </div>
                <div class="p-2">
                    <span class="text-sm italic text-gray-500">* {{ __('1 Month == 30 Days') }}</span>
                </div>
            </div>
            <div class="flex justify-between w-56 ml-auto">
                <div class="text-lg font-semibold">Total</div>
                <div class="text-lg font-medium" id="total">{{ $invoice->item['total'] }}</div>
            </div>
        </div>
        <div class="pt-5 border-t border-gray-100">
            <div class="mb-5 text-lg font-semibold">{{ __('Proof of Payment') }}</div>
            @isset($invoice->paymentProof)
            <div class="max-w-xl mx-auto space-y-5">
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                    <ul role="list" class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                        @isset($invoice->paymentProof->upload)
                        @foreach ($invoice->paymentProof->upload as $key => $upload)
                        <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                            <div class="flex items-center flex-1 w-0">
                                <i class="flex-shrink-0 text-gray-400 fa-regular fa-paperclip fa-fw"></i>
                                <span class="flex-1 ml-2 truncate">{{ str($upload)->replace('invoices/proof/', '')
                                    }}</span>
                            </div>
                            <div class="flex-shrink-0 ml-4">
                                <a href="{{ route('page.invoice.upgrade.proof.download', ['planInvoice' => $invoice->code, 'key' => $key]) }}"
                                    class="href" target="_blank">{{ __('Download') }}</a>
                            </div>
                        </li>
                        @endforeach
                        @endisset
                    </ul>
                </dd>
                <div>
                    <div class="form-label">{{ __('Additional Proof') }}</div>
                    <div class="form-textarea text-sm">{{ $invoice->paymentProof->other ?? '-' }}</div>
                </div>
                <div>
                    <div class="form-label">{{ __('Status') }}</div>
                    <div class="grid grid-cols-2 gap-5 py-1">
                        <div class="flex justify-between justify-items-center">
                            <div class="text-sm">{{ __('Check') }}:</div>
                            <div
                                class="badge badge-base rounded @if($invoice->paymentProof->is_checked == true) badge-green @else badge-oni @endif">
                                @if($invoice->paymentProof->is_checked == true)
                                <i class="fa-solid fa-check fa-fw" x-data x-tooltip.raw="{{ date_format($invoice->paymentProof->checked_at, config('custom.format.datetime')) }}"></i>
                                @else
                                <i class="fa-solid fa-times fa-fw"></i>
                                @endif
                            </div>
                        </div>
                        <div class="flex justify-between justify-items-center">
                            <div class="text-sm">{{ __('Valid') }}:</div>
                            <div
                                class="badge badge-base rounded @if($invoice->paymentProof->is_valid == true) badge-green @elseif($invoice->paymentProof->is_valid == false) badge-oni @else badge-gray @endif">
                                @if($invoice->paymentProof->is_valid == true)
                                <i class="fa-solid fa-check fa-fw"></i>
                                @elseif($invoice->paymentProof->is_valid == false)
                                <i class="fa-solid fa-times fa-fw"></i>
                                @else
                                <i class="fa-solid fa-question fa-fw"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-7">
                    <form
                        action="{{ route('page.invoice.upgrade.proof.remove', ['planInvoice' => $invoice->code, 'planInvoiceProof' => $invoice->paymentProof->id]) }}"
                        method="post">
                        @csrf
                        @method('delete')
                        <div class="flex content-center justify-center">
                            <button class="btn btn-lg btn-primary btn-oni w-full" type="submit">{{ __('Remove Proof')
                                }}</button>
                        </div>
                    </form>
                </div>
            </div>
            @endisset
            @if (in_array($invoice->status->value, [App\Enum\PlanInvoice\StatusEnum::Unpaid->value, App\Enum\PlanInvoice\StatusEnum::Pending->value, App\Enum\PlanInvoice\StatusEnum::Partial->value]))
            <form action="{{ route('page.invoice.upgrade.proof.upload', $invoice->code) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="max-w-xl mx-auto space-y-5">
                    <div>
                        <div class="mb-1">
                            <label class="form-label" for="fileupload">{{ __('Screenshots') }}</label>
                        </div>
                        @include('templates.component.fileupload.input')
                    </div>

                    <div>
                        <div class="mb-1">
                            <label class="form-label" for="additionalProof">{{ __('Additional') }}</label>
                        </div>
                        <textarea class="form-textarea" name="additionalProof" id="additionalProof" rows="3"
                            placeholder="Type here if you have another proof..."></textarea>
                    </div>

                    <div class="flex content-center justify-center">
                        <button class="w-full btn btn-lg btn-primary btn-oni" type="submit">{{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection

@section('footerJS')
<script type="text/javascript">
    function numberFormat(rawNumber) {
            var number = Number(rawNumber);
            return number.toLocaleString('{{ $invoice->plan->locale }}', {
                style: 'currency',
                currency: '{{ $invoice->plan->currency }}'
            }).replace(',00', '');
        }

        window.onload = function() {
            document.getElementById('price').innerHTML = numberFormat(document.getElementById('price').textContent);
            document.getElementById('priceTotal').innerHTML = numberFormat(document.getElementById('priceTotal')
                .textContent);
            document.getElementById('total').innerHTML = numberFormat(document.getElementById('total').textContent);
        }
</script>
@include('templates.component.fileupload.script')
@endsection
