<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;   
use App\Models\Turma;   

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::all(); 
        $turmas = Turma::all(); 

        
        return view('aluno.index', compact('alunos', 'turmas'));
    }    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $turmas = Turma::all();
        return view('aluno.create', compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foto= null;
        if($request->hasFile('fotoAluno')){
            $nome_arquivo = pathinfo($request->fotoAluno->getClientOriginalName(), PATHINFO_FILENAME);
            $extensao_arquivo = $request->fotoAluno->getClientOriginalExtension();
            $foto = $nome_arquivo . '-' . time() . '.' . $extensao_arquivo;

            $request->fotoAluno->move(public_path('imagens/Aluno/'), $foto);
        };

        $aluno = Aluno::create([
            'matricula' => $request->matricula,
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'foto' => 'imagens/Aluno/' . $foto
        ]);

        $aluno->turmas()->attach($request->turma_id);

        $aluno->contatoAluno()->create([
            'telefone' => $request->telefone
        ]);
        
        return redirect()->route('aluno.index');
    }
    
    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        $aluno= Aluno::find($id);
        return view('aluno.show', compact('aluno'));
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluno = Aluno::find($id);
        $turmas = Turma::all();
        return view('aluno.edit', compact('aluno', 'turmas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aluno = Aluno::find($id);

        if (!$aluno) {
            return redirect()->route('aluno.index');
        }
        $foto= null;
        if($request->hasFile('fotoAluno')){
            $nome_arquivo = pathinfo($request->fotoAluno->getClientOriginalName(), PATHINFO_FILENAME);
            $extensao_arquivo = $request->fotoAluno->getClientOriginalExtension();
            $foto = $nome_arquivo . '-' . time() . '.' . $extensao_arquivo;
                    
            $request->fotoAluno->move(public_path('imagens/Aluno/'), $foto);
        };

        $aluno->update([
            'matricula' => $request->matricula,
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'foto' => 'imagens/Aluno/' . $foto
        ]);

        $aluno->turmas()->syncWithoutDetaching($request->turma_id);

        $aluno->contatoAluno()->update([
            'telefone' => $request->telefone
        ]);
        
        return redirect()->route('aluno.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluno = Aluno::find($id);
        $aluno->delete();
        return redirect()->route('aluno.index');
        //
    }
}
