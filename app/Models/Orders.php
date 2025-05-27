<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'Product',
        'OrderID',
        'Date',
        'Customer_Name',
        'Status',
        'Amount',
        'client_id'
    ];

    public function client()
    {
        //recupere tout ce qui lui faut 
        return $this->belongsTo(User::class, 'client_id');
    }
}
