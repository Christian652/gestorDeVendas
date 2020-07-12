@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <h2 class="display-4 text-center">Bem Vindo {{ explode(' ', auth()->user()->name)[0] }}</h2>
    <hr>
</div>
@endsection
