@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Cadastrar Administrador</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('admin.users.index') }}" class="btn btn-success">Listar Usuários</a>
            </div>
        </div>
    </div>
    <hr class="m-1">

    <div class="container">
        <form action="{{ route('admin.users.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Nome</label>

                <input type="text" value="{{ old('name') }}" maxlength="255" placeholder="Digite Aqui O Nome Do Usuário" name="name" class="form-control @error('name') is-invalid @enderror">

                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group form-row">
                <div class="form-group col-md-6">
                    <label>Email</label>

                    <input type="email" maxlength="255" value="{{ old('email') }}" placeholder="Digite Aqui O Email Do Usuário" name="email" class="form-control @error('email') is-invalid @enderror">

                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Senha/Password</label>

                    <input type="text" name="password" value="{{ old('password') }}" maxlength="255" minlength="8" placeholder="Digite Aqui A Senha Do Usuário" class="form-control @error('password') is-invalid @enderror">

                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            
            <button class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

@endsection