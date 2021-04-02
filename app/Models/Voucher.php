<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'voucher_name',
        'voucher_type',
        'voucher_amount',
        'voucher_description',
        'voucher_category',
        'voucher_start',
        'voucher_end',
    ];
}
