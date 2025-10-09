@extends('layouts.app')
@section('title','Dados do Curso')
@section('content')
    <h1>Dados do curso</h1>
    <p class="form-control">ID: {{$curso->id}}</p>
    <p class="form-control">Nome do Curso: {{$curso->nome}}</p>
@endsection
