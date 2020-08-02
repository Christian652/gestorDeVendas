<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanReference extends Model
{
    protected $table = 'planreferences';
    protected $fillable = [
        'name', 'installationprice'
    ];

    public $timestamps = false;

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
