@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Referencias De Planos</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            
            <div class="btn-group">
                <a href="{{ route('admin.planreferences.create') }}" class="btn btn-success">Cadastrar Plano de Referencia</a>
            </div>
        </div>
    </div>
    <hr class="m-1 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table text-center table-bordered table-hover table-striped">
                    <thead>
                        <th>Nome</th>
                        <th class="d-none d-lg-table-cell">Preço de Instalação</th>
                        <th>Ações</th>
                    </thead>
                
                    <tbody>
                    @foreach($planReferences as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td class="d-none d-lg-table-cell">{{ $plan->installationprice }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.planreferences.edit', ['planReference'=>$plan->id]) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>
                                    
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete" data-id="{{ $plan->id }}">Deletar</button>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
            let action = "{{ route('admin.planreferences.destroy', ['planReference' => 1])}}";
            
            let url = action.slice(0, action.length - 1);

            form.action = url + id
        });
    
    </script>

@endsection