<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';
        if($request->get('erro') == 1) {
            $erro = 'Usuário ou senha não existem!';
        }

        if($request->get('erro') == 2) {
            $erro = 'Necessário login para acessar!';
        }

        return view('site.login', ['erro' => $erro]);

    }


    public function signIn(Request $request) {
        
        $validationRules = 
        [
            'user' => 'email',
            'password' => 'required'
        ];

        //Feedback validation:
        $feedback = 
        [
            'user.email' => 'O campo é obrigatório',
            'password.required' => 'O campo é obrigatório'
        ];

        $request->validate($validationRules, $feedback);

        $email = $request->get('user');
        $password = $request->get('password');

        //Initializing instance User Model:
        $user = new User();
        $userExists = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();
       
        if(isset($userExists->name)){
            session_start();
            $_SESSION['name'] = $userExists->name;
            $_SESSION['email'] = $userExists->email;
            return redirect()->route('app.clients');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    
    public function logOut() {
        session_destroy();
        return redirect()->route('site.login');
    }

}
