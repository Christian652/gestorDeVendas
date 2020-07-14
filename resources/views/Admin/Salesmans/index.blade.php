@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Vendedores Registrados</h1>
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
        <div class="row">
            <div class="col-12">
                <table class="table text-center table-bordered table-hover table-striped">
                    <thead>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </thead>
                
                    <tbody>
                    @foreach($salesmans as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.users.edit', ['user'=>$user->id]) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>

                                    <a href="{{ route('admin.salesmans.show', ['user'=>$user->id]) }}" class="btn btn-sm btn-info">
                                        Vendas
                                    </a>

                                    <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="post">
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
        </div>
    </div>

@endsection