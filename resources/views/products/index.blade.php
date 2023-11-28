@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Product List</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Price</th>
                <th>Count</th>
                <th>Description</th>
                <th>SKU</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->count }}</td>
                    <td>{{ $product->desc }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
