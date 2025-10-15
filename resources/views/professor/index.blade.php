@extends('layouts.app')
@section('title','Professor')
@section('content')
     <h1>Lista de Professores</h1>
     <a class="btn btn-dark" href="{{route('professor.create')}}">Cadastrar</a> <br>
     <br>
    <table class="table table-striped table-hover table-sm">
        <thead class="thead-dark">
            <th>Nome</th>
            <th>Disciplinas</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach($professores as $professor)
            <tr>
                <td>{{$professor->nome}}</td>
                <td>{{$professor->disciplina}}</td>
                <td>{{$professor->contatoProfessor->telefone}}</td>
                <td>{{$professor->contatoProfessor->email}}</td>
                <td>
                    <div class="d-flex">
                       <div class="m-1">
                            <a class="btn btn-success" href="{{route('professor.edit',$professor->id)}} ">Editar</a> 
                        </div>
                        <div class="m-1">
                            <a class="btn btn-info" href="{{route('professor.show',$professor->id)}} ">Visualizar</a> 
                        </div>
                        <div class="m-1">
                            <form action="{{route('professor.destroy' , $professor->id) }}" method="post">
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
            <h3>Professores com João e Silva:</h3>
            <ul>
            @foreach($professor_JoaoSilva as $professor)
                <li>{{$professor->nome}}</li>
            @endforeach
            </ul>
        </div>
@endsection
