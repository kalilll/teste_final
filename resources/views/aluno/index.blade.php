@extends('layouts.app')
@section('title','Listagem de Alunos')
@section('content')
    <h1>Lista de Alunos</h1>
    <a class="btn btn-dark" href="{{route('aluno.create')}}">Cadastrar</a>
    <br>
    <br> 
    <table class="table table-striped table-hover table-sm" >
        <thead class="thead-dark">
            <th>Matricula</th>
            <th>Turma</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Data de nascimento</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            @foreach($turmas as $turma)
            <tr>
                <td>{{$aluno->matricula}}</td>
                <td>{{$turma->descricao}}</td>
                <td>{{$aluno->nome}}</td>
                <td>{{$aluno->contatoAluno->telefone}}</td>
                <td>{{$aluno->email}}</td>
                <td>{{$aluno->data_nascimento}}</td>
                <td>
                    <div class="d-flex">
                        <div class="m-1">
                            <a class="btn btn-success" href="{{route('aluno.edit',$aluno->id)}}">Editar</a>
                        </div>
                        <div class="m-1">
                            <a class="btn btn-info" href="{{route('aluno.show',$aluno->id)}}">Visualizar</a> 
                        </div>
                        <div class="m-1">
                            <form action="{{route('aluno.destroy' , $aluno->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"> Excluir</button>
                            </form>
                        </div>
                    
                    </div>
                </td>
            </tr>
            @endforeach
            @endforeach
                
        </tbody>
    </table>

    
@endsection
