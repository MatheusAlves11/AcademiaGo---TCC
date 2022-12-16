<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PersonalCreateRequest;
use App\Http\Requests\PersonalUpdateRequest;
use App\Repositories\PersonalRepository;
use App\Validators\PersonalValidator;
use App\Models\User;
use App\Models\personals;
use App\Models\alunos;
/**
 * Class PersonalsController.
 *
 * @package namespace App\Http\Controllers;
 */
class PersonalsController extends Controller
{
   //index
   public function index()
   {
       $adm=auth()->user();
       $personal=personals::where('id_usuario',$adm->id)->first();
       $busca=request('search'); 
       /*if($busca){
           if(!empty(User::where('name', 'like', '%'.$busca.'%')->first())){
               $entidade=User::where([
                   ['name', 'like', '%'.$busca.'%']
                   ])->get();
                   foreach ($entidade as $personalBusca){
                       $personal=personals::where([['id_usuario','like',$personalBusca->id]])->get();
                   }
           }elseif(!empty(personals::where('cref', 'like', '%'.$busca.'%')->first())){
               $personal=personals::where([
                   ['cref', 'like', '%'.$busca.'%']
                   ])->get();
                   foreach ($personal as $personalBusca){
                       $entidade=User::where([['id','like',$personalBusca->id_usuario]])->get();
                   }
           }else{
               $personal=null;
               $entidade=null;
           } 
       }else{
           $personal=personals::all();
           $entidade=user::all();
       }*/
    return view('Personal.ListagemAlunosPersonal',['usuario'=>$adm,'personal'=>$personal/*,'entidade'=>$entidade,'busca'=>$busca*/]);
   }
}
