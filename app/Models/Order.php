<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }

    protected $fillable = [
        'status',
        'amount',
        'client_id'
    ];

    public function client()
    {
        //recupere tout ce qui lui faut 
        return $this->belongsTo(User::class, 'client_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
