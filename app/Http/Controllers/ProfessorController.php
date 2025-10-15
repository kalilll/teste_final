<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;   

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professores = Professor::all(); 
        return view('professor.index', compact('professores'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('professor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foto= null;
        if($request->hasFile('fotoProfessor')){
            $nome_arquivo = pathinfo($request->fotoProfessor->getClientOriginalName(), PATHINFO_FILENAME);
            $extensao_arquivo = $request->fotoProfessor->getClientOriginalExtension();
            $foto = $nome_arquivo . '-' . time() . '.' . $extensao_arquivo;

            $request->fotoProfessor->move(public_path('imagens/Professor/'), $foto);
        };

        $professor= Professor::create([
            'nome' => $request->nome,
            'disciplina' => $request->disciplina,
            'foto' => 'imagens/Professor/' . $foto
        ]);

        $professor->contatoProfessor()->create([
            'telefone' => $request->telefone,
            'email' => $request->email
        ]);

        return redirect()->route('professor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $professor= Professor::find($id);
        return view('professor.show', compact('professor'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $professor = Professor::find($id);
        return view('professor.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $professor = Professor::find($id);

        if (!$professor) {
            return redirect()->route('professor.index');
        }
        
        $foto= null;
        if($request->hasFile('fotoAluno')){
            $nome_arquivo = pathinfo($request->fotoProfessor->getClientOriginalName(), PATHINFO_FILENAME);
            $extensao_arquivo = $request->fotoProfessor->getClientOriginalExtension();
            $foto = $nome_arquivo . '-' . time() . '.' . $extensao_arquivo;
                    

            $request->fotoProfessor->move(public_path('imagens/Professor/'), $foto);
        };


        $professor->update([
            'nome' => $request->nome,
            'disciplina' => $request->disciplina,
            'foto' => 'imagens/Professor/' . $foto
        ]);

        $professor->contatoProfessor()->update([
            'telefone' => $request->telefone,
            'email' => $request->email
        ]);

        return redirect()->route('professor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $professor = Professor::find($id);
        $professor->delete();
        return redirect()->route('professor.index');
        //
    }
}