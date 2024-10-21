@extends('layouts.app')
@section('title', 'Pedidos - Editar')
@section('content')
<div class="container">
    <h1>Editar Pedido de Compra</h1>

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="client_id">Cliente</label>
            <select name="client_id" id="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $order->client_id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="product_ids">Produtos</label>
            <select name="product_ids[]" id="product_ids" class="form-control" multiple required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" 
                        {{ $order->products->contains($product->id) ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Em Aberto" {{ $order->status == 'Em Aberto' ? 'selected' : '' }}>Em Aberto</option>
                <option value="Pago" {{ $order->status == 'Pago' ? 'selected' : '' }}>Pago</option>
                <option value="Cancelado" {{ $order->status == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Pedido</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
