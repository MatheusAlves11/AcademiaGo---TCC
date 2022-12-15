<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginsController extends Controller
{
    //Login
        public function login(Request $request)
        {
            //dd(Hash::make('1'));
            return view('Login.login');
        }
        
        public function loginForms(Request $request)
            {
                $adm=User::where('email',$request->email)->first(); 
                if($adm && Hash::check($request->password,$adm->password)){
                    Auth::loginUsingId($adm->id);
                    if($adm->nivelAcesso==1){
                        return redirect('/homeAdm');
                    }
                    elseif($adm->nivelAcesso==2)
                    {
                        return redirect('/homePersonal');
                    }else{
                        return redirect('/homeAluno');
                    }
                }else{
                    return redirect()->back()->with('danger','Email ou senha invalida!');
                }
            }
    //Esqueceu senha
        public function indexSenha()
        {
            return view('Login.esqueceusenha');            
        }
        public function esqueceuSenhaFormsEmail(Request $request)
        {
            $email=$request->email;
            $entidade=User::where('email', 'like', '%'.$email.'%')->first();
                if(empty($entidade)){
                    return redirect('/')->with('msg','Esse usuario não existe!');
                }
                return view('Login.novaSenha',['entidade'=>$entidade]);
            
        }
        public function esqueceuSenhaForms (Request $request)
        {
            User::findOrFail($request->entidade)->update([
                'password'=>Hash::make($request->senhaAtualizada),
            ]);  
            return redirect('/');
        }
    //Logout
        public function logout (){
            Auth::logout();
            return redirect('/');
        }
    
}
