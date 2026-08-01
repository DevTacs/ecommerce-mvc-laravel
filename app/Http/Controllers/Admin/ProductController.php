<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService) {}
    
    public function index(Request $request)
    {
        $products = $this->productService->getAllProducts($request->query('search'));
        
        return view('pages.products.admin.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.products.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_url' => ['required', 'image', 'mimes: jpg,jpeg,png,webp', 'max: 2048'],
            'name' => ['required', 'string', 'max: 255'],
            'stock' => ['required', 'integer', 'min: 0'],
            'price' => ['required', 'numeric', 'min: 0']
        ]);


        $this->productService->createProduct($request->file('image_url'), $validated);

        return redirect()->route('admin.products.index')
            ->with(['success' => 'Product created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('pages.products.admin.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
        'image_url' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        'name'      => ['required', 'string', 'max:255'],
        'stock'     => ['required', 'integer', 'min:0'],
        'price'     => ['required', 'numeric', 'min:0'],
        ]);

        $this->productService->updateProduct($product, $request->file('image_url'), $validated);
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->productService->deleteProduct($product);
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}