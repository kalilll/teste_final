@extends('layouts.app')
@section('title','Formulario')
@section('content')
    <h1>Cadastro de professores</h1>
    <form action="{{route("professor.store")}}" method="post">
        @csrf 
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu nome"> 
        </div>
        <div class="form-group">
            <label for="">Disciplina</label>
            <input type="text" class="form-control" name="disciplina" id="disciplina" placeholder="Disciplina ministrada">
        </div>
        <button class="btn btn-dark" type="submit">Enviar</button>
    </form>
@endsection