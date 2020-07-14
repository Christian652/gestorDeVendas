<?php

namespace App\Http\Controllers;

use App\Sale;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $salesmans = [];
        $admins = [];

        $users = User::all();

        foreach ($users as $user) {
            if ($user->roles()->first()->nome == "Vendedor") {
                array_push($salesmans, $user);
            }

            if ($user->roles()->first()->nome == "Administrador") {
                array_push($admins, $user);
            }
        }

        $countsalesmans = count($salesmans);
        $countadmin = count($admins);

        $countsales = Sale::all()->count();
        return view('home', compact("countsalesmans", "countsales", "countadmin"));
    }
}
