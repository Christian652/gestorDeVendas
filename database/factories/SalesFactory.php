<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'name' => "Venda De Testes",
        'cpf' => '123.456.789-12',
        'rg' => "12345678901234",
        'cell1' => "9 1234-1234",
        'cell2' => "9 9876-5432",
        'email' => $faker->unique()->safeEmail,
        'birthday' => "12/12/2012",
        'district' => "Bairro Das Garças",
        'address' => "av: pedro pereira num:34",
        'cep' => "12345-123",
        'referencepoint' => "perto de uma revendedora de automoveis , uma casinha verde com um poste branco e uma lixeira",
        'salesman_id' => 2,
        'fidelidade' => true,
        'endday' => '23',
        'installationdate' => "12/05/2020 depois das 14:30",
        'plan' => "plano de 200gb com fidelidade por 170BRL"
    ];
});
