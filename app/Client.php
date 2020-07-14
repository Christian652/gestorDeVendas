<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'rg', 'cpf', 'email', 'salesman_id'
    ];
}
