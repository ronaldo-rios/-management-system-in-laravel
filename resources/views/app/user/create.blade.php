@extends('layout.basicApp')

@section('title', 'Usuário')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Usuário</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('usuario.index')}}">Voltar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina" style="color:red;">
            {{$msg ?? ''}}
            <div style="width:40%; margin-left:auto; margin-right:auto">
                <form method="POST" action="{{route('usuario.store')}}">
                    @csrf
                    <input type="hidden" name="id" value="">
                    
                    <input type="text" name="name" value="{{$user->name ?? old('name')}}" placeholder="Nome do Usuário">
                    {{$errors->has('name') ? $errors->first('name') : ''}}

                    <input type="email" name="email" value="{{$user->email ?? old('email')}}" placeholder="E-mail do Usuário">
                    {{$errors->has('email') ? $errors->first('email') : ''}}

                    <input type="password" name="password" value="{{$user->password ?? old('password')}}" placeholder="Senha">
                    {{$errors->has('password') ? $errors->first('password') : ''}}
                    

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection