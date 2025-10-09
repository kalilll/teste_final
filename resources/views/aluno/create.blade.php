@extends('layouts.app')
@section('title','Formulario')
@section('content')
    <h1>Cadastro de Aluno</h1>
    <div class="form-group">
       <form action="{{route("aluno.store")}}" method="post" enctype="multipart/form-data">
        @csrf 
            <div  class="form-group">
                <label for="">Matricula</label>
                <input type="text" class="form-control" name="matricula" id="matricula" placeholder="000">
            </div>

            <div  class="form-group">
               <label for="">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu Nome">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">@</span>
                </div>
                <input type="text" class="form-control" name="email" id="email" placeholder="nome@exemplo.com">
            </div>

            <div  class="form-group">
             <label for="">Data de Nascimento</label>
                <input type="date" class="form-control" name="data_nascimento" id="data_nascimento">  
            </div> 

            <div class="form-group">
                <div class="form-control">
                    <label for="fotoAluno" class="form-label">Foto</label>
                    <input type="file"  name="fotoAluno" id="fotoAluno">
                </div>
            </div>

            <div>
                <label for="">Turma</label>
                <select class="form-control" name="turma_id" id="turma_id">
                    <option value="">Selecione</option>
                    @foreach($turmas as $turma)
                        <option value="{{$turma->id}}">{{$turma->descricao}}</option>
                    @endforeach
                </select>
            </div>
            
            <button class="btn btn-dark" type="submit">Enviar</button>
        
        </form> 
    </div>
    
@endsection
