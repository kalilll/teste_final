@extends('layouts.app')
@section('title','Formulario')
@section('content')
    <h1>Cadastro de professores</h1>
    <form action="{{route("professor.update", $professor->id)}}" method="post">
        @csrf 
        @method('PUT')
        <label for="">Nome</label>
        <input type="text" name="nome" id="nome" value="{{$professor->nome}}"><br><br>
        <label for="">disciplina</label>
        <input type="text" name="disciplina" id="disciplina" value="{{$professor->disciplina}}"><br><br>
        <button type="submit">Salvar</button>
    </form>
@endsection
