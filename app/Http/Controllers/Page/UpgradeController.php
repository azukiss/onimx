<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Membership\Plan;
use Illuminate\Http\Request;

class UpgradeController extends Controller
{
    private $page_name = 'Upgrade';
    private $page_id = 'upgrade';
    private $show_ads = false;

    public function index()
    {
        return view('page.upgrade.index', [
            'page_name' => $this->page_name,
            'page_id' => $this->page_id,
            'show_ads' => $this->show_ads,
            'plans' => Plan::where('is_active', true)->orderBy('order', 'asc')->get(),
        ]);
    }

    public function payment(Plan $plan)
    {
        return view('page.upgrade.payment', [
            'page_name' => $this->page_name,
            'page_id' => $this->page_id,
            'show_ads' => $this->show_ads,
            'plan' => $plan,
        ]);
    }
}
