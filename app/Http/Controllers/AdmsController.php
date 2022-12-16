<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\personals;
use App\Models\alunos;

class AdmsController extends Controller
{
    //index
        public function index()
        {
            $adm=auth()->user();
            $busca=request('search'); 
            if($busca){
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
            }
            return view('ADM.ListagemPersonaisADM',['usuario'=>$adm,'personais'=>$personal,'entidade'=>$entidade,'busca'=>$busca]);
        }
        public function indexAluno()
        {
            $adm=auth()->user();
            $aluno=alunos::all();
            return view('ADM.ListagemAlunosADM',['usuario'=>$adm,'alunos'=>$aluno]);
        }
    //Cadastro
        public function cadastroPersonal()
        {
            $adm=auth()->user();
            if($adm->nivelAcesso==1){
                return view('ADM.CadastroPersonalADM',['usuario'=>$adm]);
            }
        }
        public function cadastroFormsPersonal(Request $request)
        {
            $novoUsuario = new User;
            $novoPersonal = new personals;
            $this->validate($request,[
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
                'telefone'=>'required',
                'cref'=>'required',
            ],[
                'name.required'=>'Os campos marcados com * são obrigatorios',
                'email.required'=>'Os campos marcados com * são obrigatorios',
                'password.required'=>'Os campos marcados com * são obrigatorios',
                'telefone.required'=>'Os campos marcados com * são obrigatorios',
                'cref.required'=>'Os campos marcados com * são obrigatorios',
            ]);
            $novoUsuario->name = $request->name;
            $novoUsuario->email = $request->email;
            $novoUsuario->password = Hash::make($request->senha);
            $novoUsuario->nivelAcesso=2;
                    //Upload de imagem
                    if($request->hasfile('foto') && $request->file('foto')->isValid()){
                    //Pega a imagem
                        $requestImagem=$request->foto;
                    //pega a extensão
                        $extension=$requestImagem->extension();
                    //cria o nome da imagem
                        $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now").".".$extension);
                    //move para a pasta das imagens
                        $requestImagem->move(public_path('img'),$imagemName);
                    //salva no bd
                        $novoUsuario->foto=$imagemName;
                    }
            $novoPersonal->telefone= $request->telefone;
            $novoPersonal->cref= $request->cref;
            $novoPersonal->filial= $request->filial;
            $novoUsuario->save();    
            $novoPersonal->id_usuario=$novoUsuario->id;
            $novoPersonal->save();
            return redirect('homeAdm')->with('msg','Personal cadastrado com sucesso!');
        }
        public function cadastroAluno()
        {
            $adm=auth()->user();
            if($adm->nivelAcesso==1){
                return view('ADM.CadastroAlunoADM',['usuario'=>$adm]);
            }
        }
        public function cadastroFormsAluno(Request $request)
        {
            $this->validate($request,[
                'name'=>'required',
                'email'=>'required',
                'password'=>'required'
            ],[
                'name.required'=>'Os campos marcados com * são obrigatorios',
                'email.required'=>'Os campos marcados com * são obrigatorios',
                'password.required'=>'Os campos marcados com * são obrigatorios',
            ]);
        }
    //Editar
        public function atualizarPersonal($id)
        {
            $personal=personals::findOrFail($id);
            $entidade=User::findOrFail($personal->id_usuario);
            return view('ADM.atualizarPersonalADM',['personal'=>$personal, 'entidade'=>$entidade]);
        }
        public function atualizarFormsPersonal(Request $request)
        {
            $atualizadoUsuario = new User;
            $atualizadoPersonal = new personals;
            $this->validate($request,[
                'name'=>'required',
                'email'=>'required',
                'telefone'=>'required',
                'cref'=>'required',
                ],[
                'name.required'=>'Os campos marcados com * são obrigatorios',
                'email.required'=>'Os campos marcados com * são obrigatorios',
                'telefone.required'=>'Os campos marcados com * são obrigatorios',
                'cref.required'=>'Os campos marcados com * são obrigatorios',
            ]);
            if($request->hasfile('foto') && $request->file('foto')->isValid()){
                $requestImagem=$request->foto;
                //Pega a imagem
                $extension=$requestImagem->extension();
                //pega a extensão
                $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now").".".$extension);
                //cria o nome da imagem
                $request->foto->move(public_path('img'),$imagemName);
                //salva no bd
                $atualizadoUsuario['imagem']=$imagemName;
            }
            user::findOrFail($request->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'foto'=>$atualizadoUsuario,
            ]);
            personals::where('id_usuario',$request->id)->update([
                'cref'=>$request->cref,
                'telefone'=>$request->telefone,
                'filial'=>$request->filial,
            ]);
            return redirect('/homeAdm')->with('msg','Personal editado com sucesso!');

        }
    //Deletar
        public function destruirPersonal($id)
        {
            $personal=personals::findOrFail($id);
            $entidade=user::findOrFail($personal->id_usuario);
            $entidade->delete();
            return redirect('/homeAdm')->with('msg','excluido com sucesso!');
        }
}
