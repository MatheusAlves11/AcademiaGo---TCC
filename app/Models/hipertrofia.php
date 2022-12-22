<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class hipertrofia extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    
    protected $fillable = [
        'id_aluno',
    ];
    
    protected $casts = [
        'exercicio'=>'array',
        'cardio'=>'array',
    ];
    public function historicoTreinoHipertrofia(){
        return $this->belongsTo('App\Models\alunos');
        //belonsTO = Pertecem a alguém; logo um usuario só vai poder pertencer a um aluno
    }
}
