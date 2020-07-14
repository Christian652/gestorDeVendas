@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Informações Sobre {{ $username }}</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success">Cadastrar Usuário</a>
            </div>
        </div>
    </div>
    <hr class="m-1 mb-3">
    <div class="container">
        <div class="row justify-content-center">
            {{ $sales }}
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        <h3>Vendas Feitas Por {{ $user->name }}</h3>
                    </div>
                    <div class="card-body">
                        @foreach($sales as $sale)
                        <ul class="list-group mb-3">
                            <li class="list-group-item bg-dark text-white">Vendedor: {{ $sale->salesman->name }}</li>
                            <li class="list-group-item">
                                <form action="{{ route('admin.sales.destroy', ['sale' => $sale->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Deletar</button>
                                </form>
                            </li>
                            <li class="list-group-item">Nome: {{ $sale->name }}</li>
                            <li class="list-group-item">Contato1: {{ $sale->cell1 }}</li>
                            <li class="list-group-item">Bairro: {{ $sale->district }}</li>
                            <li class="list-group-item">Endereço: {{ $sale->address }}</li>
                            <li class="list-group-item">Ponto De Referencia: {{ $sale->referencepoint }}</li>
                            <li class="list-group-item">Dia De Pagamento: {{ $sale->endday }}</li>
                        </ul>
                        @endforeach
                    </div>

                    <div class="row justify-content-center">
                        {{ $sales }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection