@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Create Product</div>

                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" name="price" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="count">Count:</label>
                                <input type="text" name="count" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="desc">Description * (min 10 characters):</label>
                                <textarea name="desc" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="sku">SKU * (min 10 characters):</label>
                                <input type="text" name="sku" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
