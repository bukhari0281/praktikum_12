<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{ 
    public function index(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $products = Product::with('supplier')->get();
        return view('pages.product.index', compact('products', 'supplier'));
    } 
    public function create()
    {
        $suppliers = Supplier::all();
        return view('pages.product.create', compact('suppliers'));
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
        return redirect()->route('pages.product.index')->with('success', 'Product created successfully.');
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
