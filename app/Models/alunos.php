<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class alunos extends Authenticatable
{
    use HasFactory;
    protected $casts = ['lesao'=>'array',];
    protected $fillable = [
        'lesao',
        'filial',
        'treinoVez',
        'cep',
        'rua',
        'numeroCasa',
        'bairro rro',
        'cidade',
        'uf', 
        'complemento',
        'telefone efone',
        'genero',
        'peso',
        'altura',
        'frequencia',
        'objetivo',
        'fumante',
        'bebidaAlcolica',
        'hipertenso',
        'alteracaoCardiaca',
        'diabes',
        'id_usuario',
        'imc',
        'intensidade',
        'metaTreino',
    ];
    protected $dataNascimento=['date'];
    protected $guarded=[];
    protected $hidden = [
        'telefone',
    ];
    public function emagrecer(){
        return $this->belongsToMany('App\Models\emagrecer');
        //belonsTO = Pertecem a alguém; logo um usuario só vai poder pertencer a um aluno
    }
    public function hipertrofia(){
        return $this->belongsToMany('App\Models\hipertrofia');
        //belonsTO = Pertecem a alguém; logo um usuario só vai poder pertencer a um aluno
    }
    public function registencia(){
        return $this->belongsToMany('App\Models\registencia');
        //belonsTO = Pertecem a alguém; logo um usuario só vai poder pertencer a um aluno
    }
}
