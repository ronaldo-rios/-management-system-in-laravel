{{-- common content --}}

<div class="topo">

    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('app.clients') }}">Cliente</a></li>
            <li><a href="{{ route('app.providers') }}">Fornecedor</a></li>
            <li><a href="{{ route('product.index') }}">Produto</a></li>
            <li><a href="{{ route('app.logout') }}">Sair</a></li>
        </ul>
    </div>
</div>