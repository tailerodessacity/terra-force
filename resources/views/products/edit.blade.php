@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Product</h2>
        <form action="{{ route('product.update', $product->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" class="form-control" value="{{ $product->price }}" required>
            </div>

            <div class="form-group">
                <label for="count">Count:</label>
                <input type="text" name="count" class="form-control" value="{{ $product->count }}" required>
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea name="desc" class="form-control" required>{{ $product->desc }}</textarea>
            </div>

            <div class="form-group">
                <label for="sku">SKU:</label>
                <input type="text" name="sku" class="form-control" value="{{ $product->sku }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
