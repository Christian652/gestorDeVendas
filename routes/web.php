<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::name('site.')->group(function () {

    Route::get("/" , "SiteController@index")->name('index');

});

Route::get('/Entrar', function () {
    return view('login');
})->name("entrar");

Route::namespace('Admin')->prefix('Administrador')->name('admin.')->middleware(['can:acesso-administrador', 'auth'])->group(function(){  

    Route::resource("Usuarios", "UsersController")->names('users')->parameters(['Usuarios' => 'user']);

    Route::resource("Clientes", "ClientsController")->names('clients')->parameters(['Clientes' => 'client']);

    Route::get("Vendas", "SalesController@index")->name('sales.index');
    Route::get("Vendas/{sale}", "SalesController@show")->name('sales.show');
    Route::delete("Vendas/{sale}", "SalesController@destroy")->name('sales.destroy');

    Route::prefix('Vendedores')->name('salesmans.')->group(function(){

        Route::get("/", "SalesMansController@index")->name('index');
          
        Route::get("/{user}", "SalesMansController@show")->name('show');
    
    });

});

Route::namespace('SalesMan')->prefix('Vendedor')->name('salesman.')->middleware(['can:acesso-vendedor', 'auth'])->group(function(){  
    
    Route::name("profile.")->prefix("Conta")->group(function () {
        Route::get("/", "ProfileController@index")->name('index');
        Route::put("Salvar/{user}", "ProfileController@update")->name('update');
    });
    
    Route::resource("Clientes", "ClientsController")->names('clients')->except(['destroy'])->parameters(['Clientes' => 'client']);

    Route::resource("Vendas", "SalesController")->names('sales')->parameters(['Vendas'=>'sale'])->except(['destroy']);

});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth')->name('dashboard');
