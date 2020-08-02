<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleStatusRequest;
use App\SaleStatus;
use Illuminate\Http\Request;

class SaleStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saleStatus = SaleStatus::all();

        return view('Admin.SaleStatus.index', compact('saleStatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.SaleStatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleStatusRequest $request)
    {
        $status = SaleStatus::create($request->all());
        flash("Status De Venda $status->name Definido Com Sucesso!")->success();
        return redirect()->route('admin.salestatus.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SaleStatus  $saleStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleStatus $saleStatus)
    {
        return view('Admin.SaleStatus.edit', compact('saleStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SaleStatus  $saleStatus
     * @return \Illuminate\Http\Response
     */
    public function update(SaleStatusRequest $request, SaleStatus $saleStatus)
    {
        $saleStatus->update($request->all());
        flash("Status $saleStatus->name Salvo Com Sucesso!")->success();
        return redirect()->route('admin.salestatus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaleStatus  $saleStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleStatus $saleStatus)
    {
        $saleStatus->delete();
        
        flash("$saleStatus->name Removido Com Sucesso!")->success();
        
        return redirect()->route('admin.salestatus.index');
    }
}
