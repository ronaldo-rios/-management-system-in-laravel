@extends('layout.basicApp')

@section('title', 'Produto')

@section('content')
   

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="">Novo</a>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
            
            <div style="width:80%; margin-left:auto; margin-right:auto">
                
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade Id</th>
                            {{-- <th>Editar</th>
                            <th>Excluir</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->weight }}</td>
                            <td>{{ $product->unit_id }}</td>
                            <td><a href="">Excluir</a></td>
                            <td><a href="">Editar</a></td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
                {{-- Call provider in listProvider Methods: --}}
                <div class="pagination">
                    
                    {{$products->appends($request)->links()}}<br>
                    
                <div>
            </div>
        </div>
    </div>


@endsection