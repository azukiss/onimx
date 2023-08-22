<?php

namespace App\Http\Controllers\Invoice;

use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Membership\PlanInvoiceProof;
use App\Models\Membership\PlanInvoice;
use App\Http\Controllers\Controller;
use App\Enum\PlanInvoice\StatusEnum;
use App\Services\Membership\PlanInvoiceService;
use Carbon\Carbon;

class UpgradeInvoiceController extends Controller
{
    protected $page_title = 'Upgrade Invoice';
    protected $page_id = 'upgrade-invoice';

    protected $planInvoiceService;

    public function __construct(PlanInvoiceService $planInvoiceService)
    {
        $this->middleware('verified');
        $this->planInvoiceService = $planInvoiceService;
    }

    public function index()
    {
        return view('page.upgrade.invoice.index', [
            'page_title' => $this->page_title . 's',
            'page_id' => $this->page_id,
        ]);
    }

    public function show(PlanInvoice $planInvoice)
    {
        return view('page.upgrade.invoice.show', [
            'page_title' => $this->page_title . ' #' . $planInvoice->code,
            'page_id' => $this->page_id,
            'invoice' => $planInvoice,
        ]);
    }

    public function proofUpload(PlanInvoice $planInvoice, Request $request)
    {
        if(!$planInvoice->paymentProof()->exists())
        {
            $request->validate([
                'fileupload' => ['required', 'max:5'],
                'fileupload.*' => ['image', 'max:10240'],
                'additionalProof' => ['nullable', 'string', 'max:5120'],
            ]);

            DB::transaction(function () use ($request, $planInvoice) {
                $proofs = [];

                if ($request->hasfile('fileupload')) {
                    $prefix = bin2hex(random_bytes(10));

                    foreach ($request->file('fileupload') as $key => $file) {
                        $img = Image::make($file);

                        $filename = 'invoices/proof/' . $prefix . '_' . $key . '.' . $file->extension();
                        Storage::disk('public')->put($filename, $img->stream());
                        $proofs[] = $filename;

                        $img->destroy();
                    }
                }

                PlanInvoiceProof::create([
                    'invoice_id' => $planInvoice->id,
                    'upload' => $proofs,
                    'other' => $request->additionalProof,
                ]);

                $planInvoice->update([
                    'status' => StatusEnum::Pending,
                    'paid_at' => Carbon::now()->toDateTimeString(),
                ]);
            });

            Alert::toast('Proof uploaded!', 'success');
        }
        else
        {
            Alert::toast('Something error!', 'error');
        }

        return redirect()->route('page.invoice.upgrade.show', $planInvoice->code);
    }

    public function proofRemove(PlanInvoice $planInvoice, PlanInvoiceProof $planInvoiceProof)
    {
        if(in_array($planInvoice->status, [StatusEnum::Unpaid->value, StatusEnum::Pending->value, StatusEnum::Partial->value]))
        {
            foreach ($planInvoiceProof->upload as $upload) {
                File::delete(storage_path('app/public/' . $upload));
            }

            $planInvoiceProof->forceDelete();

            $planInvoice->update([
                'status' => StatusEnum::Unpaid,
                'paid_at' => null,
            ]);

            Alert::toast('Proof removed!', 'success');
        }
        else
        {
            Alert::toast('Something error!', 'error');
        }

        return redirect()->route('page.invoice.upgrade.show', $planInvoice->code);
    }

    public function proofDownload(PlanInvoice $planInvoice, $key)
    {
        if($planInvoice->paymentProof()->exists() && $planInvoice->user->id == auth()->user()->id)
        {
            $name = $planInvoice->paymentProof->upload[$key];
            $path = storage_path('app/public/' . $name);
            $filename = $planInvoice->code . '_' . str($name)->replace('/', '_');

            return response()->download($path, $filename);
        }

        return abort('404');
    }
}
