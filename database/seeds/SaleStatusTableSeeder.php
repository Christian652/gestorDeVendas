<?php

use App\SaleStatus;
use Illuminate\Database\Seeder;

class SaleStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SaleStatus::create([
            'name' => 'Cancelado'
        ]);

        SaleStatus::create([
            'name' => 'Inviabilidade'
        ]);

        SaleStatus::create([
            'name' => 'Instalado'
        ]);
    }
}
