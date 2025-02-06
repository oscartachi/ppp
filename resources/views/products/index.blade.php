@extends('layouts.app')

@section('content')
    <h1>Lista de Productos - AgroClick</h1>
    <a href="{{ route('products.create') }}">Agregar Producto</a>
    <ul>
        @foreach ($products as $product)
            <li>
                {{ $product->name }} - ${{ $product->price }}
                <a href="{{ route('products.show', $product) }}">Ver</a>
                <a href="{{ route('products.edit', $product) }}">Editar</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection