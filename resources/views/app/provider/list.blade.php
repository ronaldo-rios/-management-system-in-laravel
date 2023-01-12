@extends('layout.basicApp')

@section('title', 'Fornecedor')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listar Fornecedor</p>
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
            <div style="width:80%; margin-left:auto; margin-right:auto">

                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            {{-- <th>Editar</th>
                            <th>Excluir</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                @foreach($providers as $provider)
                        <tr>
                            <td>{{ $provider->name }}</td>
                            <td>{{ $provider->site }}</td>
                            <td>{{ $provider->UF }}</td>
                            <td>{{ $provider->email }}</td>
                            <td><a href="{{route('app.providers.destroy')}}">Excluir</a></td>
                            <td><a href="{{route('app.providers.update', $provider->id)}}">Editar</a></td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
                {{-- Call provider in listProvider Methods: --}}
                <div class="pagination">
                    {{$providers->appends($request)->links()}}
                <div>
            </div>
        </div>
    </div>

@endsection