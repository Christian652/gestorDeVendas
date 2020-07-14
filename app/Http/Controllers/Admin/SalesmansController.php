<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sale;
use App\User;

class SalesmansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $salesmans = [];

        foreach($users as $user){
            if ($user->roles->first()->nome == "Vendedor") {
                array_push($salesmans, $user);
            }    
        }

        return view('Admin.Salesmans.index', compact("salesmans"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $sales = Sale::where('salesman_id', $user->id)->paginate(4);
        $username = explode(' ', $user->name)[0];
        
        return view('Admin.Salesmans.show', compact("sales", 'user', 'username'));
    }
}
