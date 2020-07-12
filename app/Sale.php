<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'client_id', 'salesman_id', 'description', 'totalPrice', 'saledDate' 
    ];

    public function client()
    {
        return $this->belongsTo(\App\Client::class);   
    }

    public function salesman()
    {
        return $this->belongsTo(\App\User::class, 'salesman_id', 'id');   
    }
}
