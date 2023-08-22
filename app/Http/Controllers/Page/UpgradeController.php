<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Models\Membership\Plan;
use App\Enum\PlanInvoice\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Membership\PlanInvoice;
use App\Models\Membership\PlanPayment;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;

class UpgradeController extends Controller
{
    private $page_title = 'Upgrade';
    private $page_id = 'upgrade';
    private $show_ads = false;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('page.upgrade.index', [
            'page_title' => $this->page_title,
            'page_id' => $this->page_id,
            'show_ads' => $this->show_ads,
            'plans' => Plan::with('features')->where('is_active', true)->orderBy('order', 'asc')->get(),
        ]);
    }

    public function payment(Plan $plan)
    {
        return view('page.upgrade.payment', [
            'page_title' => __('Order Confirmation'),
            'page_id' => $this->page_id . '-payment',
            'show_ads' => $this->show_ads,
            'plan' => $plan,
            'payments' => PlanPayment::select('code', 'name')->where('is_active', true)->orderBy('type', 'asc')->get(),
        ]);
    }

    public function makeInvoice(Plan $plan, Request $request)
    {
        $request->validate([
            'quantity' => ['required', 'numeric', 'min:1', 'max:12'],
            'payment' => ['required', 'exists:App\Models\Membership\PlanPayment,code']
        ]);

        $invoice_code = IdGenerator::generate([
            'table' => 'plan_invoices',
            'field' => 'code',
            'length' => 7,
            'prefix' => 'INV',
        ]);

        $payment = PlanPayment::select('id', 'code', 'name', 'holder', 'type', 'address')->where('code', $request->payment)->first();

        $item = [
            'code' => $plan->code,
            'name' => $plan->name,
            'quantity' => ($request->quantity > 1) ? $request->quantity . ' ' . __('Months') : $request->quantity . ' ' . __('Month'),
            'price' => $plan->price,
            'total' => intval($plan->price) * intval($request->quantity),
        ];

        PlanInvoice::create([
            'code' => $invoice_code,
            'user_id' => auth()->user()->id,
            'plan_id' => $plan->id,
            'payment_id' => $payment->id,
            'payment' => $payment,
            'item' => $item,
            'status' => StatusEnum::Unpaid,
            'due_at' => Carbon::now()->addHours(24),
        ]);

        Alert::toast('Invoice Created!', 'success');
        return redirect()->route('page.invoice.upgrade.show', ['planInvoice' => $invoice_code]);
    }
}
