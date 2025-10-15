@extends('layouts.app')
@section('title','Listagem de Cursos')
@section('content')
    <h1>Lista de Curso</h1>
    <a class="btn btn-dark" href="{{route('curso.create')}}">Cadastrar</a>
    <br>
    <br> 
    <table class="table table-striped table-hover table-sm" >
        <thead class="thead-dark">
            <th>Nome do Curso</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
                <td>{{$curso->nome}}</td>
                <td>
                    <div class="d-flex">
                        <div class="m-1">
                            <a class="btn btn-success" href="{{route('curso.edit',$curso->id)}}">Editar</a>
                        </div>
                        <div class="m-1">
                            <a class="btn btn-info" href="{{route('curso.show',$curso->id)}}">Visualizar</a> 
                        </div>
                        <div class="m-1">
                            <form action="{{route('curso.destroy' , $curso->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"> Excluir</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
                
        </tbody>
    </table>

    <div>
        <h3>Cursos diferentes de Informática</h3>
        <ul>
            @foreach($curso_dife_info as $curso)
                <li>{{$curso->nome}}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <h3>Cursos iguais a Administração ou Gestão</h3>
        <ul>
            @foreach($curso_nome_igual as $curso)
                <li>{{$curso->nome}}</li>
            @endforeach
        </ul>
    </div>
    @endsection
