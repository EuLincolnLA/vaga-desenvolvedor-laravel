<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clientes',
            'data_nascimento' => 'required|date',
            'senha' => 'required|string|min:8',
        ]);
    
        Cliente::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'senha' => Hash::make($request->senha),
        ]);
    
        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        // Validação ao atualizar o cliente
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clientes,email,' . $cliente->id,
            'telefone' => 'nullable|string|max:15',
            'data_nascimento' => 'required|date',
            'senha' => 'nullable|string|min:8', // Senha opcional na atualização
        ]);

        // Atualização dos dados do cliente e criptografia da senha se fornecida
        $dados = $request->only(['nome', 'email', 'telefone', 'data_nascimento']);

        if ($request->filled('senha')) {
            $dados['senha'] = Hash::make($request->senha);
        }

        $cliente->update($dados);

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente deletado com sucesso.');
    }
}
