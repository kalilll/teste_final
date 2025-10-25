<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\EmpresaController;

Route::get('/', [PublicacaoController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/publicacoes/{publicacao}/like', [PublicacaoController::class, 'like'])->name('publicacoes.like');
    Route::post('/publicacoes/{publicacao}/deslike', [PublicacaoController::class, 'deslike'])->name('publicacoes.deslike');

    Route::post('/publicacoes/{publicacao}/comentario', [PublicacaoController::class, 'comentar'])->name('publicacoes.comentar');
    Route::patch('/comentarios/{comentario}', [PublicacaoController::class, 'atualizarComentario'])->name('comentarios.update');
    Route::delete('/comentarios/{comentario}', [PublicacaoController::class, 'excluirComentario'])->name('comentarios.destroy');
});
Route::get('/publicacoes', [PublicacaoController::class, 'index'])->name('publicacoes.index');


require __DIR__.'/auth.php';
