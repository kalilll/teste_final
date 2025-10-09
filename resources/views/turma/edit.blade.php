@extends('layouts.app')
@section('title','Formulario')
@section('content')
    <h1>Editar Turma</h1>
    <form action="{{route("turma.update", $turma->id)}}" method="post" enctype="multipart/form-data">
        @csrf 
        @method('PUT')

        <div class="form-group">
            <label for="">Descrição da Turma</label>
            <input type="text" class="form-control" name="descricao" id="descricao" value="{{$turma->descricao}}">
        </div>
        <div class="form-group">
            <label for="">Curso</label>
            <select class="form-control" name="curso_id" id="curso_id">
                <option value="{{ $turma->curso_id }}" selected>{{$turma->curso->nome}}</option>
                @foreach($cursos as $curso)
                    <option value="{{$curso->id}}">{{$curso->nome}}</option>
                @endforeach
            </select>
        
        <button class="btn btn-dark" type="submit">Salvar</button>
    </form>
@endsection
