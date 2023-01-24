@extends('layout.basicApp')

@section('title', 'Detalhes do Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Detalhes Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="">Voltar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina" style="color:red;">

            <h4>Produto</h4>
            <div>Nome: {{ $product_detail->product->name }}</div><br/>
            <div>Descrição: {{ $product_detail->product->decription }}</div><br/>

            {{$msg ?? ''}}
            <div style="width:40%; margin-left:auto; margin-right:auto">
                
                @component('app.productDetail._components.form_create_edit', [
                    'unities' => $unities, 
                    'product_detail' = $product_detail
                ])
                @component

            </div>
        </div>
    </div>

@endsection