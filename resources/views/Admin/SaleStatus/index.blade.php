@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Status De Venda Disponiveis</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            <div class="btn-group">
                <a href="{{ route('admin.salestatus.create') }}" class="btn btn-success">Adicionar Novo Status</a>
            </div>
        </div>
    </div>
    <hr class="m-1">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table text-center table-bordered table-hover table-striped">
                    <thead>
                        <th>Nome</th>
                        <th>Ações</th>
                    </thead>
                
                    <tbody>
                    @foreach($saleStatus as $status)
                        <tr>
                            <td>{{ $status->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.salestatus.edit', ['saleStatus'=>$status->id]) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>
                                    
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete" data-id="{{ $status->id }}">Deletar</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
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
            let action = "{{ route('admin.salestatus.destroy', ['saleStatus' => 1])}}";
            
            let url = action.slice(0, action.length - 1);

            form.action = url + id
        });
    
    </script>

@endsection