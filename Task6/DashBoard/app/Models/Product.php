<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'desc_en',
        'desc_ar',
        'status',
        'price',
        'quantity',
        'brand_id',
        'subcategory_id',
        'image',
    ];
    public function getImageAttribute($value)
    {
        return url('/').'/images/products/'.($value);
    }
}
