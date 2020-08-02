@extends('layouts.dashboard')

@section('content')
    @if(!count($sales))
    <div class="alert alert-info text-center" role="alert">
        <strong>Não Foi Econtrado Nenhuma Venda Registrada Por {{ explode(' ', auth()->user()->name)[0] }}</strong>
    </div>
    @else
    <h1 class="font-weight-bold text-center mb-4">Minhas Vendas</h1>
    <p class="lead text-center">{{ $countsalesmessage }}</p>
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
            <table class="table table-striped table-hover">
                <thead class="thead-inverse">
                    <tr>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th class="d-none d-md-table-cell">Plano</th>
                        <th class="d-none d-lg-table-cell">Data</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->name }}</td>
                            <td class="{{ $sale->colorClass['text'] }} font-weight-bold">{{ $sale->salestatus->name }}</td>
                            <td class="d-none d-md-table-cell">{{ $sale->planreference->name }}</td>
                            <td class="d-none d-lg-table-cell">{{ date('d/m/Y',strtotime($sale->created_at)) }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('salesman.sales.edit', ['sale' => $sale->id]) }}" class="btn border-white btn-success p-1">
                                        <div class="material-icons float-left p-0 m-0">edit</div>
                                    </a>

                                    <a href="{{ route('salesman.sales.show', ['sale' => $sale->id]) }}" class="btn border-white btn-sm p-1 ml-2 btn-info ">
                                        <div class="material-icons float-left">info</div>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            {{ $sales }}
        </div>
    </div>

@endsection