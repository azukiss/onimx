<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use SoftDeletes;

    public $fillable = [
        'txtcolor',
        'bgcolor',
        'icon',
        'order',
    ];

    public $casts = [
        'txtcolor' => 'string',
        'bgcolor' => 'string',
        'icon' => 'string',
        'order' => 'integer',
    ];
}
