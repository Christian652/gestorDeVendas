@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Cadastrar Referencia de Plano</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('admin.planreferences.index') }}" class="btn btn-success">Listar Planos</a>
            </div>
        </div>
    </div>
    <hr class="m-1">

    <div class="container">
        <form action="{{ route('admin.planreferences.store') }}" method="post">
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

                <div class="form-group">
                    <label>Preço de Instalação</label>

                    <input type="text" maxlength="255" value="{{ old('installationprice') }}" placeholder="Digite Aqui O Preço de Instalação Do Plano" name="installationprice" class="form-control @error('installationprice') is-invalid @enderror">

                    @error('installationprice')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            
            <button class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

@endsection