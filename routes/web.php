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

Route::get('/', function () {
    return view('welcome');
})->name("/");

Route::namespace('Admin')->prefix('Administrador')->name('admin.')->middleware('can:acesso-administrador')->group(function(){  

    Route::resource("Usuarios", "UsersController")->names('users')->parameters(['Usuarios' => 'user']);

    Route::resource("Clientes", "ClientsController")->names('clients')->parameters(['Clientes' => 'client']);

    Route::get("Vendas", "SalesController@index")->name('sales.index');

    Route::prefix('Vendedores')->name('salesmans.')->group(function(){

        Route::get("/", "SalesMansController@index")->name('index');
          
        Route::get("/{user}", "SalesMansController@show")->name('show');
    
    });

});

Route::namespace('SalesMan')->prefix('Vendedor')->name('salesman.')->middleware('can:acesso-vendedor')->group(function(){  
    
    Route::get("/", "SalesMansController@index")->name('');

});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth')->name('dashboard');
