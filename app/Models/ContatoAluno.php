<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContatoALuno extends Model
{
    //
    protected $table = "contato_aluno";
    protected $fillable = ['aluno_id', 'telefone'];
    public $timestamps = false;
}