<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    protected $table = 'salesmans';
    protected $fillable = [
        'rg', 'cpf', 'user_id', 'birthday', 'observations'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
