<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\personals;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function cadastrarTestes()
    {
    //Inicio criar ADM
        $novoADM = new User;
        $novoADM->name = 'Pedro Antônio';
        $novoADM->email = 'test@test.com';
        $novoADM->password = Hash::make('.');
        $novoADM->nivelAcesso = 1;
        $novoADM->save();
    //Fim criar ADM
    //Inicio criar PERSONAL
        $novaEntidade = new User;
        $novaEntidade->name = 'Enéas é foda';
        $novaEntidade->email = 'd@d.com';
        $novaEntidade->password = Hash::make('.');
        $novaEntidade->nivelAcesso = 2;
        $novaEntidade->save();
        $novoPersonal = new personals;
        $novoPersonal->cref = '22';
        $novoPersonal->filial = 'MCZ City';
        $novoPersonal->telefone = '82981101112';
        $novoPersonal->id_usuario = $novaEntidade->id;
        $novoPersonal->save();
    //Fim criar PERSONAL
    return redirect('/');
    }
}