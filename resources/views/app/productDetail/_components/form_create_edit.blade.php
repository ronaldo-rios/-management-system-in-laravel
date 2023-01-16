

@if(isset($product_detail->id))
<form method="POST" action="{{ route('produto-detalhe.update', ['product' => $product_detail->id]) }}">
    @csrf
    @method('PUT')

@else
<form method="POST" action="{{ route('produto-detalhe.store') }}">
    @csrf

@endif

    <input name="product_id" value="{{$product_detail->product_id ?? old('product_id')}}" type="text" placeholder="ID do Produto" class="borda-preta">
    {{ $errors->has('product_id') ? $errors->first('product_id') : '' }}

    <input name="length" value="{{$product_detail->length ?? old('length')}}" type="text" placeholder="Comprimento" class="borda-preta">
    {{ $errors->has('length') ? $errors->first('length') : '' }}

    <input name="width" value="{{$product_detail->width ?? old('width')}}" type="text" placeholder="Largura" class="borda-preta">
    {{ $errors->has('width') ? $errors->first('width') : '' }}

    <input name="heigth" value="{{$product_detail->heigth ?? old('heigth')}}" type="text" placeholder="Altura" class="borda-preta">
    {{ $errors->has('heigth') ? $errors->first('heigth') : '' }}

    <select name="unit_id">
        <option>Selecione a Unidade de Medida</option>

        @foreach($unities as $unit)
            <option value="{{$unit->id}}" {{ ($product_detail->unit_id ?? old('unit_id')) == $unit->id ? 'selected' : '' }}>{{$unit->description}}</option>
        @endforeach

    </select>
    {{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>