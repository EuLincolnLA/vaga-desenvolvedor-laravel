@extends('layouts.app')
@section('title', 'Lista de Clientes')
@section('content')
<div class="container mt-4">

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Lista de Clientes
                        <a href="{{ route('clientes.create') }}" class="btn btn-primary float-end">Adicionar Cliente</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Data Nascimento</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($clientes->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Nenhum cliente encontrado</td>
                                </tr>
                            @else
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id }}</td>
                                        <td>{{ $cliente->nome }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}</td>
                                        <td>
                                            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-secondary btn-sm"><i class="bi bi-eye-fill"></i>&nbsp;
                                            Visualizar</a>
                                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i>&nbsp;
                                            Editar</a>
                                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i>&nbsp;Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
@endsection

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
@endsection
