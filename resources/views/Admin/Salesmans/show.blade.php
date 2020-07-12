@extends('layouts.dashboard')

@section('content')
    @if(!count($sales))
    <div class="alert alert-info text-center" role="alert">
        <strong>Não Foi Econtrado Nenhuma Venda Registrada Na Plataforma Por {{ $username }}</strong>
    </div>
    @endif
    <h1 class="font-weight-bold text-center">Vendas Feitas Por {{ $username }}</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            
            <div class="btn-group">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success">Cadastrar Vendedor</a>
            </div>
        </div>
    </div>
    <hr class="m-1 mb-3">
    <div class="container">
        <div class="row">
            @foreach($sales as $sale)
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="card border-info">
                    <div class="card-body">
                        <p class="lead"><strong class="font-weight-bold">Cliente</strong> <br> Christian Ferreira Costa De Castro</p>
                        <hr class="m-0">
                        <p class="lead"><strong class="font-weight-bold">Sobre</strong> <br> Vendi Duas Passagens Para Miami Com Ida no dia 24 de março e voltar em 28 de março</p>
                        <hr class="m-0">
                        <div class="d-flex justify-content-between">
                            <p class="lead"><strong class="font-weight-bold">Ganho</strong> <br> 4000 BRL</p>
                        
                            <p class="lead"><strong class="font-weight-bold">Data</strong> <br> 20/04/2020</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection