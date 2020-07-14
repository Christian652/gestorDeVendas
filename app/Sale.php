<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'salesman_id', 'name', 'cpf', 'rg', 'email', 'cell1', 'cell2', 'address', 'district', 'birthday', 'cep', 'referencepoint', 'endday', 'installationdate', 'plan', 'fidelidade' 
    ];

    public function salesman()
    {
        return $this->belongsTo(\App\User::class, 'salesman_id', 'id');   
    }
}
