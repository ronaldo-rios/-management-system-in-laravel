@extends('layout.basicApp')

@section('title', 'Usuário')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Usuário</p>
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
                <form method="POST" action="{{ route('usuario.update',  $user->id) }}">


                    <input type="hidden" name="id" value="{{$user->id ?? ''}}">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{$user->name ?? old('name')}}" placeholder="Nome do Usuário">
                    {{$errors->has('name') ? $errors->first('name') : ''}}    
                    
                    <input type="email" name="email" value="{{$user->email ?? old('email')}}" placeholder="E-mail do Usuário">
                    {{$errors->has('email') ? $errors->first('email') : ''}}    

                    <input type="password" name="password" value="{{$user->password ?? old('password')}}" placeholder="Senha do Usuário">
                    {{$errors->has('password') ? $errors->first('password') : ''}}    

                    <select name="is_admin">
                        <option value="0" {{$is_admin == 0 ? 'selected' : ''}}>Usuário Comum</option>
                        <option value="1"  {{$is_admin == 1 ? 'selected' : ''}}>Administrador</option>
                     </select>
                     {{$errors->has('is_admin') ? $errors->first('is_admin') : ''}}   

                    <button type="submit">Editar</button>
                </form>
            </div>
        </div>
    </div>

@endsection