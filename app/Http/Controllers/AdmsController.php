<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\personals;
use App\Models\alunos;
use App\Models\Cardio;
use App\Models\Exercicio;
use App\Models\hipertrofia;
use App\Models\registencia;
use App\Models\emagrecer;

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
            $busca=request('search'); 
            if($busca){
                if(!empty(User::where('name', 'like', '%'.$busca.'%')->first())){
                    $entidade=User::where([
                        ['name', 'like', '%'.$busca.'%']
                        ])->get();
                        foreach ($entidade as $alunoBusca){
                            $aluno=alunos::where([['id_usuario','like',$alunoBusca->id]])->get();
                        }
                 }else{
                    $aluno=null;
                    $entidade=null;
                } 
            }else{
                $aluno=alunos::all();
                $entidade=user::all();
            }
            $aluno=alunos::all();
            return view('ADM.ListagemAlunosADM',['usuario'=>$adm,'aluno'=>$aluno,'entidade'=>$entidade,'busca'=>$busca]);
        }        
        public function indexAluno_detalhes($id)
        {
            $adm=auth()->user();
            $aluno=alunos::findOrFail($id);
            $entidade=user::findOrFail($aluno->id_usuario);
            if($aluno->objetivo=="Resist??ncia"){
                $historicoTreino=$aluno->registencia->count();
            }elseif($aluno->objetivo=="Hipertrofia"){
                $historicoTreino=$aluno->hipertrofia->count();
            }else{
                $historicoTreino=$aluno->emagrecer->count();
            }
            return view('ADM.DetalhesAlunoADM',['quantTreino'=>$historicoTreino,'usuario'=>$adm,'alunos'=>$aluno,'entidade'=>$entidade]);
        }
        public function treinosAluno($id)
        {
            $adm=auth()->user();
            $personal=personals::where('id_usuario',$adm->id)->first();
            $aluno=alunos::findOrFail($id);
            $alunoEntidade=User::findOrFail($aluno->id_usuario);
            if($aluno->objetivo=="Resist??ncia"){
                $treinoAlnuno=registencia::where('id_aluno',$aluno->id)->get();
            }elseif($aluno->objetivo=="Emagrecimento"){
                $treinoAlnuno=emagrecer::where('id_aluno',$aluno->id)->get();
            }else{
                $treinoAlnuno=hipertrofia::where('id_aluno',$aluno->id)->get();
            }
            return view('ADM.TreinosDeAlunoADM',['usuario'=>$adm,'personal'=>$personal,'treino'=>$treinoAlnuno,'entidade'=>$alunoEntidade,'aluno'=>$aluno]);
        }
        public function detalhesDeTreinoDeAluno($id)
        {
            $adm=auth()->user();
            $exercicios=Exercicio::all();
            $cardios=Cardio::all();
            $personal=personals::where('id_usuario',$adm->id)->first();
            $aluno=alunos::findOrFail($id);
            $alunoEntidade=User::findOrFail($aluno->id_usuario);
            if($aluno->objetivo=='Hipertrofia'){
                //Hipertrofia |Exercicios 8 | Cardios 1
                $hipertrofia=hipertrofia::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get();
                if(count($hipertrofia)>0){
                    for ($i=0; $i<count($hipertrofia);$i++){
                        $exercicio=$hipertrofia;
                        $cardio=hipertrofia::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get('cardio');
                    }
                }else{
                    $exercicio=null;
                    $cardio=null;
                }
             }elseif($aluno->objetivo=='Resist??ncia'){
                //Resist??ncia |Exercicios 6 | Cardios 2
                $registencia=registencia::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get();
                if(count($registencia)>0){
                    for ($i=0; $i<count($registencia);$i++){
                        $exercicio=$registencia;
                        $cardio=registencia::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get('cardio');
                    }
            }else{
                    $exercicio=null;
                    $cardio=null;
                }
             }elseif($aluno->objetivo=='Emagrecimento'){
                $emagrecer=emagrecer::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get();
                if(count($emagrecer)>0){
                    $exercicio=$emagrecer;
                    $cardio=emagrecer::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get('cardio');
            }else{
                $exercicio=null;
                $cardio=null;
            }
            }else{
                    $exercicio=null;
                    $cardio=null;
            }
            return view('ADM.detalhesDeTreinoDeAlunoADM',['cardios'=>$cardios,'exercicios'=>$exercicios,'treino'=>$exercicio,'cardio'=>$cardio,'usuario'=>$adm,'personal'=>$personal,'entidade'=>$alunoEntidade,'aluno'=>$aluno,]);
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
                'name.required'=>'Os campos marcados com * s??o obrigatorios',
                'email.required'=>'Os campos marcados com * s??o obrigatorios',
                'password.required'=>'Os campos marcados com * s??o obrigatorios',
                'telefone.required'=>'Os campos marcados com * s??o obrigatorios',
                'cref.required'=>'Os campos marcados com * s??o obrigatorios',
            ]);
            $novoUsuario->name = $request->name;
            if(!empty(user::where('email',$request->email)->first())){
             return redirect()->back()->with('danger','E-mail j?? cadastrado!');
            }
            $novoUsuario->email = $request->email;
            $novoUsuario->password = Hash::make($request->password);
            $novoUsuario->nivelAcesso=2;
            //Upload de imagem
                if($request->hasfile('foto') && $request->file('foto')->isValid()){
                 //Pega a imagem
                 $requestImagem=$request->foto;
                 //pega a extens??o
                 $extension=$requestImagem->extension();
                 //cria o nome da imagem
                 $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extension;
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
            $novoUsuario = new User;
            $this->validate($request,[
                'filial'=>'required',
                'email'=>'required',
                'password'=>'required',
                'name'=>'required',
                'cep'=>'required',
                'rua'=>'required',
                'numeroCasa'=>'required',
                'bairro'=>'required',
                'cidade'=>'required',
                'uf'=>'required',
                'telefone'=>'required',
                'dataNascimento'=>'required',
                'genero'=>'required',
                'peso'=>'required',
                'altura'=>'required',
                'objetivo'=>'required',
                'alteracaoCardiaca'=>'required',
                'lesao'=>'required',
                ],[
                'filial.required'=>'Os campos marcados com * s??o obrigatorios',
                'name.required'=>'Os campos marcados com * s??o obrigatorios',
                'email.required'=>'Os campos marcados com * s??o obrigatorios',
                'password.required'=>'Os campos marcados com * s??o obrigatorios',
                'rua.required'=>'Os campos marcados com * s??o obrigatorios',
                'numeroCasa.required'=>'Os campos marcados com * s??o obrigatorios',
                'bairro.required'=>'Os campos marcados com * s??o obrigatorios',
                'cidade.required'=>'Os campos marcados com * s??o obrigatorios',
                'uf.required'=>'Os campos marcados com * s??o obrigatorios',
                'telefone.required'=>'Os campos marcados com * s??o obrigatorios',
                'dataNascimento.required'=>'Os campos marcados com * s??o obrigatorios',
                'genero.required'=>'Os campos marcados com * s??o obrigatorios',
                'peso.required'=>'Os campos marcados com * s??o obrigatorios',
                'altura.required'=>'Os campos marcados com * s??o obrigatorios',
                'objetivo.required'=>'Os campos marcados com * s??o obrigatorios',
                'alteracaoCardiaca.required'=>'Os campos marcados com * s??o obrigatorios',
                'lesao.required'=>'Os campos marcados com * s??o obrigatorios',
                
                //'required' => 'A :attribute ?? um campo obrigartorio!',
             ]);
            $novoUsuario->name = $request->name;
            if(!empty(user::where('email',$request->email)->first())){
                return redirect()->back()->with('danger','E-mail j?? cadastrado!');
            }
            $novoUsuario->email = $request->email;
            $novoUsuario->password = Hash::make($request->password);
            $novoUsuario->nivelAcesso=3;
            //Upload de imagem
                if($request->hasfile('foto') && $request->file('foto')->isValid()){
                    //Pega a imagem
                    $requestImagem=$request->foto;
                    //pega a extens??o
                    $extension=$requestImagem->extension();
                    //cria o nome da imagem
                    $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extension;
                    //move para a pasta das imagens
                    $requestImagem->move(public_path('img'),$imagemName);
                    //salva no bd
                    $novoUsuario->foto=$imagemName;
                }
            //Upload de imagem
            $novoAluno = new alunos;
            $novoUsuario->save(); 
            $novoAluno->filial = $request->filial;
            $novoAluno->cep = $request->cep;
            $novoAluno->rua = $request->rua;
            $novoAluno->numeroCasa = $request->numeroCasa;
            $novoAluno->bairro = $request->bairro;
            $novoAluno->cidade = $request->cidade;
            $novoAluno->uf = $request->uf;
            $novoAluno->complemento = $request->complemento;
            $novoAluno->telefone = $request->telefone;
            $novoAluno->dataNascimento = $request->dataNascimento;
            $novoAluno->genero = $request->genero;
            if($request->peso>=1){
             $novoAluno->peso = $request->peso;
            }else{
             return redirect()->back()->with('danger','Valor inferior a 1, tente um n??mero maior!');
            }
            if($request->altura>=1 ){
                $novoAluno->altura = $request->altura;
            }else{
                return redirect()->back()->with('danger','Valor inferior a 1, tente um n??mero maior!');
            }
            $novoAluno->frequencia = $request->frequencia;
            $novoAluno->objetivo = $request->objetivo;
            $novoAluno->bebidaAlcolica = $request->bebidaAlcolica;
            $novoAluno->taxasAltas = $request->taxasAltas;
            $novoAluno->fumante = $request->fumante;
            $novoAluno->hipertenso = $request->hipertenso;
            $novoAluno->lesao = $request->lesao;
            $novoAluno->alteracaoCardiaca = $request->alteracaoCardiaca;
            if($novoAluno->alteracaoCardiaca=="nao"){
                $novoAluno->metaTreino = 500;
            }elseif($novoAluno->alteracaoCardiaca=="leve"){
                $novoAluno->metaTreino = 350;
            }else{
                $novoAluno->metaTreino = 200;
            }
            $novoAluno->diabes = $request->diabes;
            $novoAluno->id_usuario=$novoUsuario->id;
            $novoAluno->imc=($request->peso/($request->altura*$request->altura));
            if($novoAluno->imc<20  || $novoAluno->imc>=31){
                $novoAluno->intensidade = "leve";
            }elseif($novoAluno->imc>=20 && $novoAluno->imc<=25){
                $novoAluno->intensidade = "alta";
            }else{
                $novoAluno->intensidade = "moderada";
            }
            $novoAluno->diabes = $request->diabes;
            $novoAluno->save();
            return redirect('homeAdm-aluno')->with('msg','Aluno cadastrado com sucesso!');
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
                'telefone'=>'required',
                'cref'=>'required',
                ],[
                'name.required'=>'Os campos marcados com * s??o obrigatorios',
                'telefone.required'=>'Os campos marcados com * s??o obrigatorios',
                'cref.required'=>'Os campos marcados com * s??o obrigatorios',
            ]);
            if($request->hasfile('foto') && $request->file('foto')->isValid()){
                $requestImagem=$request->foto;
                //Pega a imagem
                $extension=$requestImagem->extension();
                //pega a extens??o
                $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now").".".$extension);
                //cria o nome da imagem
                $request->foto->move(public_path('img'),$imagemName);
                //salva no bd
                $atualizadoUsuario=$imagemName;
            }
            user::findOrFail($request->id)->update([
                'name'=>$request->name,
                'foto'=>$atualizadoUsuario,
            ]);
            personals::where('id_usuario',$request->id)->update([
                'cref'=>$request->cref,
                'telefone'=>$request->telefone,
                'filial'=>$request->filial,
            ]);
            return redirect('/homeAdm')->with('msg','Personal editado com sucesso!');

        }
        public function atualizarAluno($id)
        {
            $aluno=alunos::findOrFail($id);
            $entidade=User::findOrFail($aluno->id_usuario);
            return view('ADM.AtualizarAlunoADM',['aluno'=>$aluno,'entidade'=>$entidade]);
        }
        public function atualizarFormsAluno(Request $request)
        {          
            $this->validate($request,[
                'filial'=>'required',
                'name'=>'required',
                'cep'=>'required',
                'rua'=>'required',
                'numeroCasa'=>'required',
                'bairro'=>'required',
                'cidade'=>'required',
                'uf'=>'required',
                'telefone'=>'required',
                'genero'=>'required',
                'peso'=>'required',
                'altura'=>'required',
                'objetivo'=>'required',
                'alteracaoCardiaca'=>'required',
                'lesao'=>'required',
                ],[
                'filial.required'=>'Os campos marcados com * s??o obrigatorios',
                'name.required'=>'Os campos marcados com * s??o obrigatorios',
                'cep.required'=>'Os campos marcados com * s??o obrigatorios',
                'rua.required'=>'Os campos marcados com * s??o obrigatorios',
                'numeroCasa.required'=>'Os campos marcados com * s??o obrigatorios',
                'bairro.required'=>'Os campos marcados com * s??o obrigatorios',
                'cidade.required'=>'Os campos marcados com * s??o obrigatorios',
                'uf.required'=>'Os campos marcados com * s??o obrigatorios',
                'telefone.required'=>'Os campos marcados com * s??o obrigatorios',
                'genero.required'=>'Os campos marcados com * s??o obrigatorios',
                'peso.required'=>'Os campos marcados com * s??o obrigatorios',
                'altura.required'=>'Os campos marcados com * s??o obrigatorios',
                'frequencia.required'=>'Os campos marcados com * s??o obrigatorios',
                'objetivo.required'=>'Os campos marcados com * s??o obrigatorios',
                'lesao.required'=>'Os campos marcados com * s??o obrigatorios',
            ]);
            $aluno=alunos::findOrFail($request->id);
            $entidade=User::findOrFail($aluno->id_usuario);
            $atualizadoUsuario=$entidade->foto;
            if($request->hasfile('foto') && $request->file('foto')->isValid()){
                $requestImagem=$request->foto;
                //Pega a imagem
                $extension=$requestImagem->extension();
                //pega a extens??o
                $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now").".".$extension);
                //cria o nome da imagem
                $request->foto->move(public_path('img'),$imagemName);
                //salva no bd
                $atualizadoUsuario=$imagemName;
            }
            //Upload de imagem
            User::findOrFail($entidade->id)->update([
                'name' => $request->name,
                'foto'=>$atualizadoUsuario,
            ]);
             $imc=($request->peso/($request->altura*$request->altura));
                if($request->alteracaoCardiaca=="nao"){
                    $metaTreino=500;
                }elseif($request->alteracaoCardiaca=="leve"){
                    $metaTreino=350;
                }else{
                    $metaTreino=200;
                }
                if($imc<20  || $imc>=31){
                    $intensidade = "leve";
                }elseif($imc>=20 && $imc<=25){
                    $intensidade ="alta";
                }else{
                    $intensidade = "moderada";
                }
            alunos::findOrFail($request->id)->update([
                'lesao' => $request->lesao,
                'filial' => $request->filial,
                'cep' => $request->cep,
                'rua' => $request->rua,
                'numeroCasa' => $request->numeroCasa,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
                'complemento' => $request->complemento,
                'telefone' => $request->telefone,
                'dataNascimento' => $request->dataNascimento,
                'genero' => $request->genero,
                'peso' => $request->peso,
                'altura' => $request->altura,
                'frequencia' => $request->frequencia,
                'objetivo' => $request->objetivo,
                'fumante' => $request->fumante,
                'hipertenso' => $request->hipertenso,
                'alteracaoCardiaca' => $request->alteracaoCardiaca,
                'diabes' => $request->diabes,
                'imc' =>$imc,
                'intensidade' =>$intensidade,
                'metaTreino' =>$metaTreino,
            ]);
            return redirect('homeAdm-aluno')->with('msg','Aluno atualizado com sucesso!');
        }
    //Deletar
        public function destruirPersonal($id)
        {
            $personal=personals::findOrFail($id);
            $entidade=user::findOrFail($personal->id_usuario);
            $entidade->delete();
            return redirect('/homeAdm')->with('msg','excluido com sucesso!');
        }
        public function destruirAluno($id)
        {
            $aluno=alunos::findOrFail($id);
            $entidade=user::findOrFail($aluno->id_usuario);
            $entidade->delete();
            return redirect('/homeAdm-aluno')->with('msg','excluido com sucesso!');
        }
}
