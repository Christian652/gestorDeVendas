@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Editar {{ $planReference->name }}</h1>
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
        <form action="{{ route('admin.planreferences.update', ['planReference' => $planReference->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nome</label>

                <input type="text" value="{{ $planReference->name }}" maxlength="255" name="name" class="form-control @error('name') is-invalid @enderror">

                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Preço De Instalação</label>

                <input type="text" value="{{ $planReference->installationprice }}" maxlength="255" name="installationprice" class="form-control @error('installationprice') is-invalid @enderror">

                @error('installationprice')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <button class="btn btn-primary">Salvar</button>
        </form>
    </div>

@endsection