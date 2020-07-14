@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Minha Conta</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('dashboard') }}" class="btn btn-success">Inicio</a>
            </div>
        </div>
    </div>
    <hr class="m-1">

    <div class="container">
        <form action="{{ route('salesman.profile.update', ['user' => $user->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nome</label>

                <input type="text" value="{{ $user->name }}" maxlength="255" placeholder="Digite Aqui O Nome Do Usuário" name="name" class="form-control @error('name') is-invalid @enderror">

                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <div class="form-group form-row">
                <div class="form-group col-md-6">
                    <label>Email</label>

                    <input type="email" maxlength="255" value="{{ $user->email }}" placeholder="Digite Aqui O Email Do Usuário" name="email" class="form-control @error('email') is-invalid @enderror">

                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Senha/Password</label>

                    <input type="text" value="{{ old('password') }}" maxlength="255" minlength="8" placeholder="Digite Aqui A Senha Do Usuário" name="password" class="form-control @error('password') is-invalid @enderror">
                    <strong>Caso não escreva nada nesse campo a senha salva permanecerá a mesma!</strong>
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            
            <button class="btn btn-primary">Salvar</button>
        </form>
    </div>

@endsection