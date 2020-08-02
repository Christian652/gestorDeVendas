@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Mais Informações De {{ explode(' ', $salesman->user->name)[0] }}</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('admin.salesmans.index') }}" class="btn btn-outline-success">Listar Vendedores</a>
                <a href="{{ route('admin.salesmans.create') }}" class="btn btn-success">Cadastrar Vendedor</a>
            </div>
        </div>
    </div>
    <hr class="m-1 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ul class="list-group text-center">
                        <li class="list-group-item">Nome: {{ $salesman->user->name }}</li>
                        <li class="list-group-item">Email: {{ $salesman->user->email }}</li>
                        <li class="list-group-item">Rg: {{ $salesman->rg }}</li>
                        <li class="list-group-item">Cpf: {{ $salesman->cpf }}</li>
                        <li class="list-group-item">Aniversario: {{ $salesman->birthday }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <h3>Vendas Feitas</h3>
        <div class="row justify-content-center">
            {{ $sales }}
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @forelse($sales as $sale)
                        <ul class="list-group mb-3">
                            <li class="list-group-item">
                                <form action="{{ route('admin.sales.destroy', ['sale' => $sale->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Deletar</button>
                                </form>
                            </li>
                            <li class="list-group-item">Cliente: {{ $sale->name }}</li>
                            <li class="list-group-item">Contato1: {{ $sale->cell1 }}</li>
                            <li class="list-group-item">Bairro: {{ $sale->district }}</li>
                            <li class="list-group-item">Endereço: {{ $sale->address }}</li>
                            <li class="list-group-item">Ponto De Referencia: {{ $sale->referencepoint }}</li>
                            <li class="list-group-item">Dia De Pagamento: {{ $sale->endday }}</li>
                        </ul>
                        @empty 
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Nenhuma Venda Foi Registrada Por {{ $salesman->user->name }}</strong>
                        </div>
                        @endforelse
                    </div>

                    <div class="row justify-content-center">
                        {{ $sales }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection