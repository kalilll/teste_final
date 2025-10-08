@extends('layouts.app')
@section('title','Formulario')
@section('content')
    <h1>Cadastro de Curso</h1>
    <div class="form-group">
       <form action="{{route("curso.store")}}" method="post" enctype="multipart/form-data">
        @csrf 
 
            <div  class="form-group">
               <label for="">Nome do Curso</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Curso">
            </div>

            <button class="btn btn-dark" type="submit">Enviar</button>
        
        </form> 
    </div>
    
@endsection
