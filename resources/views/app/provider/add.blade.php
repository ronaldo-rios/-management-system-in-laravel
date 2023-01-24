@extends('layout.basicApp')

@section('title', 'Fornecedor')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Fornecedor</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('app.providers.add')}}">Novo</a>
                    <a href="{{route('app.providers')}}">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina" style="color:red;">
            {{$msg ?? ''}}
            <div style="width:40%; margin-left:auto; margin-right:auto">
                <form method="POST" action="{{route('app.providers.add')}}">

                    <input type="hidden" name="id" value="{{$provid->id ?? ''}}">
                    @csrf
                    <input type="text" name="name" value="{{$provid->name ?? old('name')}}" placeholder="Nome Fornecedor">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}

                    <input type="text" name="site" value="{{$provid->site ?? old('site')}}" placeholder="Site Fornecedor">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" name="UF" value="{{$provid->UF ?? old('UF')}}" placeholder="UF">
                    {{ $errors->has('UF') ? $errors->first('UF') : '' }}
                    
                    <input type="email" name="email" value="{{$provid->email ?? old('email')}}" placeholder="E-mail Fornecedor">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection