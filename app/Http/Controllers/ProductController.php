<?php

namespace App\Http\Controllers;

use App\Models\Product;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::simplePaginate(4);
        return view('product.index', [ 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string'],
            'description' => ['required','string'],
            'image_file' => ['required', 'image'],
            'stock' => ['required', 'numeric'],
            'price' => ['required', 'numeric']
        ]);

        $cloudinaryImage = $request->file('image_file')->storeOnCloudinary('products');
        $url = $cloudinaryImage->getSecurePath();

        unset($data['image_file']);
        Product::create(array_merge($data, [
            'image_url' => $url,
        ]));

        return redirect()->route('product.create')->with('status', 'product-added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
