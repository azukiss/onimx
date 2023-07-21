<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser, HasAvatar, HasName
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, TwoFactorAuthenticatable, HasRoles;

    protected $fillable = [
        'avatar',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function canAccessFilament(): bool
    {
        return $this->can('access-filament') && $this->hasVerifiedEmail();
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return !empty($this->avatar) ? asset($this->avatar) : asset('assets/images/default_avatar.jpg');
    }

    public function getFilamentName(): string
    {
        return "{$this->username}";
    }

    public function verifyEmail()
    {
        $this->attributes['email_verified_at'] = date('Y-m-d h:i:s', time());
        $this->save();
    }

    public function unVerifyEmail()
    {
        $this->attributes['email_verified_at'] = null;
        $this->save();
    }

    public function disableTwoFactor()
    {
        $this->attributes['two_factor_confirmed_at'] = null;
        $this->attributes['two_factor_secret'] = null;
        $this->attributes['two_factor_recovery_codes'] = null;
        $this->save();
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id', 'id');
    }
}
