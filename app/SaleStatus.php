<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleStatus extends Model
{
    protected $table = 'salestatus';
    protected $fillable = [
        'name', 'id'
    ];

    public $timestamps = false;

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
