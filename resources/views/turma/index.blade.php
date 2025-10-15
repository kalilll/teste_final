@extends('layouts.app')
@section('title','Listagem de Turmas')
@section('content')
    <h1>Lista de Turma</h1>
    <a class="btn btn-dark" href="{{route('turma.create')}}">Cadastrar</a>
    <br>
    <br> 
    <table class="table table-striped table-hover table-sm" >
        <thead class="thead-dark">
            <th>Descrição da Turma</th>
            <th>Curso</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach($turmas as $turma)
            <tr>
                <td>{{$turma->descricao}}</td>
                <td>{{$turma->curso-> nome}}</td>
                <td>
                    <div class="d-flex">
                        <div class="m-1">
                            <a class="btn btn-success" href="{{route('turma.edit',$turma->id)}}">Editar</a>
                        </div>
                        <div class="m-1">
                            <a class="btn btn-info" href="{{route('turma.show',$turma->id)}}">Visualizar</a> 
                        </div>
                        <div class="m-1">
                            <form action="{{route('turma.destroy' , $turma->id) }}" method="post">
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
        <h3>Turmas com id Maior que 10:</h3>
        <ul>
            @foreach($turma_id_maior_10 as $turma)
                <li>{{$turma->descricao}}</li>
            @endforeach
        </ul>
    </div>   
    <div>
        <h3>Quantidade de Turmas:</h3>
        <ul>
            <li>{{$turmas_quant}}</li>
        </ul>
    </div>
@endsection
