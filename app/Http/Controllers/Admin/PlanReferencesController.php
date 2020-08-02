<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanReferencesRequest;
use App\PlanReference;

class PlanReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planReferences = PlanReference::all();

        return view('Admin.PlanReferences.index', compact('planReferences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.PlanReferences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanReferencesRequest $request)
    {
        PlanReference::create($request->all());
        
        return redirect()->route('admin.planreferences.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlanReference  $planReference
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanReference $planReference)
    {
        return view('Admin.PlanReferences.edit', compact('planReference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlanReference  $planReference
     * @return \Illuminate\Http\Response
     */
    public function update(PlanReferencesRequest $request, PlanReference $planReference)
    {
        $planReference->update($request->all());

        return redirect()->route('admin.planreferences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlanReference  $planReference
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanReference $planReference)
    {
        $planReference->delete();

        return redirect()->route('admin.planreferences.index');    
    }
}
