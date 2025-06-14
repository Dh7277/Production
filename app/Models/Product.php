<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'compare_price',
        'category_id',
        'sub_category_id',
        'brand_id',
        'is_featured',
        'sku',
        'barcode',
        'track_qty',
        'qty',
        'status',
    ];
}
