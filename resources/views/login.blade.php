<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>123 Internet - Login</title>

        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            height: 100vh;
        }
    </style>
    </head>
    <body class="bg-light d-flex justify-content-center align-items-center">
        <div class="col-md-7 mb-5 col-sm-12 col-lg-5">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/logo.png') }}" style="width: 50%;" alt="">
                    </div>
                    
                    <p class="text-center lead mt-2 mb-0">Área Restrita</p>    
                
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" >Email</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="">Senha</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button class="btn btn-secondary">
                            <i class="material-icons float-left">login</i>
                            Login
                        </button>
                        <a href="{{ route('site.index') }}" class="btn btn-secondary">
                            <i class="material-icons float-left">arrow_back_ios</i>
                            Voltar
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
