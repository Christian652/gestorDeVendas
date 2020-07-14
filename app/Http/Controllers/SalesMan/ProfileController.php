<?php

namespace App\Http\Controllers\SalesMan;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() 
    {
        $user = auth()->user();
        return view('Salesman.profile', compact("user"));
    }

    public function update(EditUserRequest $request, User $user) 
    {        
        $password = $user->password;
        
        if ($request->password !== "" && $request->password !== " " && $password != null) {
            $password = Hash::make($request->password);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);
        flash('Edição Bem Sucedida');

        return redirect()->route('salesman.profile.index');
    }
}
