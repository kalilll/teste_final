@extends('layouts.app')
@section('title','Formulario')
@section('content')
    <h1>Editar Aluno</h1>
    <form action="{{route("aluno.update", $aluno->id)}}" method="post" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <div class="form-group">
            <label for="">Matricula</label>
            <input type="text" class="form-control" name="matricula" id="matricula" value="{{$aluno->matricula}}">   
        </div>

        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{$aluno->nome}}">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$aluno->email}}">
        </div>

        <div class="form-group">
            <label for="">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="{{$aluno->data_nascimento}}">
        </div>

        <div class="form-group">
            <label for="">Foto</label>
            <input type="file" name="fotoAluno" id="fotoAluno" value="{{$aluno->foto}}">
        </div>
        <button class="btn btn-dark" type="submit">Salvar</button>
    </form>
@endsection
