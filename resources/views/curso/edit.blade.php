@extends('layouts.app')
@section('title','Formulario')
@section('content')
    <h1>Editar Aluno</h1>
    <form action="{{route("curso.update", $curso->id)}}" method="post" enctype="multipart/form-data">
        @csrf 
        @method('PUT')

        <div class="form-group">
            <label for="">Nome do Curso</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{$curso->nome}}">
        </div>
        <button class="btn btn-dark" type="submit">Salvar</button>
    </form>
@endsection
