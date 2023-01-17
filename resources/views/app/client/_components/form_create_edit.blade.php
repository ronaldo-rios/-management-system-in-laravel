

@if(isset($client->id))
<form method="POST" action="{{ route('cliente.update', ['client' => $client->id]) }}">
    @csrf
    @method('PUT')

@else
<form method="POST" action="{{ route('cliente.store') }}">
    @csrf

@endif

    <input name="name" value="{{$client->name ?? old('name')}}" type="text" placeholder="Nome Cliente " class="borda-preta">
    {{ $errors->has('name') ? $errors->first('name') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>

</form>