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
                    <a href="{{route('product.create')}}">Novo</a>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
            
            <div style="width:95%; margin-left:auto; margin-right:auto">
                
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade Id</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->provider->name }}</td>
                            <td>{{ $product->weight }}</td>
                            <td>{{ $product->unit_id }}</td>
                            <td>{{ $product->productDetail->length ?? '' }}</td>
                            <td>{{ $product->productDetail->heigth ?? '' }}</td>
                            <td>{{ $product->productDetail->width ?? '' }}</td>
                            <td style="background-color: rgb(4, 135, 223); border:1px solid black; border-radius:5px">
                                <a style="text-decoration:none; color: #fff" href="{{route('product.show', ['product' => $product->id])}}">
                                Detalhes
                                </a>
                            </td>
                            <td style="background-color: rgb(214, 3, 56); border:1px solid black; border-radius:5px">
                                <form id="form_{{$product->id}}" method="POST" action="{{route('product.destroy', ['product' => $product->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a style="text-decoration:none; color: #fff" href="#" 
                                    onclick="document.getElementById('form_{{$product->id}}').submit()">
                                    Excluir
                                    </a>
                                </form>
                            </td>
                            <td style="background-color: rgb(253, 145, 4); border:1px solid black; border-radius:5px">
                                <a style="text-decoration:none; color: #fff" href="{{route('product.edit', ['product' => $product->id])}}">
                                    Editar
                                </a>
                            </td>
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