<div>
    <div>
        <div class="text-xl font-semibold tracking-wide text-gray-900">{{ __('Upgrade Invoices') }}</div>
        <div class="mt-2 text-sm text-gray-700">{{ __('A list of all the upgrade invoices in your account.') }}</div>
    </div>
    <div class="mt-8 table-section">
        <div class="table-overflow">
            <div class="table-display">
                <div class="table-border">
                    <table class="table">
                        <thead class="table-head">
                            <tr>
                                <th class="table-head-col">Invoice</th>
                                <th class="table-head-col">Membership</th>
                                <th class="table-head-col">Invoice Date</th>
                                <th class="table-head-col">Due Date</th>
                                <th class="table-head-col text-center-important">Status</th>
                                <th class="table-head-col text-right-important">
                                    <span class="hidden">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            @forelse ($invoices as $invoice)
                                <tr>
                                    <td class="table-body-col">
                                        <span class="font-mono font-medium">{{ $invoice->code }}</span>
                                    </td>
                                    <td class="table-body-col">{{ $invoice->plan->name }}</td>
                                    <td class="table-body-col">{{ date_format($invoice->created_at, config('custom.format.datetime')) }}</td>
                                    <td class="table-body-col">{{ date_format($invoice->due_at, config('custom.format.datetime')) }}</td>
                                    <td class="table-body-col text-center-important">
                                        <span class="badge badge-base badge-rounded {{ 'badge-' . \App\Enum\PlanInvoice\StatusBadgeEnum::from($invoice->status->value)->name }}">{{ str($invoice->status->value)->upper() }}</span>
                                    </td>
                                    <td class="table-body-col text-right-important">
                                        <a href="{{ route('page.invoice.upgrade.show', $invoice->code) }}" class="href">
                                            <i class="fa-regular fa-eye fa-fw"></i>
                                            <span>{{ __('View') }}</span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td class="table-body-col empty" colspan="100%">No record</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-5">
            {{ $invoices->links() }}
        </div>
    </div>
</div>
