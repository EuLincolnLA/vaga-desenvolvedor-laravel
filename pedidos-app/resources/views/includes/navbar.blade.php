<nav class="navbar navbar-dark bg-dark">
    <div class="container-md">
        <a class="navbar-brand" href="">CRUD - Sistema</a>
        <div class="navbar-nav d-flex align-items-center" style="flex-direction: row;">
            <a class="nav-link {{ request()->is('clientes*') ? 'active' : '' }}" href="{{ route('clientes.index') }}">Clientes</a>
            <span class="nav-separator mx-2">|</span>
            <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">Produtos</a>
            <span class="nav-separator mx-2">|</span>
            <a class="nav-link {{ request()->is('orders*') ? 'active' : '' }}" href="{{ route('orders.index') }}">Pedidos</a>
        </div>
    </div>
</nav>

<style>
    .nav-separator {
        color: white;
        align-self: center;
    }
</style>
