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

        $admin = User::create([
            'name'=>'Christian',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('administrador')
        ]);

        $admin->roles()->attach($adminRole);
    }
}
