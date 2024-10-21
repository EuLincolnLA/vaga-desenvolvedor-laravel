@extends('layouts.app')
@section('title', 'Pedidos - Criar')
@section('content')
<div class="container">
    <h1>Criar Pedido de Compra</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="client_id">Cliente</label>
            <select name="client_id" id="client_id" class="form-control" required>
                <option value="">Selecione um cliente</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="product_ids">Produtos</label>
            <select name="product_ids[]" id="product_ids" class="form-control" multiple required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Em Aberto">Em Aberto</option>
                <option value="Pago">Pago</option>
                <option value="Cancelado">Cancelado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Criar Pedido</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
