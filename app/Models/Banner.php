<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function advertisements(){
        return $this->belongsTo(Advertisement::class);
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
