<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function types(){
        return $this->belongsTo(Type::class);
    }
    public function checkouts(){
        return $this->hasMany(Checkout::class);
    }
}
