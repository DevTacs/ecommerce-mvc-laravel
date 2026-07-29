<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->filled('search')) {
            $products = Product::where('name', 'like', '%' . $request->search . '%')
                ->paginate(10)
                ->withQueryString();
        }else {
            $products = Product::paginate(10);
        }   
        
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

        $path = $request->file('image_url')->store('products', 'public');

        $product = Product::create([
            'image_url' => $path,
            'name' => $validated['name'],
            'stock' => $validated['stock'],
            'price' => $validated['price']
        ]);

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

        if ($request->hasFile('image_url')) {
            if ($product->image_url && Storage::disk('public')->exists($product->image_url)) {
                Storage::disk('public')->delete($product->image_url);
            }

            $validated['image_url'] = $request
                ->file('image_url')
                ->store('products', 'public');
        }

        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image_url);
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}