@extends('layouts.app')
@section('title','Dados da Turma')
@section('content')
    <h1>Dados da Turma</h1>
    <p class="form-control">Descrição da Turma: {{$turma->descricao}}</p>
@endsection
