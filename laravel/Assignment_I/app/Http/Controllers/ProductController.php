<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Products\ProductServiceInterface;
use App\Http\Requests\UserProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    private $productInterface;
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(ProductServiceInterface $productServiceInterface)
    {
        $this->productInterface = $productServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productInterface->getProducts();
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserProductRequest $request)
    {
        $validate = $request->validate();
        $this->productInterface->addProduct($request);
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UserProductRequest $request, Product $product)
    {
        $validate = $request->validate();
        $this->productInterface->updateProduct($request, $product);
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //$product->delete();
        $this->productInterface->deleteProduct($product);
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
