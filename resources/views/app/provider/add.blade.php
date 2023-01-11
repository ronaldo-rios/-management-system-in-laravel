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
        <div class="informacao-pagina">
            {{$msg}}
            <div style="width:40%; margin-left:auto; margin-right:auto">
                <form method="POST" action="{{route('app.providers.add')}}">
                    @csrf
                    <input type="text" name="name" value="{{old('name')}}" placeholder="Nome Fornecedor">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}

                    <input type="text" name="site" value="{{old('site')}}" placeholder="Site Fornecedor">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" name="UF" value="{{old('UF')}}" placeholder="UF">
                    {{ $errors->has('UF') ? $errors->first('UF') : '' }}
                    
                    <input type="email" name="email" value="{{old('email')}}" placeholder="E-mail Fornecedor">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection