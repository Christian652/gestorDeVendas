@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Cadastrar Status De Venda</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('admin.salestatus.index') }}" class="btn btn-success">Listar Status Disponiveis</a>
            </div>
        </div>
    </div>
    <hr class="m-1">

    <div class="container">
        <form action="{{ route('admin.salestatus.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Nome</label>

                <input type="text" value="{{ old('name') }}" maxlength="255" placeholder="Digite Aqui O Nome Do Status" name="name" class="form-control @error('name') is-invalid @enderror">

                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <button class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

@endsection