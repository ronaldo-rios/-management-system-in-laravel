
@extends('layout.basicApp')

@section('title', 'Pedidos')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Novo Pedido</p>
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
            {{$msg ?? ''}}
            <div style="width:40%; margin-left:auto; margin-right:auto">
                
                @component('app.order._components.form_create_edit', 
                [
                    'clients' => $clients
                ])
                @endcomponent

            </div>
        </div>
    </div>

@endsection