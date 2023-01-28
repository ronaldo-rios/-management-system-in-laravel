{{-- common content --}}

<div class="topo">
    
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            
            <li><a href="{{ route('cliente.index') }}">Cliente</a></li>
            <li><a href="{{ route('pedido.index') }}">Pedidos</a></li>
            <li><a href="{{ route('app.providers') }}">Fornecedor</a></li>
            <li><a href="{{ route('product.index') }}">Produto</a></li>
            @can('isAdmin')
            <li><a href="{{ route('produto-detalhe.create') }}">Cadastrar Medida Produto</a></li>
            <li><a href="{{ route('usuario.index') }}">Usuários</a></li>
            @endcan
            <li><a href="{{ route('app.logout') }}">Sair</a></li>
            <li style="font-weight:bold; color:rgb(248, 90, 27);">
                Olá, {{auth()->user()->name}}!
            </li>
            
        </ul>
    </div>
    
</div>