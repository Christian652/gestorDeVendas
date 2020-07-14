@extends('layouts.dashboard')

@section('content')
    @if(!count($sales))
    <div class="alert alert-info text-center" role="alert">
        <strong>Não Foi Econtrado Nenhuma Venda Registrada</strong>
    </div>
    @else
    <h1 class="font-weight-bold text-center mb-4">Vendas Registradas</h1>
    @endif
    <div class="row justify-content-center ">
        {{ $sales }}
    </div>
    <hr>
    <div class="container">
        <div class="row">
            @foreach($sales as $sale)
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="card border-info">
                    <div class="card-header bg-white border-info">
                        <div class="d-flex">
                            <form action="{{ route('admin.sales.destroy', ['sale' => $sale->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger rounded-circle py-2 px-2">
                                    <div class="material-icons float-left">delete</div>
                                </button>
                            </form>

                            <a href="{{ route('admin.sales.show', ['sale' => $sale->id]) }}" class="btn btn-sm py-2 ml-2 btn-info ">
                                <div class="material-icons float-left">info</div>
                                <span class="float-right">
                                Mais Informações
                                </span>
                            </a>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Vendedor: {{ $sale->salesman->name }}</li>
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