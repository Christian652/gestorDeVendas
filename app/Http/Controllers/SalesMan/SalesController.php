<?php

namespace App\Http\Controllers\SalesMan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $sales = Sale::where('salesman_id', $id)->orderBy('id', 'desc')->paginate(6);
        return view("Salesman.Sales.index", compact("sales"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Salesman.Sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        if ($request->fidelidade == 'true') {
            $fidelidade = true;
        } else {
            $fidelidade = false;
        }

        Sale::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'cell1' => $request->cell1,
            'cell2' => $request->cell2,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'district' => $request->district,
            'address' => $request->address,
            'cep' => $request->cep,
            'referencepoint' => $request->referencepoint,
            'salesman_id' => auth()->user()->id,
            'fidelidade' => $fidelidade,
            'endday' => $request->endday,
            'installationdate' => $request->installationdate,
            'plan' => $request->plan
        ]);

        flash('Venda Registrada Com Sucesso!')->success();
        return redirect()->route('salesman.sales.index');
    }

    public function show(Sale $sale)
    {
        return view('Salesman.Sales.show', ['sale' => $sale]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        return view('Salesman.Sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(SaleRequest $request, Sale $sale)
    {
        if ($request->fidelidade == 'true') {
            $fidelidade = true;
        } else {
            $fidelidade = false;
        }

        $sale->update([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'cell1' => $request->cell1,
            'cell2' => $request->cell2,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'district' => $request->district,
            'address' => $request->address,
            'cep' => $request->cep,
            'referencepoint' => $request->referencepoint,
            'salesman_id' => auth()->user()->id,
            'fidelidade' => $fidelidade,
            'endday' => $request->endday,
            'installationdate' => $request->installationdate,
            'plan' => $request->plan
        ]);

        flash('Venda Registrada Com Sucesso!')->success();
        return redirect()->route('salesman.sales.index');
    }
}
