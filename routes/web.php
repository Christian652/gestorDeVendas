<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth')->name('dashboard');

Route::get('/Entrar', 'DashboardController@login')->name("entrar");

Route::name('site.')->group(function () {

    Route::get("/" , "SiteController@index")->name('index');

});


Route::namespace('Admin')->prefix('Administrador')->name('admin.')->middleware(['can:acesso-administrador', 'auth'])->group(function(){  

    Route::resource("Usuarios", "UsersController")->names('users')->parameters(['Usuarios' => 'user']);

    Route::resource('Vendas', 'SalesController')->names('sales')->parameters(['Vendas'=> 'sale'])->except(['update', 'edit']);
    
    Route::resource('Vendedores', 'SalesmansController')->names('salesmans')->parameters(['Vendedores' => 'salesman']);

    Route::resource('Planos', 'PlanReferencesController')->names('planreferences')->except(['show'])->parameters(['Planos' => 'planReference']);

    Route::resource('Status-De-Venda', 'SaleStatusController')->names('salestatus')->except(['show'])->parameters(['Status-De-Venda' => 'saleStatus']);

});

Route::namespace('SalesMan')->prefix('Vendedor')->name('salesman.')->middleware(['can:acesso-vendedor', 'auth'])->group(function(){  
    
    Route::name("profile.")->prefix("Conta")->group(function () {
        
        Route::get("/", "ProfileController@index")->name('index');
        
        Route::put("Salvar/{user}", "ProfileController@update")->name('update');

    });
    
    Route::resource("Vendas", "SalesController")->names('sales')->parameters(['Vendas'=>'sale'])->except(['destroy']);

});

