@extends('layouts.dashboard')

@section('content')
    <h1 class="font-weight-bold text-center">Administradores Registrados</h1>
    <hr class="m-1">
    <div class="container">
        <div class="row justify-content-end">
            
            <div class="btn-group">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success">Cadastrar Administrador</a>
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
                        <th class="d-none d-lg-table-cell">Email</th>
                        <th>Ações</th>
                    </thead>
                
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td class="d-none d-lg-table-cell">{{ $user->email }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.users.edit', ['user'=>$user->id]) }}" class="btn btn-sm btn-success">
                                        Editar
                                    </a>

                                    <button data-target="#delete" data-toggle="modal" data-id="{{ $user->id }}" class="btn btn-danger btn-sm px-1 py-1">
                                        <div class="material-icons float-left">delete</div>                                      
                                    </button>
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
            let action = "{{ route('admin.users.destroy', ['user' => 1]) }}";
            
            let url = action.slice(0, action.length - 1);

            form.action = url + id
        });
    
    </script>

@endsection