<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $clients = Client::simplePaginate(10);
        return view('app.client.client', ['clients' => $clients, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required | min:3',
        ];


        $feedback = [
            'name.required' => 'O campo deve ser preenchido',
            'name.min' => 'Nome deve ter pelo menos 3 letras'
        ];

        $request->validate($rules, $feedback);


        $client = new Client();
        $client->name = $request->get('name');
        $client->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        return view('app.client.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        
        return view('app.client.edit', [
            'client' => $client
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name'=> 'required | min:3',
        ];
        $feedback = [
            'name.required'=> 'O campo deve ser preenchido',
            'name.min' => 'Nome deve ter pelo menos 3 letras'
        ];

        $request->validate($rules, $feedback);

        $client = Client::findOrFail($id);
        $client->update($request->all());
    
        if($client->save()){
            $msg = 'Atualizado com sucesso!';
        }
        else {
            $msg = 'Erro na atualização do registro!';
        }
    
        return redirect()->route('cliente.index', 
        [
        'clients' => $client, 
        'msg' => $msg
    ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();  
        return redirect()->route('cliente.index');
    }
}

