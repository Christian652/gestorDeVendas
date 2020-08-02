@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <h2 class="display-4 text-center">Bem Vindo {{ explode(' ', auth()->user()->name)[0] }}</h2>
    <hr>
    @can('acesso-administrador')
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 my-4">
                <div class="card bg-info text-white">
                    <div class="card-body p-2">
                        <div class="d-flex flex-column justify-content-around align-items-center">
                            <div style="font-size: 6em;" class="material-icons float-left">description</div>
                            <div class="w-100 d-flex justify-content-center align-items-center">
                                <span class="font-weight-bold" style="font-size: 3em;">{{ $countsales}}</span>
                            </div>
                            <a href="{{ route('admin.sales.index') }}" class="btn btn-block btn-light mt-3">Relatorio De Vendas</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4 my-4">
                <div class="card bg-success text-white">
                    <div class="card-body p-2">
                        <div class="d-flex flex-column justify-content-around align-items-center">
                            <div style="font-size: 6em;" class="material-icons float-left">shopping_cart</div>
                            <div class="w-100 d-flex justify-content-center align-items-center">
                                <span class="font-weight-bold" style="font-size: 3em;">{{ $countsalesmans}}</span>
                            </div>
                            <a href="{{ route('admin.salesmans.index') }}" class="btn btn-block btn-light mt-3">Vendedores</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4 my-4">
                <div class="card bg-primary text-white">
                    <div class="card-body p-2">
                        <div class="d-flex flex-column justify-content-around align-items-center">
                            <div style="font-size: 6em;" class="material-icons float-left">admin_panel_settings</div>
                            <div class="w-100 d-flex justify-content-center align-items-center">
                                <span class="font-weight-bold" style="font-size: 3em;">{{ $countadmin}}</span>
                            </div>
                            <p class="lead mt-1">Administrador(es)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endcan

    @can('acesso-vendedor')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 my-4">
                <div class="card bg-info text-white">
                    <div class="card-body p-2">
                        <div class="d-flex flex-column justify-content-around align-items-center">
                            <div style="font-size: 6em;" class="material-icons float-left">description</div>
                            <div class="w-100 d-flex justify-content-center align-items-center">
                                <span class="font-weight-bold" style="font-size: 3em;"> {{ auth()->user()->salesman->sales()->count()}}</span>
                            </div>
                            <a href="{{ route('salesman.sales.index') }}" class="btn btn-block btn-light mt-3">Relatorio De Vendas</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 my-4">
                <div class="card bg-success text-white">
                    <div class="card-body p-2">
                        <div class="d-flex flex-column justify-content-around align-items-center">
                            <div style="font-size: 6em;" class="material-icons float-left">create</div>
                            
                            <a href="{{ route('salesman.sales.create') }}" class="btn btn-block btn-light mt-3">Registrar Venda</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 my-4">
                <div class="card bg-secondary text-white">
                    <div class="card-body p-2">
                        <div class="d-flex flex-column justify-content-around align-items-center">
                            <div style="font-size: 6em;" class="material-icons float-left">account_box</div>
                            
                            <a href="{{ route('salesman.profile.index') }}" class="btn btn-block btn-light mt-3">Minhas Informações</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <hr>
</div>
@endsection
