<?php

namespace App\Models\Membership;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanSubscriber extends Model
{
//    use HasFactory;

    Use SoftDeletes;

    protected $fillable = [
        'plan_id',
        'user_id',
        'role_id',
        'started_date',
        'ended_date',
    ];

    protected $casts = [
        'plan_id' => 'integer',
        'user_id' => 'integer',
        'role_id' => 'integer',
        'started_date' => 'datetime',
        'ended_date' => 'datetime',
    ];
}
