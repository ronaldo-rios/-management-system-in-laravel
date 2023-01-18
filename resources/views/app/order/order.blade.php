@extends('layout.basicApp')

@section('title', 'Pedidos')

@section('content')
   

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lista de Pedidos</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('pedido.create')}}">Novo</a>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>
        
        <div class="informacao-pagina">
            
            <div style="width:95%; margin-left:auto; margin-right:auto">
                
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>ID Cliente</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->client_id }}</td>
                            <td style="background-color: rgb(127, 35, 180); border:1px solid black; border-radius:5px">
                                <a style="text-decoration:none; color: #fff"
                                href="{{ route('pedido-produto.create', ['order' => $order->id]) }}">
                                Adicionar Produtos
                            </a>
                            </td>
                            
                            <td style="background-color: rgb(4, 135, 223); border:1px solid black; border-radius:5px">
                                <a style="text-decoration:none; color: #fff" href="">
                                Detalhes
                                </a>
                            </td>
                            <td style="background-color: rgb(214, 3, 56); border:1px solid black; border-radius:5px">
                                <form id="form_{{$order->id}}" method="POST" action="{{route('pedido.destroy', [$order->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a style="text-decoration:none; color: #fff" href="#" 
                                    onclick="document.getElementById('form_{{$order->id}}').submit()">
                                    Excluir
                                    </a>
                                </form>
                            </td>
                            <td style="background-color: rgb(253, 145, 4); border:1px solid black; border-radius:5px">
                                <a style="text-decoration:none; color: #fff" href="{{ route('pedido-produto.create', ['order' => $order->id]) }}">
                                    Editar
                                </a>
                            </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
                {{-- Call provider in listProvider Methods: --}}
                <div class="pagination">
                    
                    {{$orders->appends($request)->links()}}<br>
                    
                <div>
            </div>
        </div>
    </div>
    
    

@endsection