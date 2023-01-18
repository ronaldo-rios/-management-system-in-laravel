@extends('layout.basicApp')

@section('title', 'Cliente')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar Cliente</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('cliente.index')}}">Voltar</a>
                    
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width:100%; margin-left:auto; margin-right:auto">
                <table border="1" style="width:70%; margin-left:auto; margin-right:auto" >
                    <tr>
                        <td>ID</td>
                        <td>{{$client->id}}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{$client->name}}</td>
                    </tr>
                    <tr>
                        <td>Cadastrado em:</td>
                        <td>{{$client->created_at->format('d/m/Y H:i:s')}}</td>
                    </tr>
                    <tr>
                        <td>Atualizado em:</td>
                        <td>{{$client->updated_at->format('d/m/Y H:i:s')}}</td>
                    </tr>
                    
                </table>
                <div style="margin: 3em">
                <table border="0" style="width:20%; margin-left:auto; margin-right:auto">
                    <tr>
                    <td style="background-color: rgb(214, 3, 56); border:1px solid black; border-radius:5px">
                        <form id="form_{{$client->id}}" method="POST" action="{{route('cliente.destroy',  $client->id)}}">
                            @method('DELETE')
                            @csrf
                            <a style="text-decoration:none; color: #fff" href="#" 
                            onclick="document.getElementById('form_{{$client->id}}').submit()">
                            Excluir
                            </a>
                        </form>
                    </td>
                    <td style="background-color: rgb(253, 145, 4); border:1px solid black; border-radius:5px">
                        <a style="text-decoration:none; color: #fff" href="{{route('cliente.edit',  $client->id)}}">
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