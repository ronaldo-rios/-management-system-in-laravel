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
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->simplePaginate(5);

        return view('app.provider.list', ['providers' => $providers, 'request' => $request->all()]);
    }


    public function addProvider(Request $request) {

        $msg = '';
        //If token is filled in and id is empty, the registration is done
        if($request->input('_token') != '' && $request->input('id') == ''){

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
        //If token is filled in and id is DIFFERENT from empty, 
        //the UPDATE of the supplier is performed
        if($request->input('_token') != '' && $request->input('id') != ''){
            $provid = Provider::find($request->input('id'));
            $updatedProvider = $provid->update($request->all());

            if($updatedProvider){
                $msg = 'Atualizado com sucesso!';
            }
            else {
                $msg = 'Erro na atualização do registro!';
            }

            return redirect()->route('app.providers.update', [
                'id' => $request->input('id'), 
                'msg' => $msg
            ]);
    }
        

        return view('app.provider.add', ['msg' => $msg]);
    }




    public function updateProvider($id, $msg = '') {

        $provid = Provider::find($id);

        return view('app.provider.add', ['provid' => $provid, 'msg' => $msg]);

    }


    public function destroyProvider($id, $msg = '') {
        
        Provider::find($id)->delete();  
        return redirect()->route('app.providers.list');
    }
}
