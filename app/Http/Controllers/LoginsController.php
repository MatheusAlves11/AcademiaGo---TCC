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
            return view('Login.login');
        }
        public function loginForms(Request $request)
        {
             $entidade=User::where('email',$request->email)->first(); 
                if($entidade && Hash::check($request->password,$entidade->password)){
                    Auth::loginUsingId($entidade->id);
                    if($entidade->nivelAcesso==1){
                        return redirect('/homeAdm');
                    }
                    elseif($entidade->nivelAcesso==2)
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
            $usuario=User::where('email', 'like', '%'.$email.'%')->first();
            if(empty($usuario)){
                 return redirect('/esqueceuSenha')->with('msg','Esse usuario não existe!');
             }
             return view('Login.novaSenha',['entidade'=>$usuario]);
        }
        public function esqueceuSenhaForms (Request $request)
        {
            User::findOrFail($request->entidade)->update([
                'password'=>Hash::make($request->password),
            ]);  
            return redirect('/');
        }
    //Logout
        public function logout (){
            Auth::logout();
            return redirect('/');
        }
    
}
