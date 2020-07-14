<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('nome','Administrador')->first();
        $vendedorRole = Role::where('nome', 'Vendedor')->first();

        $admin = User::create([
            'name'=>'Christian',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('administrador')
        ]);

        $vendedor = User::create([
            'name'=>'Christian',
            'email'=>'vendedor@gmail.com',
            'password'=>Hash::make('vendedor')
        ]); 

        $admin->roles()->attach($adminRole);
        $vendedor->roles()->attach($vendedorRole);
    }
}
