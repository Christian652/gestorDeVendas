<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'salesman_id', 'planreference_id', 'salestatus_id', 'name', 'cpf', 'rg', 'email', 
        'cell1', 'cell2', 'address', 'district', 'birthday', 'cep', 'referencepoint', 'endday', 
        'installationdate' , 'cancelation_reason'
    ];

    public function salesman()
    {
        return $this->belongsTo(\App\Salesman::class);   
    }

    public function salestatus()
    {
        return $this->belongsTo(SaleStatus::class);
    }

    public function planreference()
    {
        return $this->belongsTo(PlanReference::class);
    }

    public function getColorClassAttribute()
    {
        $status = $this->salestatus->name;

        if ($status == "Inviabilidade") {
            $border_class = "border-warning";
            $background_class = "bg-warning";
            $only_text = "text-warning";
        } else if ($status == "Instalado") {
            $border_class = "border-success";
            $background_class = "bg-success text-white";
            $only_text = "text-success";
        } else if ($status == "Cancelado") {
            $border_class = "border-danger";
            $background_class = "bg-danger text-white";
            $only_text = "text-danger";
        }

        return [
            'bg' => $background_class,
            'border' => $border_class,
            'text' => $only_text
        ];
    }
}
