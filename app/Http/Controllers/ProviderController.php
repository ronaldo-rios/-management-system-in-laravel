<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
    
    public function index() {

        

        return view('app.provider.provider');
    }


    public function listProvider(Request $request) {

        //Find provider by name, site, uf and e-mail:
        $providers = Provider::where('name', 'like', '%'.$request->input('name').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('UF', 'like', '%'.$request->input('UF').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')->get();

        return view('app.provider.list', ['providers' => $providers]);
    }


    public function addProvider(Request $request) {

        $msg = '';

        if($request->input('_token') != ''){

        $rules = [
                'name' => 'required',
                'site' => 'required',
                'UF' => 'required | min:2 | max:2',
                'email' => 'email',
            ];
        
        $feedback = [
            'required' => 'O campo deve ser preenchido',
            'UF.min' => 'Mínimo de caracteres deve ser igual a 2',
            'UF.max' => 'Máximo de caracteres deve ser igual a 2',
            'email.email' => 'Digite um e-mail válido'
        ];

        $request->validate($rules, $feedback);

        $provider = new Provider();
        $provider->create($request->all());

        $msg = 'Cadastro realizado com sucesso!';
    }

        return view('app.provider.add', ['msg' => $msg]);
    }
}
