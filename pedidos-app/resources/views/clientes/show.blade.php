@extends('layouts.app')
@section('title', 'Clientes - Detalhes')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detalhes do Cliente
                        <a href="{{ route('clientes.index') }}" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $cliente->id }}
                    </div>
                    <div class="mb-3">
                        <strong>Nome:</strong> {{ $cliente->nome }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $cliente->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
