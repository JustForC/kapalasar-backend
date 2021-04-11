<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories(){
        return $this->belongsTo(Category::class);
    }
    public function flash_sales(){
        return $this->hasMany(FlashSale::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function banners(){
        return $this->hasMany(Banner::class);
    }
    public function advertisements(){
    	return $this->belongsToMany(Advertisement::class, 'banners', 'products_id', 'advertisements_id');
    }
}
