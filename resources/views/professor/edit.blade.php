@extends('layouts.app')
@section('title','Formulario')
@section('content')
    <h1>Editar Professor</h1>
    <form action="{{route("professor.update", $professor->id)}}" method="post" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{$professor->nome}}">
        </div>

        <div class="form-group">
            <label for="">Disciplina</label>
            <input type="text" class="form-control" name="disciplina" id="disciplina" value="{{$professor->disciplina}}">
        </div>

        <div class="form-group">
            <label for="">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="{{$professor->contatoProfessor->telefone}}">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$professor->contatoProfessor->email}}">
        </div>

        <div class="form-group">
            <label for="fotoProfessor">Foto</label>
            <input type="file"  name="fotoProfessor" id="fotoProfessor" value="{{$professor->foto}}">
        </div>
        <button class="btn btn-dark" type="submit">Salvar</button>

    </form>
@endsection
