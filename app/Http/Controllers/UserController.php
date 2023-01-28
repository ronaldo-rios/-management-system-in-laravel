<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Gate::authorize('isAdmin');
        $users = User::all();
        return view('app.user.user', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('isAdmin');
        return view('app.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('isAdmin');
        $rules = [
            'name' => 'required | min:3',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];


        $feedback = [
            'name.required' => 'O campo deve ser preenchido',
            'name.min' => 'Nome deve ter pelo menos 3 letras',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo precisa ser um e-mail válido (ex: @outlook.com, @gmail.com',
            'password.required' => 'Senha é obrigatória',
            'password.min' => 'Senha precisa ter pelo menos 6 caracteres'
        ];

        $request->validate($rules, $feedback);


        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->is_admin = $request('is_admin');
        $user->save();

        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('isAdmin');
        $user = User::find($id);
        $level = User::select('is_admin')->where('id', $id)->first();
        $is_admin = $level->is_admin;
        return view('app.user.edit', ['user' => $user, 'is_admin' => $is_admin]);
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
        Gate::authorize('isAdmin');
        $rules = [
            'name' => 'required | min:3',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'is_admin' => ['required', Rule::in(['0', '1'])]
        ];


        $feedback = [
            'name.required' => 'O campo deve ser preenchido',
            'name.min' => 'Nome deve ter pelo menos 3 letras',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo precisa ser um e-mail válido (ex: @outlook.com, @gmail.com',
            'password.required' => 'Senha é obrigatória',
            'password.min' => 'Senha precisa ter pelo menos 6 caracteres'
        ];

        $request->validate($rules, $feedback);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); 
        $user->is_admin = $request->input('is_admin');

        if ($user->save()) {
            $msg = 'Atualizado com sucesso!';
        } else {
            $msg = 'Erro na atualização do registro!';
        }

        return redirect()->route(
            'usuario.index',
            [
                'user' => $user,
                'msg' => $msg
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('isAdmin');
        User::find($id)->delete();
        return redirect()->route('usuario.index');
    }
}
