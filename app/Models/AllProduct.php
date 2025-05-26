<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllProduct extends Model
{
    protected $fillable = [
        'name',
        'description',
        'sku',
        'sales_quantity',
        'sales_remaining_products',
        'sales_price',
        'image_src',
        'image_alt',
        'product_gallery',
    ];
}
