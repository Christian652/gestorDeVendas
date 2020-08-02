<?php

namespace App\Http\Controllers\SalesMan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\PlanReference;
use App\Sale;
use App\SaleStatus;
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
        $sales = auth()->user()->salesman->sales()->orderBy('id', 'DESC')->paginate(10);
        $countsales = $sales->count();
        $countsalesmessage = "";
       
        if ($countsales > 1) {
            $countsalesmessage = explode(' ', auth()->user()->name)[0]." No Momento Foram Registradas " . $countsales . " Vendas Por Você!";
        } else {
            $countsalesmessage = "No Momento Foi Registrada 1 Venda Por Você!";
        }

        return view("Salesman.Sales.index", compact("sales", "countsalesmessage"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans = PlanReference::all();
        return view('Salesman.Sales.create', compact('plans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        $startstatus = SaleStatus::where('name', 'Inviabilidade')->first()->id;

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
            'salesman_id' => auth()->user()->salesman->id,
            'endday' => $request->endday,
            'installationdate' => $request->installationdate,
            'planreference_id' => $request->planreference_id,
            'salestatus_id' => $startstatus
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
        $salestatus = SaleStatus::all(['name', 'id']);
        $plans = PlanReference::all(['name', 'id']);
        return view('Salesman.Sales.edit', compact('sale', 'plans', 'salestatus'));
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
        $cancelationReason = null;
        
        if ($request->cancelation_reason) $cancelationReason = $request->cancelation_reason;

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
            'endday' => $request->endday,
            'installationdate' => $request->installationdate,
            'planreference_id' => $request->planreference_id,
            'salestatus_id' => $request->status,
            'cancelation_reason' => $cancelationReason
        ]);

        flash('Venda Editada e Salva Com Sucesso!')->success();
        return redirect()->route('salesman.sales.index');
    }
}
