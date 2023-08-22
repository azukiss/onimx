<?php

namespace App\Repositories\Membership;

use Carbon\Carbon;
use App\Models\Membership\PlanInvoice;
use App\Enum\PlanInvoice\StatusEnum;

class PlanInvoiceRepository
{
    protected $planInvoice;

    public function __construct(PlanInvoice $planInvoice)
    {
        $this->planInvoice = $planInvoice;
    }

    public function livewireViewAll($orderBy, $sortBy, $paginate)
    {
        return $this->planInvoice->select('code','user_id','plan_id','status','created_at','due_at')
        ->where('user_id', auth()->user()->id)
        ->orderBy($orderBy, $sortBy)
        ->paginate($paginate);
    }

    public function viewAll($orderBy, $sortBy, $paginate)
    {
        return $this->planInvoice->orderBy($orderBy, $sortBy)->paginate($paginate);
    }

    public function view($code)
    {
        return $this->planInvoice->where('code', $code)->first();
    }

    public function outdated() {
        return $this->planInvoice
                    ->where('status', StatusEnum::Unpaid)
                    ->where('due_at', '<', Carbon::now()->toDateTimeString())
                    ->update([
                        'status' => StatusEnum::Cancelled,
                    ]);;
    }
}
