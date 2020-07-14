@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center mb-4">Venda De Numero {{ $sale->id }}</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-info">
                    <div class="card-header bg-white border-info">
                        <div class="d-flex">
                            <a href="{{ route('salesman.sales.edit', ['sale' => $sale->id]) }}" class="btn btn-success rounded-circle">
                                <div class="material-icons float-left">edit</div>
                            </a>

                            <a href="{{ route('salesman.sales.index') }}" class="btn btn-sm py-2 ml-2 btn-info ">
                                <div class="material-icons float-left">info</div>
                                <span class="float-right">
                                Relatorio de Vendas
                                </span>
                            </a>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Nome: {{ $sale->name }}</li>
                        <li class="list-group-item">Nascimento: {{ $sale->birthday }}</li>
                        <li class="list-group-item">Cpf: {{ $sale->cpf }}</li>
                        <li class="list-group-item">Rg: {{ $sale->rg }}</li>
                        <li class="list-group-item">Contato1: {{ $sale->cell1 }}</li>
                        <li class="list-group-item">Contato2: {{ $sale->cell2 }}</li>
                        <li class="list-group-item">Bairro: {{ $sale->district }}</li>
                        <li class="list-group-item">Endereço: {{ $sale->address }}</li>
                        <li class="list-group-item">Cep: {{ $sale->cep }}</li>
                        <li class="list-group-item">Ponto De Referencia: {{ $sale->referencepoint }}</li>
                        <li class="list-group-item">Dia De Pagamento: {{ $sale->endday }}</li>
                        <li class="list-group-item">Data Da Instalação: {{ $sale->installationdate }}</li>
                        <li class="list-group-item">Plano: {{ $sale->plan }}</li>
                        <li class="list-group-item">Fidelidade: @if($sale->fidelidade) Sim @else Não @endif</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection