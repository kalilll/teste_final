@extends('layouts.app')
@section('title','Formulario')
@section('content')
    <h1>Cadastro de professores</h1>
    <form action="{{route("professor.update", $professor->id)}}" method="post" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <div class="form-group">
        <label for="">Nome</label>
        <input type="text" name="nome" id="nome" value="{{$professor->nome}}">
        </div>

        <div class="form-group">
        <label for="">disciplina</label>
        <input type="text" name="disciplina" id="disciplina" value="{{$professor->disciplina}}">
        </div>

        <div class="form-group">
            <div class="form-control">
                <label for="fotoProfessor" class="form-label">Foto</label>
                <input type="file"  name="fotoProfessor" id="fotoProfessor" value="{{$professor->foto}}">
            </div>
        </div>
        <button type="submit">Salvar</button>

    </form>
@endsection
