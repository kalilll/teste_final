@extends('layouts.app')
@section('title','Dados do Aluno')
@section('content')
    <h1>Dados do aluno</h1>
    <p class="form-control">Matricula: {{$aluno->matricula}}</p>
    <p class="form-control">Nome: {{$aluno->nome}}</p>
    <p class="form-control">Email: {{$aluno->email}}</p>
    <p class="form-control">Data de Nascimento: {{$aluno->data_nascimento}}</p>
    <img class="rounded-circleed" src="{{ asset($aluno->foto) }}" alt="Foto do Aluno" style="max-width: 300px; max-height: 300px;">
@endsection
.