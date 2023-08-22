<?php

namespace App\Models\Membership;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanInvoiceProof extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'invoice_id',
        'upload',
        'other',
        'is_checked',
        'is_valid',
        'checked_at',
    ];

    protected $casts = [
        'invoice_id' => 'integer',
        'upload' => 'array',
        'other' => 'string',
        'is_checked' => 'boolean',
        'is_valid' => 'boolean',
        'checked_at' => 'datetime',
    ];

    protected $hidden = [];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(PlanInvoice::class, 'id', 'invoice_id');
    }
}
