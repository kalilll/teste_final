<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use App\Models\Comentario;
use App\Models\Like;
use App\Models\Deslike;

class PublicacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicacoes = Publicacao::all();
        $likes_quant = Like::count();
        $deslikes_quant = Deslike::count();
        return view('index', compact('publicacoes', 'likes_quant', 'deslikes_quant'));
    }

    public function comentar(Request $request, Publicacao $publicacao)
    {
        $request->validate([
            'comentario' => 'required|string|max:500',
        ]);

        $publicacao->comentarios()->create([
            'user_id' => auth()->id(),
            'comentario' => $request->comentario,
        ]);

        return back();
    }

    public function like(Publicacao $publicacao)
    {
        $user = auth()->user();
        if ($publicacao->likes()->where('user_id', $user->id)->exists()) {
            $publicacao->likes()->where('user_id', $user->id)->delete(); // deslike
        } else {
            $publicacao->likes()->create(['user_id' => $user->id]);
        }

        return back();
    }

    public function deslike(Publicacao $publicacao)
    {
        $user = auth()->user();
        if ($publicacao->deslikes()->where('user_id', $user->id)->exists()) {
            $publicacao->deslikes()->where('user_id', $user->id)->delete(); // remove deslike
        } else {
            $publicacao->deslikes()->create(['user_id' => $user->id]);
        }

        return back();
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
