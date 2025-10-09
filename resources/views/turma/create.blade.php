@extends('layouts.app')
@section('title','Formulario')
@section('content')
    <h1>Cadastro de Turma</h1>
    <div class="form-group">
       <form action="{{route("turma.store")}}" method="post" enctype="multipart/form-data">
        @csrf 
 
            <div  class="form-group">
               <label for="">Descrição da Turma</label>
                <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição da Turma">
            </div>
            <div  class="form-group>
                <label for="">Curso</label>
                <select class="form-control" name="curso_id" id="curso_id">
                    <option value="">Selecione</option>
                    @foreach($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->nome}}</option>
                    @endforeach
                </select>
            </div>



            <button class="btn btn-dark" type="submit">Enviar</button>
        
        </form> 
    </div>
    
@endsection
