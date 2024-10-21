@extends('layouts.app')
@section('title', 'Lista de pedidos')
@section('content')
<div class="container">
    <h1>Pedidos de Compra</h1>
    
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Criar Novo Pedido</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Status</th>
                <th>Quantidade de Produtos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->client->name }}</td> <!-- Ajuste o campo 'name' conforme seu modelo Client -->
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->products->sum('quantity') }}</td> <!-- Soma a quantidade de produtos no pedido -->
                    <td>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este pedido?');">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
