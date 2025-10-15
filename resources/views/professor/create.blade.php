@extends('layouts.app')
@section('title','Formulario')
@section('content')
    <h1>Cadastro de Professor</h1>
    <form action="{{route("professor.store")}}" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu nome"> 
        </div>

        <div class="form-group">
            <label for="">Disciplina</label>
            <input type="text" class="form-control" name="disciplina" id="disciplina" placeholder="Disciplina ministrada">
        </div>

        <div class="form-group">
            <label for="">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" placeholder="(00) 00000-0000">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="example@gmail.com">
        </div>

        <div class="form-group">
            <label for="fotoProfessor">Foto</label>
            <input type="file"  name="fotoProfessor" id="fotoProfessor">
        </div>

        <button class="btn btn-dark" type="submit">Enviar</button>
    </form>
@endsection
