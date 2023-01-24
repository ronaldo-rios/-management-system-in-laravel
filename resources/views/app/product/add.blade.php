@extends('layout.basicApp')

@section('title', 'Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('product.index')}}">Voltar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina" style="color:red;">
            {{$msg ?? ''}}
            <div style="width:40%; margin-left:auto; margin-right:auto">
                <form method="POST" action="{{route('product.store')}}">

                    <select name="provider_id">
                        <option>Selecione um Fornecedor</option>

                        @foreach($providers as $prov)
                        <option value="{{$prov->id}}" {{ old('provider_id') == $prov->id ? 'selected' : ''}}>
                            {{$prov->name}}
                        </option>
                        @endforeach

                    </select>
                    {{$errors->has('provider_id') ? $errors->first('provider_id') : ''}}

                    <input type="hidden" name="id" value="">
                    @csrf
                    <input type="text" name="name" value="{{old('name')}}" placeholder="Nome do Produto">
                    {{$errors->has('name') ? $errors->first('name') : ''}}

                    <input type="text" name="description" value="{{old('description')}}" placeholder="Descrição">
                    {{$errors->has('description') ? $errors->first('description') : ''}}

                    <input type="text" name="weight" value="{{old('weight')}}" placeholder="Peso do Produto">
                    {{$errors->has('weight') ? $errors->first('weight') : ''}}
                    
                    <select name="unit_id">
                        <option>Selecione a Unidade de Medida</option>

                        @foreach($un as $unit)
                        <option value="{{$unit->id}}" {{old('unit_id') == $unit->id ? 'selected' : ''}}>
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