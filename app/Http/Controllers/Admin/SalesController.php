<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sale;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::paginate(6);
        return view("Admin.Sales.index", compact("sales"));
    }

    public function show(Sale $sale)
    {
        return view('Admin.Sales.show', compact("sale"));
    }

    public function destroy(Sale $sale) 
    {
        $sale->delete();

        flash('Venda Deletada Com Sucesso!')->success();

        return redirect()->back();
    }
}
