<!doctype html>
<html lang="pt-br">
  <head>
    <title>123 Internet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body class="bg-light">

    <nav class="navbar navbar-expand navbar-dark bg-primary">

        <a class="sidebar-toggle text-light mr-3">
            <span class="navbar-toggler-icon"></span>
        </a>

        <a class="navbar-brand" href="{{route('dashboard')}}">
          {{auth()->user()->roles->first()->nome}}
        </a>

        <form action="{{route('logout')}}" method="post" class="ml-auto">
            @csrf
            <button class="btn btn-outline-light btn-sm px-2">Logout
              <div class="material-icons float-left">logout</div>
            </button>
        </form>
    </nav>
  
      <div class="d-flex">
          <nav class="sidebar">
              <ul class="list-unstyled">
                  <li class="p-3 text-center text-white">
                    <img src="{{ asset('img/logo.png') }}" style="width: 80%;">
                    <hr class="bg-light">
                    {{explode(' ', auth()->user()->name)[0]}}
                  </li>
                  
                    <li>
                      <a href="{{route('dashboard')}}">
                        Inicio
                        <div class="material-icons float-right">home</div>  
                      </a>
                    </li>
                  @can('acesso-administrador')
                    <li>
                      <a href="#admin" data-toggle="collapse">
                        Administradores
                        <div class="material-icons float-right">admin_panel_settings</div>
                      </a>

                      <ul class="collapse pl-0" id="admin">
                          <li>
                            <a href="{{ route('admin.users.create') }}">
                              Novo 
                              <div class="material-icons float-left">add</div>
                            </a>
                          </li>

                          <li>
                            <a href="{{ route('admin.users.index') }}">
                              Listar Todos
                              <div class="material-icons float-left">list</div>
                            </a>
                          </li>
                      </ul>
                    </li>

                    <li>
                      <a href="#vendedores" data-toggle="collapse">
                        Vendedores

                        <div class="material-icons float-right">shopping_cart</div>
                      </a>

                      <ul class="collapse pl-0" id="vendedores">
                          <li>
                            <a href="{{ route('admin.salesmans.create') }}">
                              Novo
                              <div class="material-icons float-left">add</div>
                            </a>
                          </li>

                          <li>
                            <a href="{{ route('admin.salesmans.index') }}">
                              Listar Todos
                              <div class="material-icons float-left">list</div>
                            </a>
                          </li>
                      </ul>
                    </li>

                    <li>
                      <a href="#salestatus" data-toggle="collapse">
                        Status De Venda
                        <div class="material-icons float-right">category</div>
                      </a>

                      <ul class="collapse pl-0" id="salestatus">
                          <li>
                            <a href="{{ route('admin.salestatus.create') }}">
                              Novo
                              <div class="material-icons float-left">add</div>
                            </a>
                          </li>

                          <li>
                            <a href="{{ route('admin.salestatus.index') }}">
                              Listar Todos
                              <div class="material-icons float-left">list</div>
                            </a>
                          </li>
                      </ul>
                    </li>
                    
                    <li>
                      <a href="#references" data-toggle="collapse">
                        Planos
                        <div class="material-icons float-right">wifi</div>
                      </a>

                      <ul class="collapse pl-0" id="references">
                        <li>
                           <a href="{{ route('admin.planreferences.create') }}">
                            Novo 
                            <div class="material-icons float-left">add</div>
                          </a>
                        </li>

                        <li>
                          <a href="{{ route('admin.planreferences.index') }}">
                              Listar Todos
                            <div class="material-icons float-left">list</div>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li>
                      <a href="#site" data-toggle="collapse">
                        Site Config
                        <div class="material-icons float-right">app_settings_alt</div>
                      </a>

                      <ul class="collapse pl-0" id="site">
                        <li>
                          <a href="#">
                              Planos
                            <div class="material-icons float-left">list</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="{{route('admin.sales.index')}}">
                        Vendas
                        <div class="material-icons float-right">store</div>
                      </a>
                    </li>
                  @endcan

                  @can('acesso-vendedor')
                    <li>
                      <a href="{{ route('salesman.profile.index') }}">
                        Minha Conta
                        <div class="material-icons float-right">account_box</div>
                      </a>
                    </li>
                    
                    <li>
                      <a href="#vendas" data-toggle="collapse">
                        Vendas
                        <div class="material-icons float-right">shopping_cart</div>
                      </a>

                      <ul class="collapse pl-0" id="vendas">
                          <li>
                            <a href="{{ route('salesman.sales.create') }}">
                              Nova
                              <div class="material-icons float-left">add</div>
                            </a>
                          </li>

                          <li>
                            <a href="{{ route('salesman.sales.index') }}">
                              Minhas
                              <div class="material-icons float-left">list</div>
                            </a>
                          </li>
                      </ul>
                    </li> 
                  @endcan
              </ul>
          </nav>
  
          <div class="content p-1 w-100">
              <div class="list-group-item">
                @include('flash::message')
                @yield('content')
                  
              </div>
          </div>
      </div>
    
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    @yield('scripts')
  </body>
</html>