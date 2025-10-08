<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    //
    protected $table = "turma";
    protected $fillable = ['descricao', 'curso_id'];
    public $timestamps = false;
}