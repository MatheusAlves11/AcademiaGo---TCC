<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class alunos extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'filial',
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
    ];
    protected $dataNascimento=['date'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'telefone',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'lesao'=>'array',

    ];
}
