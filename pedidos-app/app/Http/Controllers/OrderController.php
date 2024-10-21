<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Cliente;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('client', 'products')->get(); // Obtém todos os pedidos com clientes e produtos
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Cliente::all(); // Obtém todos os clientes
        $products = Product::all(); // Obtém todos os produtos
        return view('orders.create', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'product_ids' => 'required|array',
            'status' => 'required|in:Em Aberto,Pago,Cancelado',
        ]);

        $order = Order::create([
            'client_id' => $request->client_id,
            'status' => $request->status,
        ]);

        $order->products()->attach($request->product_ids); // Associa os produtos ao pedido

        return redirect()->route('orders.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $clients = Cliente::all();
        $products = Product::all();
        return view('orders.edit', compact('order', 'clients', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'product_ids' => 'required|array',
            'status' => 'required|in:Em Aberto,Pago,Cancelado',
        ]);

        $order->update([
            'client_id' => $request->client_id,
            'status' => $request->status,
        ]);

        $order->products()->sync($request->product_ids);

        return redirect()->route('orders.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido excluído com sucesso!');
    }
}
