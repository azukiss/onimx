<?php

namespace App\Models\Membership;

use App\Enum\PlanInvoice\StatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanInvoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'user_id',
        'plan_id',
        'payment_id',
        'customer',
        'payment',
        'item',
        'status',
        'due_at',
        'paid_at',
    ];

    protected $casts = [
        'code' => 'string',
        'user_id' => 'integer',
        'plan_id' => 'integer',
        'payment_id' => 'integer',
        'customer' => 'array',
        'payment' => 'array',
        'item' => 'array',
        'status' => StatusEnum::class,
        'due_at' => 'datetime',
        'paid_at' => 'datetime',
    ];

    protected $hidden = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PlanPayment::class, 'payment_id', 'id');
    }

    public function paymentProof(): HasOne
    {
        return $this->hasOne(PlanInvoiceProof::class, 'invoice_id', 'id');
    }
}
