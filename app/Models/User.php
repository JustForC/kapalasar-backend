<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // use HasApiTokens;
    use HasFactory;
    // use HasProfilePhoto;
    // use HasTeams;
    use Notifiable;
    // use TwoFactorAuthenticatable;

    protected $fillable = [
        'name', 'email', 'password', 'address', 'address_detail', 'phone', 'referral_code', 'roles_id','job'
    ];

    protected $guard = [ ];

    protected $hidden = [
        'password',
        'remember_token',
        // 'two_factor_recovery_codes',
        // 'two_factor_secret',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // protected $appends = [
    //     'profile_photo_url',
    // ];

    public function roles(){
        return $this->belongsTo(Role::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function checkouts(){
        return $this->hasMany(Checkout::class);
    }
}
