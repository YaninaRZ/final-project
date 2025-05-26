<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $fillable = [
        'Product',
        'OrderID',
        'Date',
        'Customer_Name',
        'Status',
        'Amount',
    ];
}
