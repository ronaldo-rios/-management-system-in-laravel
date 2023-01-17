


<form method="POST" action="{{ route('pedido-produto.store', ['order' => $order]) }}">
    @csrf

    <select name="product_id">
        <option>Selecione um Produto</option>

        @foreach($products as $product)
            <option value="{{$product->id}}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{$product->name}}</option>
        @endforeach

    </select>
    {{ $errors->has('product_id') ? $errors->first('product_id') : '' }}

    <input type="number" name="quantity" value="{{old('quantity') ? old('quantity') : ''}}" 
    placeholder="Quantidade" class="borda-preta">
    {{ $errors->has('quantity') ? $errors->first('quantity') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>

</form>