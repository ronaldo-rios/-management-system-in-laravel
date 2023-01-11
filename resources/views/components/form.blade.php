
<form action="{{route('site.contact')}}" method="POST">
    @csrf
    <input name="name" value="{{old('name')}}" type="text" placeholder="Nome" class="borda-preta">
    @if($errors->has('name'))
        {{$errors->first('name')}}
    @endif
    <br>
    <input name="phone" value="{{old('phone')}}" type="text" placeholder="Telefone" class="borda-preta">
    @if($errors->has('phone'))
        {{$errors->first('phone')}}
    @endif
    <br>
    <input name="email" value="{{old('email')}}" type="email" placeholder="E-mail" class="borda-preta">
    @if($errors->has('email'))
        {{$errors->first('email')}}
    @endif
    <br>
    <select name="reason_contacts_id" class="borda-preta">

        <option value="">Qual o motivo do contato?</option>

        @foreach($reason_contact as $key => $reason)
            <option value="{{$reason->id}}" {{old('reason_contacts_id') == $reason->id ? 'selected' : ''}}>{{$reason->reason_contact}}</option>
        @endforeach
          
    </select>
    @if($errors->has('reason_contacts_id'))
        {{$errors->first('reason_contacts_id')}}
    @endif
    <br>
    <textarea name="message" class="borda-preta">{{(old('message') != '') ? old('message') : 'Preencha aqui a sua mensagem'}}</textarea>
    @if($errors->has('message'))
        {{$errors->first('message')}}
    @endif
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

{{-- Feedback Validation Errors: --}}
@if($errors->any())
    <div style="position:absolute">

        @foreach($errors->all() as $err)
            {{ $err }}
            <br/>
        @endforeach

    </div>
@endif