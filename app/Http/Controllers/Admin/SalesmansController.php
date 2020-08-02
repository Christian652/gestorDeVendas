<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesmanEditRequest;
use App\Http\Requests\SalesmanRequest;
use App\Role;
use App\Salesman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SalesmansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $salesmans = Salesman::paginate(8);
        $searched = false;
        if ($request->search) {
            $searchingSalesmans = \App\User::where('name', 'like', "%$request->search%")->paginate(8);
            
            $search = "'%$request->search%'";
            
            $salesmans = DB::select("select * from salesmans inner join users on users.id = salesmans.user_id where name like" . $search);
            dd($salesmans);
            $searched = true;
        }

        return view('Admin.Salesmans.index', compact("salesmans", "searched"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Salesmans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesmanRequest $request)
    {
        $user = \App\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $roleid = Role::where('nome', 'Vendedor')->first()->id;
        $user->roles()->attach($roleid);

        $user->salesman()->create($request->all());
        
        flash("Vendedor Cadastrado Com Sucesso")->success();
        return redirect()->route('admin.salesmans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salesman  $salesman
     * @return \Illuminate\Http\Response
     */
    public function show(Salesman $salesman)
    {
        $sales = $salesman->sales()->paginate(4);
        return view('Admin.Salesmans.show', compact("salesman", "sales"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salesman  $salesman
     * @return \Illuminate\Http\Response
     */
    public function edit(Salesman $salesman)
    {
        return view('Admin.Salesmans.edit', compact("salesman"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salesman  $salesman
     * @return \Illuminate\Http\Response
     */
    public function update(SalesmanEditRequest $request, Salesman $salesman)
    {
        $user = $salesman->user;
        $password = $user->password;
        
        if ($request->password !== "" && $request->password !== " " && $request->password !== null) {
            $password = Hash::make($request->password);
        }
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);

        $salesman->update($request->all());

        flash("Vendedor Editado E Salvo Com Sucesso!")->success();
        return redirect()->route('admin.salesmans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salesman  $salesman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salesman $salesman)
    {
        $salesman->user()->delete();
        $salesman->delete();
        flash("Vendedor deletado com sucesso!")->success();
        return redirect()->route('admin.salesmans.index');
    }
}
