<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawusers = User::all();

        $users = [];

        foreach ($rawusers as $user) {
            if (!$user->salesman) {
                array_push($users, $user);
            }
        }
        
        return view('Admin.User.index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.User.create");      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::where('nome', 'Administrador')->first();
        
        $user->roles()->attach($role->id);
        
        flash('Administrador Cadastrado Com Sucesso')->success();
        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $username = explode(' ', $user->name)[0];

        return view('Admin.User.edit', compact("user", "username"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $user)
    {
        $password = $user->password;
        
        if ($request->password !== "" && $request->password !== " " && $request->password !== null) {
            $password = Hash::make($request->password);
        }
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);
        
        flash('Edição Bem Sucedida')->success();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == auth()->user()->id) {
            flash('Você Não Pode Deletar a Si Mesmo')->warning();
            
            return redirect()->route('admin.users.index');
        }

        if ($user->roles()->first()->nome == "Vendedor") {
            flash('Para deletar um vendedor você precisa estar na seção de vendedores para remover as informações dele por completo')->info();
            
            return redirect()->route('admin.salesmans.index');
        }
        
        $user->delete();
        
        flash('Usuario Deletado Com Sucesso!')->success();
        return redirect()->route('admin.users.index');
    }
}
