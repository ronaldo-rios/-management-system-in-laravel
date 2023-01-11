@extends('layout.basicApp')

@section('title', 'Fornecedor')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
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
            <div style="width:40%; margin-left:auto; margin-right:auto">
                <form method="POST" action="{{route('app.providers.list')}}">
                    @csrf
                    <input type="text" name="name" placeholder="Nome Fornecedor">
                    <input type="text" name="site" placeholder="Site Fornecedor">
                    <input type="text" name="UF" placeholder="UF">
                    <input type="email" name="email" placeholder="E-mail Fornecedor">

                    <button type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>

@endsection