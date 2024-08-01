<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $products = Product::where('supplier_id', $supplier->id)->with('supplier')->get();
        return view('pages.product.index', compact('products', 'supplier'));
    } 
    public function create()
    {
        $suppliers = Supplier::all();
        return view('pages.product.create', compact('suppliers'));
    } 
    public function store(Request $request, $supplierId)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $supplier = Supplier::findOrFail($supplierId);

        $product = new Product([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        $supplier->products()->save($product);

        return redirect()->back()->with('success', 'Product created successfully.');
        // return dd($supplier);
    } 

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id); 
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

}
