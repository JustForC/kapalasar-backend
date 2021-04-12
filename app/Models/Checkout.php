<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function merchants(){
        return $this->belongsTo(User::class, 'merchants_id', 'id');
    }
    public function vouchers(){
        return $this->belongsTo(Voucher::class);
    }
    public function costs(){
        return $this->belongsTo(Cost::class, 'checkouts_id', 'id');
    }
}
