@extends('layout.basicApp')

@section('title', 'Detalhes Produto')

@section('content')
   

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Detalhes Produto</p>
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
                        <tr>
                            
                                
                            </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
                {{-- Call provider in listProvider Methods: --}}
                <div class="pagination">
                    
                   
                    
                <div>
            </div>
        </div>
    </div>
    
    

@endsection