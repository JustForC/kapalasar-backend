<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flash extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function flash_sales(){
        return $this->hasMany(FlashSale::class);
    }
}
