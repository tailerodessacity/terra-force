<?php

namespace App\Http\Controllers\Product\Actions;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;

class ProductStoreActionController extends Controller
{
    public function __invoke(CreateProductRequest $request)
    {
        try {
            $validatedData = $request->validated();

            Product::create($validatedData);

            return redirect()->route('product.index')
                ->with('success', 'Product created successfully.');

        } catch (\Exception $e) {

            \Log::error('Error creating product: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Failed to create product. Please try again.')
                ->withInput();
        }
    }
}
