<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function banners(){
        return $this->hasMany(Banner::class);
    }
    public function products(){
    	return $this->belongsToMany(Product::class, 'banners', 'advertisements_id', 'products_id');
    }
}
