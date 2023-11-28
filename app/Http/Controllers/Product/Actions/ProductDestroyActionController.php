<?php

namespace App\Http\Controllers\Product\Actions;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductDestroyActionController extends Controller
{
    public function __invoke(Product $product)
    {
        try {
            $product->deleteOrFail();

            return redirect()->route('product.index')
                ->with('success', 'Product deleted successfully.');

        } catch (\Exception $e) {

            \Log::error('Error delete product: ' . $e->getMessage(), ['product' => $product]);

            return redirect()->back()
                ->with('error', 'Failed to delete product. Please try again.')
                ->withInput();
        }

    }
}
