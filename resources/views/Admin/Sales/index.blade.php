@extends('layouts.dashboard')

@section('content')
    @if(!count($sales))
    <div class="alert alert-info text-center" role="alert">
        <strong>Não Foi Econtrado Nenhuma Venda Registrada</strong>
    </div>
    @else
    <h1 class="font-weight-bold text-center mb-4">Vendas Registradas</h1>
    @endif
    <div class="row justify-content-center ">
        {{ $sales }}
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.sales.index') }}" method="get">
                    <div class="form-group">
                        <input type="text" name="client_filter" placeholder="Digite Aqui o nome de um cliente" class="form-control">
                    </div>

                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <label for="">Status</label>

                            <select name="status_filter" class="form-control" id="">
                                <option value="">Selecione</option>
                                <option value="1">Cancelado</option>
                                <option value="2">Inviabilidade</option>
                                <option value="3">Instalado</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Plano</label>

                            <select name="plan_filter" class="form-control" id="">
                                <option value="1">Cancelado</option>
                                <option value="2">Inviabilidade</option>
                                <option value="3">Instalado</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary">Filtrar</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <table class="table table-striped table-hover">
                <thead class="thead-inverse">
                    <tr>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th class="d-none d-md-table-cell">Plano</th>
                        <th class="d-none d-lg-table-cell">Data</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->name }}</td>
                            <td class="{{ $sale->colorClass['text'] }} font-weight-bold">{{ $sale->salestatus->name }}</td>
                            <td class="d-none d-md-table-cell">@if($sale->planreference !== null) {{ $sale->planreference->name }} @else <span class="text-danger">Plano Removido</span> @endif</td>
                            <td class="d-none d-lg-table-cell">{{ date('d/m/Y',strtotime($sale->created_at)) }}</td>
                            <td>
                                <div class="d-flex">
                                    <button data-target="#delete" data-toggle="modal" data-id="{{ $sale->id }}" class="btn btn-danger btn-sm px-1 py-1">
                                        <div class="material-icons float-left">delete</div>                                      
                                    </button>

                                    <a href="{{ route('admin.sales.show', ['sale' => $sale->id]) }}" class="btn border-white btn-sm p-1 ml-2 btn-info ">
                                        <div class="material-icons float-left">info</div>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            {{ $sales }}
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade modal-danger" id="delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="lead">Tem Certeza Que Deseja Deletar?</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Não, Cancelar</button>
                    <button type="button" onclick="document.getElementById('formdelete').submit()" class="btn btn-warning">Sim Delete</button>
                    <form action="" id="formdelete" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $('#delete').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            let id = button.attr('data-id')    
            
            let form = document.getElementById('formdelete');
            let action = "{{ route('admin.sales.destroy', ['sale' => 1])}}";
            
            let url = action.slice(0, action.length - 1);

            form.action = url + id
        });
    
    </script>

@endsection