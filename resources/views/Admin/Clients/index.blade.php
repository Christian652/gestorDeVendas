@extends('layouts.dashboard')

@section('content')
    @if(!count($clients))
        <div class="alert alert-info text-center">
            <strong>Não foi encontrado nenhum cliente registrado na plataforma</strong>
        </div>
    @endif

    <h1 class="font-weight-bold text-center">Clientes Registrados</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('admin.clients.create') }}" class="btn btn-success">Cadastrar Cliente</a>
            </div>
        </div>
    </div>
    <hr class="m-1 mb-3">
    @if(count($clients))
    <div class="container">
        <table class="table text-center table-bordered table-hover table-striped">
            <thead>
                <th>Nome</th>
                <th class="d-none d-md-table-cell">Email</th>
                <th class="d-none d-lg-table-cell">Rg</th>
                <th class="d-none d-lg-table-cell">Cpf</th>
                <th>Ações</th>
            </thead>
                
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td class="d-none d-md-table-cell">{{ $client->email }}</td>
                    <td class="d-none d-lg-table-cell">{{ $client->rg }}</td>
                    <td class="d-none d-lg-table-cell">{{ $client->cpf }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.clients.edit', ['client'=>$client->id]) }}" class="btn btn-sm btn-success">
                                Editar
                            </a>

                            <form action="{{ route('admin.clients.destroy', ['client' => $client->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Deletar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                    
            @endforeach

            </tbody>
        </table>
    </div>
    @endif
@endsection