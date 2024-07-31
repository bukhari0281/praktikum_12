<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{ 
    public function index()
    {
        $products = Product::with('supplier')->get();
        return view('products.index', compact('products'));
    } 
    public function create()
    {
        $suppliers = Supplier::all();
        return view('products.create', compact('suppliers'));
    } 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'supplier_id' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ]);
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    } 
    public function show(Product $product)
    {
        //
    } 
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
