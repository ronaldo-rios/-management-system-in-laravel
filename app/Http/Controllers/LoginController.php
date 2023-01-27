<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {


        $erro = '';
        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha não existem!';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário login para acessar!';
        }

        return view('site.login', ['erro' => $erro]);
    }



    public function signIn(Request $request)
    {

            
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],
        [
            'email.email' => 'Email é obrigatório',
            'password.required' => 'O campo é obrigatório'
        ]
    
    );

        $auth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        
        if(!$auth){
            return redirect()->route('site.login', ['erro' => 1]);
        }
        
        return redirect()->route('cliente.index');

    }
        


    public function logOut()
    {

        auth()->logout();
        return back();
    }
}
