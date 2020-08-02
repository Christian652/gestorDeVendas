<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Salesman;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $admins = [];

        $users = User::all();

        foreach ($users as $user) {
            if ($user->roles()->first()->nome == "Administrador") {
                array_push($admins, $user);
            }
        }

        $countsalesmans = Salesman::count();
        $countadmin = count($admins);

        $countsales = Sale::all()->count();

        return view('home', compact("countsalesmans", "countsales", "countadmin"));
    }

    public function login()
    {
        return view('login');
    }
}
