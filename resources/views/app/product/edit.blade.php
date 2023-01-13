@extends('layout.basicApp')

@section('title', 'Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar Produto</p>
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
            <div style="width:40%; margin-left:auto; margin-right:auto">
                <form method="POST" action="{{route('product.update', ['product' => $product->id])}}">

                    <input type="hidden" name="id" value="{{$product->id ?? ''}}">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{$product->name ?? old('name')}}" placeholder="Nome do Produto">
                    {{$errors->has('name') ? $errors->first('name') : ''}}

                    <input type="text" name="description" value="{{$product->description ?? old('description')}}" placeholder="Descrição">
                    {{$errors->has('description') ? $errors->first('description') : ''}}

                    <input type="text" name="weight" value="{{$product->weight ?? old('weight')}}" placeholder="Peso do Produto">
                    {{$errors->has('weight') ? $errors->first('weight') : ''}}
                    
                    <select name="unit_id">
                        <option>Selecione a Unidade de Medida</option>

                        @foreach($un as $unit)
                        <option value="{{$unit->id}}" {{($product->unit_id ?? old('unit_id')) == $unit->id ? 'selected' : ''}}>
                            {{$unit->description}}
                        </option>
                        @endforeach

                    </select>
                    {{$errors->has('unit_id') ? $errors->first('unit_id') : ''}}

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection