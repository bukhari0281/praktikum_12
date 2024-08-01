<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{ 
    public function index()
    {
        $suppliers = Supplier::all();
        return view('pages.supplier.index', compact('suppliers'));
    } 
    public function create()
    {
        return view('pages.supplier.create');
    } 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);

        Supplier::create($request->all());
        return redirect()->route('pages.supplier.index')->with('success', 'Supplier created successfully.');
    } 
    public function edit(Supplier $supplier)
    {
        return view('pages.supplier.edit', compact('supplier'));
    } 
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);

        $supplier->update($request->all());
        return redirect()->route('supplier.index')->with('success', 'Supplier updated successfully.');
    } 
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);  
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Supplier deleted successfully.');
    }
}
