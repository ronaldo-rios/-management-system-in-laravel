@extends('layout.basicApp')

@section('title', 'Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('product.index')}}">Voltar</a>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width:100%; margin-left:auto; margin-right:auto">
                <table border="1" style="width:70%; margin-left:auto; margin-right:auto" >
                    <tr>
                        <td>ID</td>
                        <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td>{{$product->description}}</td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td>{{$product->weight}} kg</td>
                    </tr>
                    <tr>
                        <td>Unidade de Medida</td>
                        <td>{{$product->unit_id}}</td>
                    </tr>
                </table>
                <div style="margin: 3em">
                <table border="0" style="width:20%; margin-left:auto; margin-right:auto">
                    <tr>
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
            </table>
                
                <div>
            </div>
        </div>
    </div>

@endsection