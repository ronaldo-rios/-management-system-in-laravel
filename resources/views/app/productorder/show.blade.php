@extends('layout.basicApp')

@section('title', 'Pedido Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Detalhes do Pedido</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('pedido.index')}}">Voltar</a>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            
            <h4>Detalhes do Pedido</h4>
            <p>ID do Pedido: {{$order->id}}</p>
            <p>Cliente: {{$order->client_id}}</p>

            <div style="width:40%; margin-left:auto; margin-right:auto">
                <h4>Itens do Pedido</h4>
                <table border="1" width="90%" style="margin-left:auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>ID Produto</th>
                            <th>Nome do Produto</th>
                            <th>Última atualização:</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->products as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->pivot->updated_at->format('d/m/Y H:i:s')}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.productorder._components.form_create', ['order' => $order, 'products' => $products])
                @endcomponent

            </div>
        </div>
    </div>

@endsection