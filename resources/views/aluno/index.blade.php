@extends('layouts.app')
@section('title','Listagem de Alunos')
@section('content')
<h1>Lista de Alunos
        @guest
            pública
        @endguest
    </h1>
    @auth
    <a class="btn btn-dark" href="{{route('aluno.create')}}">Cadastrar</a>
    @endauth
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
            @auth
                <th>Opções</th>
            @endauth
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
                @auth     
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
                @endauth
            </tr>
            @endforeach
            @endforeach
                
        </tbody>
    </table>

    <div>
        <div>
            <h3>Alunos Nascidos em 10/05/2005</h3>
            <ul>
                @foreach($alunos_nasci_10_05_2005 as $aluno)
                <li>{{$aluno->nome}}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3>Alunos Nascidos antes de 01/01/2006</h3>
            <ul>
                @foreach($alunos_nasci_antes_01_01_2006 as $aluno)
                <li>{{$aluno->nome}}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3>Alunos Nascidos entre 2004 e 2006</h3>
            <ul>
                @foreach($alunos_nasci_entre as $aluno)
                <li>{{$aluno->nome}}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3>Alunos com 'Silva' no nome</h3>
            <ul>
                @foreach($alunos_Silva as $aluno)
                <li>{{$aluno->nome}}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <h3>Alunos que nasceram pós 01-01-2005 e tem Gmail: </h3>
            <ul>
                @foreach($alunos_data_email as $aluno)
                <li>{{$aluno->nome}}</li>
                @endforeach
            </ul>
        </div>
    </div>

    
@endsection
