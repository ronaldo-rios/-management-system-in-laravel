@extends('layout.basicApp')

@section('title', 'Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Cliente</p>
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
            <div style="width:40%; margin-left:auto; margin-right:auto">
                <form method="POST" action="{{route('cliente.update', $client->id)}}">


                    <input type="hidden" name="id" value="{{$client->id ?? ''}}">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{$client->name ?? old('name')}}" placeholder="Nome do Cliente">
                    {{$errors->has('name') ? $errors->first('name') : ''}}                    

                    <button type="submit">Editar</button>
                </form>
            </div>
        </div>
    </div>

@endsection