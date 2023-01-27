
@extends('layout.basic')

@section('title', 'Login')

@section('content')

{{-- Call of partials/top.blade.php: --}}
@include('partials.top')

@if(session()->has('error'))
    <span class="alert alert-danger">{{session('error')}}</span>
@endif

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>
    @if(session('danger'))
    <div class="alert alert-danger">
        {{session('danger')}}
    </div>
    @endif
    <div class="informacao-pagina" style="color:red; font-weight:bold;">
        <div style="width:30%; margin-left:auto; margin-right:auto">
        <form action="{{route('site.login')}}" method="POST">
            @csrf
            <input name="email" type="email" placeholder="Seu E-mail" class="borda-preta">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
            <input name="password" type="password" placeholder="Sua Senha" class="borda-preta">
            {{ $errors->has('password') ? $errors->first('password') : '' }}
            <button type="submit">Entrar</button>
        </form>
        {{ isset($erro) && $erro != '' ? $erro : '' }}
        </div>
    </div>  
</div>


<div class="rodape">
    <div class="redes-sociais">
        <h2>Redes sociais</h2>
        <img src="{{asset('img/facebook.png')}}">
        <img src="{{asset('img/linkedin.png')}}">
        <img src="{{asset('img/youtube.png')}}">
    </div>
    <div class="area-contato">
        <h2>Contato</h2>
        <span>(11) 3333-4444</span>
        <br>
        <span>gestaofacil@gestaofacil.com.br</span>
        <br><br><br>
        <span>Desenvolvido por Ronaldo Rios Espíndola</span>
    </div>
    <div class="localizacao">
        <h2>Localização</h2>
        <img src="{{asset('img/mapa.png')}}">
    </div>
</div>

@endsection