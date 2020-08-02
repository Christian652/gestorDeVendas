@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Editar Venda de Numero {{ $sale->id }}</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('salesman.sales.index') }}" class="btn btn-success">Listar Vendas</a>
            </div>
        </div>
    </div>
    <hr class="m-1">

    <div class="container">
        <form action="{{ route('salesman.sales.update', ['sale' => $sale->id]) }}" method="post">
            @csrf
            @method('put')
                <div class="form-group">
                    <label>Nome Do Cliente</label>

                    <input type="text" value="{{ $sale->name }}" placeholder="Digite Aqui o Nome Do Cliente" name="name" class="form-control @error('name') is-invalid @enderror">

                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Status</label>

                    <select name="status" id="status_field" class="form-control">
                        <option selected @if($sale->salestatus->name == "Cancelado") id="canceled_field" @endif value="{{ $sale->salestatus->id }}">{{ $sale->salestatus->name }}</option>

                        @foreach($salestatus as $status)
                        @if($status->id !== $sale->salestatus->id)
                        <option value="{{ $status->id }}" @if($status->name == "Cancelado") id="canceled_field" @endif>{{ $status->name }}</option>
                        @endif
                        @endforeach
                    </select>

                    @error('planreference_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group d-none" id="cancelation_reason">
                    <label>Motivo Da Desistencia</label>

                    <textarea name="cancelation_reason" id="" cols="10" class="form-control" rows="3"></textarea>
                </div>
     
                <div class="form-group">
                    <label>Plano</label>

                    <select name="planreference_id" id="" class="form-control">
                        <option selected value="{{ $sale->planreference->id }}">{{ $sale->planreference->name }}</option>

                        @foreach($plans as $plan)
                        @if($plan->id !== $sale->planreference->id)
                        <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                        @endif
                        @endforeach
                    </select>

                    @error('planreference_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

            <div class="form-group form-row">
                <div class="form-group col-md-6">
                    <label>Email</label>

                    <input type="text" value="{{ $sale->email }}" placeholder="Digite O Email Do Cliente" name="email" class="form-control @error('email') is-invalid @enderror">

                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Data De Nascimento</label>

                    <input type="text" value="{{ $sale->birthday }}" onkeypress="$(this).mask('00/00/0000');" placeholder="Digite Aqui A Data Da Venda" name="birthday" class="form-control @error('birthday') is-invalid @enderror">

                    @error('birthday')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="form-group col-md-6">
                    <label>CPF</label>

                    <input type="text" value="{{ $sale->cpf }}" onkeypress="$(this).mask('000.000.000-00');" placeholder="000.000.000-00" name="cpf" class="form-control @error('cpf') is-invalid @enderror">

                    @error('cpf')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Registro Geral(RG)</label>

                    <input type="text" value="{{ $sale->rg }}" maxlength="14" placeholder="Registro Geral Do cliente" name="rg" class="form-control @error('rg') is-invalid @enderror">

                    @error('rg')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Ponto De Referencia</label>

                <textarea name="referencepoint" placeholder="Digite Aqui Um Ponto De Referencia Da Casa Da Instalação" class="form-control @error('referencepoint') is-invalid @enderror" id="" cols="30" rows="5">{{ $sale->referencepoint }}</textarea>
                @error('referencepoint')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group form-row">
                <div class="form-group col-md-6">
                    <label>Telefone 1</label>

                    <input type="text" value="{{ $sale->cell1 }}" onkeypress="$(this).mask('0 0000-0000');" placeholder="Digite Aqui O Telefone Principal Do Cliente" name="cell1" class="form-control @error('cell1') is-invalid @enderror">

                    @error('cell1')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Telefone 2</label>

                    <input type="text" value="{{ $sale->cell2 }}" onkeypress="$(this).mask('0 0000-0000');" placeholder="Digite Aqui O Telefone Principal Do Cliente" name="cell2" class="form-control @error('cell2') is-invalid @enderror">

                    @error('cell2')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="form-group col-md-4">
                    <label>Bairro</label>

                    <input type="text" value="{{ $sale->district }}" maxlength="200" placeholder="Digite Aqui O Bairro Do Cliente" name="district" class="form-control @error('district') is-invalid @enderror">

                    @error('district')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label>Endereço</label>

                    <input type="text" value="{{ $sale->address }}" placeholder="Digite Aqui O Endereço Detalhado Do Cliente" name="address" class="form-control @error('address') is-invalid @enderror">

                    @error('address')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label>Cep</label>

                    <input type="text" value="{{ $sale->cep }}" onkeypress="$(this).mask('00000-000');" placeholder="Digite Aqui A Data Da Venda" name="cep" class="form-control @error('cep') is-invalid @enderror">

                    @error('cep')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Dia Do Pagamento</label>

                <input type="text" value="{{ $sale->endday }}" onkeypress="$(this).mask('00');" placeholder="Digite Aqui A Data Do Pagamento Todo Mês" name="endday" class="form-control @error('endday') is-invalid @enderror">

                @error('endday')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Data E Hora Da Instalação</label>

                <input type="text" value="{{ $sale->installationdate }}" maxlength="100" name="installationdate" class="form-control @error('installationdate') is-invalid @enderror">

                @error('installationdate')
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
<script>
let status_field = document.getElementById('status_field');
let cancelation_reason = document.getElementById('cancelation_reason');

status_field.addEventListener('input', (event) => {
    if (status_field.value == 1) {
        if (cancelation_reason.classList[1] == 'd-none') {
            cancelation_reason.classList.remove('d-none')
        }
    } else if (cancelation_reason.classList[1] !== 'd-none') {
        cancelation_reason.classList.add('d-none')
    }
})
</script>
@endsection