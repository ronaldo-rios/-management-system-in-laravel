@extends('layout.basic')

@section('title', 'Contato')

@section('content')

{{-- Call of partials/top.blade.php: --}}
@include('partials.top')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Entre em contato conosco</h1>
    </div>

    <div class="informacao-pagina">
        <div class="contato-principal">
            
            @component('components.form', ['reason_contact' => $reason_contact])
            @endcomponent
 
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