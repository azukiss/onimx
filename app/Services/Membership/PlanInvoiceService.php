<?php

namespace App\Services\Membership;

// use App\Models\Membership\PlanInvoice;
use App\Repositories\Membership\PlanInvoiceRepository;

class PlanInvoiceService
{
    protected $planInvoiceRepository;

    public function __construct(PlanInvoiceRepository $planInvoiceRepository)
    {
        $this->planInvoiceRepository = $planInvoiceRepository;
    }

    public function index($orderBy, $sortBy, $paginate)
    {
        return $this->planInvoiceRepository->viewAll($orderBy, $sortBy, $paginate);
    }

    public function livewireIndex($orderBy, $sortBy, $paginate)
    {
        return $this->planInvoiceRepository->livewireViewAll($orderBy, $sortBy, $paginate);
    }

    public function show($code)
    {
        return $this->planInvoiceRepository->view($code);
    }

    public function scheduleStatus()
    {
        return $this->planInvoiceRepository->outdated();
    }
}
