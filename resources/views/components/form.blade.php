<form action="{{route('site.contact')}}" method="POST">
    @csrf
    <input name="name" value="{{old('name')}}" type="text" placeholder="Nome" class="borda-preta">
    <br>
    <input name="phone" value="{{old('phone')}}" type="text" placeholder="Telefone" class="borda-preta">
    <br>
    <input name="email" value="{{old('email')}}" type="email" placeholder="E-mail" class="borda-preta">
    <br>
    <select name="reason_contact" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>
        @foreach($reason_contact as $key => $reason)
            <option value="{{$reason->id}}" {{old('reason_contact') == $reason->id ? 'selected' : ''}}>{{$reason->reason_contact}}</option>
        @endforeach
        {{-- <option value="1" {{old('reason_contact') == 1 ? 'selected' : ''}}>Dúvida</option>
        <option value="2" {{old('reason_contact') == 2 ? 'selected' : ''}}>Elogio</option>
        <option value="3" {{old('reason_contact') == 3 ? 'selected' : ''}}>Reclamação</option> --}}
        
    </select>
    <br>
    <textarea name="message" class="borda-preta">{{(old('message') != '') ? old('message') : 'Preencha aqui a sua mensagem'}}</textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

<div>
    <pre>

    </pre>
</div>