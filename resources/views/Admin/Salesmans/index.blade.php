@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Vendedores Registrados</h1>
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
            <div class="col-12">
                <table class="table text-center table-bordered table-hover table-striped">
                    <thead>
                        <th>Nome</th>
                        <th>Ações</th>
                    </thead>
                
                    <tbody>
                    @forelse($salesmans as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('admin.users.edit', ['user'=>$user->id]) }}" class="btn btn-sm btn-success ml-1">
                                        Editar
                                    </a>

                                    <a href="{{ route('admin.salesmans.show', ['user'=>$user->id]) }}" class="btn btn-sm btn-info ml-1">
                                        Vendas
                                    </a>

                                    <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger ml-1">Deletar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-warning text-center">
                            <strong class="text-center">Não Foi Encontrado Nenhum Usuário Vendedor Na Plataforma!!</strong>
                        </div>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection