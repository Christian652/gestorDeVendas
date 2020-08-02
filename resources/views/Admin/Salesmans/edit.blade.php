@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Editar {{ $salesman->user->name }}</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('admin.salesmans.index') }}" class="btn btn-outline-success">Listar Vendedores</a>
                <a href="{{ route('admin.salesmans.create') }}" class="btn btn-success">Cadastrar Vendedor</a>
            </div>
        </div>
    </div>
    <hr class="m-1">

    <div class="container">
        <form action="{{ route('admin.salesmans.update', ['salesman' => $salesman->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nome</label>

                <input type="text" value="{{ $salesman->user->name }}" maxlength="255" placeholder="Digite Aqui O Nome Do Vendedor" name="name" class="form-control @error('name') is-invalid @enderror">

                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group form-row">
                <div class="form-group col-md-6">
                    <label>Email</label>

                    <input type="email" maxlength="255" value="{{ $salesman->user->email }}" placeholder="Digite Aqui O Email Do Vendedor" name="email" class="form-control @error('email') is-invalid @enderror">

                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Senha/Password</label>
                    <input type="text" name="password" value="{{ old('password') }}" maxlength="255" minlength="8" placeholder="Digite Aqui A Senha Do Vendedor" class="form-control @error('password') is-invalid @enderror">
                    <strong>Se nada for digitado nesse campo a senha salva permanecerá a mesma!</strong>
                    
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="form-group col-md-6 col-lg-4">
                    <label>CPF</label>

                    <input type="text" value="{{ $salesman->cpf }}" onkeypress="$(this).mask('000.000.000-00');" placeholder="000.000.000-00" name="cpf" class="form-control @error('cpf') is-invalid @enderror">

                    @error('cpf')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-6 col-lg-5">
                    <label>Registro Geral(RG)</label>

                    <input type="text" value="{{ $salesman->rg }}" maxlength="14" placeholder="Registro Geral Do Vendedor" name="rg" class="form-control @error('rg') is-invalid @enderror">

                    @error('rg')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-6 col-lg-3">
                    <label>Data De Nascimento</label>

                    <input type="text" value="{{ $salesman->birthday }}" onkeypress="$(this).mask('00/00/0000');" placeholder="Digite Aqui A Data Da Venda" name="birthday" class="form-control @error('birthday') is-invalid @enderror">

                    @error('birthday')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="">Observações</label><br>
                <small>Digite aqui informações bancarias...</small>
                <textarea name="observations" class="form-control @error('observations') is-invalid @enderror" id="" cols="30" rows="4">{{ $salesman->observations }}</textarea>
                
                @error('observations')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            
            <button class="btn btn-primary">Salvar</button>
        </form>
    </div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
@endsection