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
            
            <div style="width:90%; margin-left:auto; margin-right:auto">
                
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
                            <td style="background-color: rgb(214, 3, 56); border:1px solid black; border-radius:5px">
                                <a style="text-decoration:none; color: #fff" href="{{route('app.providers.destroy', $provider->id)}}">
                                    Excluir
                                </a>
                            </td>
                            <td style="background-color: rgb(253, 145, 4); border:1px solid black; border-radius:5px">
                                <a style="text-decoration:none; color: #fff" href="{{route('app.providers.update', $provider->id)}}">
                                    Editar
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p>Lista de Produtos</p>
                                <table border="1" style="margin:20px">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Loop call products in products method in model Provider: --}}
                                        @foreach($provider->products as $key => $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
                {{-- Call provider in listProvider Methods: --}}
                <div class="pagination">
                    
                    {{$providers->appends($request)->links()}}<br>
                    
                <div>
            </div>
        </div>
    </div>


@endsection