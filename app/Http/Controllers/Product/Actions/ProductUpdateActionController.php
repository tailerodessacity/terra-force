<?php

namespace App\Http\Controllers\Product\Actions;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductUpdateActionController extends Controller
{
    public function __invoke(UpdateProductRequest $request, Product $product)
    {
        try {

            $validatedData = $request->validated();

            $product->update($validatedData);

            return redirect()->route('product.index')
                ->with('success', 'Product updated successfully.');

        } catch (\Exception $e) {

            \Log::error('Error updated product: ' . $e->getMessage(), ['product' => $product]);

            return redirect()->back()
                ->with('error', 'Failed to updated product. Please try again.')
                ->withInput();
        }
    }
}
