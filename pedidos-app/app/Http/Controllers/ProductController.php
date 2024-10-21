<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Stock;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
    ]);

    $product = Product::create($request->only(['name', 'price']));

    Stock::create([
        'product_id' => $product->id,
        'quantity' => $request->quantity,
    ]);

    return redirect()->route('products.index')->with('success', 'Produto criado com sucesso.');
}

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
    ]);

    $product->update($request->only(['name', 'price']));

    $product->stock()->update(['quantity' => $request->quantity]);

    return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso.');
}


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto removido com sucesso.');
    }
}
