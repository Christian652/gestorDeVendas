@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center mb-4">Venda De Numero {{ $sale->id }}</h1>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-info">
                    <div class="card-header bg-white border-info">
                        <div class="d-flex">
                            <form action="{{ route('admin.sales.destroy', ['sale' => $sale->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm px-1 py-1">
                                    <div class="material-icons float-left">delete</div>
                                </button>
                            </form>

                            <a href="{{ route('admin.sales.index') }}" class="btn btn-sm py-2 ml-2 btn-info ">
                                <div class="material-icons float-left">info</div>
                                <span class="float-right">
                                Relatorio de Vendas
                                </span>
                            </a>
                        </div>
                    </div>
                    <ul class="list-group">
                        @if($sale->cancelation_reason)
                        <li class="list-group-item">Cacelado por: {{ $sale->cancelation_reason }}</li>
                        @endif
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
                        <li class="list-group-item">@if($sale->planreference !== null) {{ $sale->planreference->name }} @else <span class="text-danger">Plano Removido</span> @endif</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection