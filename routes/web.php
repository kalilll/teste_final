<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('aluno', AlunoController::class);
Route::get('contato/aluno', [AlunoController::class, 'contato']);
Route::resource('professor', ProfessorController::class);