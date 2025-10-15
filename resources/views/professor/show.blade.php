@extends('layouts.app')
@section('title','Dados do Professor')
@section('content')
    <h1>Dados do Professor</h1>
    <p class="form-control">Nome: {{$professor->nome}}</p>
    <p class="form-control">Disciplina: {{$professor->disciplina}}</p>
    <p class="form-control">Telefone: {{$professor->contatoProfessor->telefone}}</p>
    <p class="form-control">Email: {{$professor->contatoProfessor->email}}</p>
    <img src="{{ asset($professor->foto) }}" alt="Foto do Professor" style="max-width: 300px; max-height: 300px;">
@endsection
