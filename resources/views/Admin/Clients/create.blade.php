@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Cadastrar Cliente</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('admin.clients.index') }}" class="btn btn-success">Listar Clientes</a>
            </div>
        </div>
    </div>
    <hr class="m-1">

    <div class="container">
        <form action="{{ route('admin.clients.store') }}" method="post">
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
                <label>Email</label>

                <input type="email" maxlength="255" value="{{ old('email') }}" placeholder="Digite Aqui O Email Do Usuário" name="email" class="form-control @error('email') is-invalid @enderror">

                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group form-row">
                <div class="form-group col-md-6">
                    <label>Rg</label>

                    <input type="text" maxlength="14" value="{{ old('rg') }}" onkeypress="$(this).mask('00000000000000');" placeholder="Digite Aqui O RG Do Cliente" name="rg" class="form-control @error('rg') is-invalid @enderror">

                    @error('rg')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Cpf</label>

                    <input type="text" name="cpf" value="{{ old('cpf') }}" onkeypress="$(this).mask('000.000.000-00');" maxlength="14" minlength="14" placeholder="Digite Aqui O CPF Do Cliente" class="form-control @error('cpf') is-invalid @enderror">

                    @error('cpf')
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

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
@endsection