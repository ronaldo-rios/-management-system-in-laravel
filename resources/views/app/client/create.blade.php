@extends('layout.basicApp')

@section('title', 'Cliente')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Cliente</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('cliente.index')}}">Voltar</a>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width:40%; margin-left:auto; margin-right:auto">
                
                @component('app.client._components.form_create_edit')
                @endcomponent

            </div>
        </div>
    </div>

@endsection