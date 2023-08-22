<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Membership\PlanInvoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $page_id = 'invoices';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return view('page.invoice', [
        //     'page_title' => __('Invoices'),
        //     'page_id' => $this->page_id,
        // ]);

        // Temporary
        return redirect()->route('page.invoice.upgrade.index');
    }
}
