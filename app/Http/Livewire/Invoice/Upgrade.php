<?php

namespace App\Http\Livewire\Invoice;

use Livewire\Component;
use Livewire\WithPagination;

use App\Services\Membership\PlanInvoiceService;

class Upgrade extends Component
{
    use WithPagination;

    protected $planInvoiceService;

    protected $paginationTheme = 'simple-tailwind';
    protected $dataAmount = 5;

    public function mount(PlanInvoiceService $planInvoiceService)
    {
        $this->planInvoiceService = $planInvoiceService;
    }

    public function render()
    {
        return view('livewire.invoice.upgrade', [
            'invoices' => $this->planInvoiceService->livewireIndex('created_at', 'asc', $this->dataAmount),
        ]);
    }
}
