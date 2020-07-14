@extends('layouts.dashboard')

@section('content')
    @if(!count($sales))
    <div class="alert alert-info text-center" role="alert">
        <strong>Não Foi Econtrado Nenhuma Venda Registrada Por {{ explode(' ', auth()->user()->name)[0] }}</strong>
    </div>
    @else
    <h1 class="font-weight-bold text-center mb-4">Minhas Vendas</h1>
    <p class="lead text-center">No Momento Foram Registradas {{ auth()->user()->sales->count() }} Vendas Por Você!</p>
    @endif
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('salesman.sales.create') }}" class="btn btn-success">Registrar Venda</a>
            </div>
        </div>
    </div>
    <hr class="m-1">
    
    <div class="row justify-content-center">
            {{ $sales }}
        </div>
    <div class="container">
        <div class="row">
            @foreach($sales as $sale)
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="card border-info">
                    <div class="card-header bg-white border-info">
                        <div class="d-flex">
                            <a href="{{ route('salesman.sales.edit', ['sale' => $sale->id]) }}" class="btn btn-success rounded-circle">
                                <div class="material-icons float-left">edit</div>
                            </a>

                            <a href="{{ route('salesman.sales.show', ['sale' => $sale->id]) }}" class="btn btn-sm py-2 ml-2 btn-info ">
                                <div class="material-icons float-left">info</div>
                                <span class="float-right">
                                Mais Informações
                                </span>
                            </a>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Nome: {{ $sale->name }}</li>
                        <li class="list-group-item">Contato1: {{ $sale->cell1 }}</li>
                        <li class="list-group-item">Bairro: {{ $sale->district }}</li>
                        <li class="list-group-item">Endereço: {{ $sale->address }}</li>
                        <li class="list-group-item">Ponto De Referencia: {{ $sale->referencepoint }}</li>
                        <li class="list-group-item">Dia De Pagamento: {{ $sale->endday }}</li>
                    </ul>
                </div>
            </div>
            @endforeach

        </div>
        <div class="row justify-content-center">
            {{ $sales }}
        </div>
    </div>

@endsection