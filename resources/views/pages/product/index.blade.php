@extends('layouts.app')

@section('body')
<h3 class="fw-bold fs-4 my-3">Product List dari Supplier <span class="text-primary fw-bold">{{ $supplier->name }}</span></h3>
<div class="row"> 
    <div class="col-8">
        <table class="table table-striped">
            <thead>
                <tr class="highlight">
                    <th>No</th>
                    <td>Nama</td>
                    <td>Stok</td>
                    <td>Harga</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $item) 
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#updateModal{{ $item->id }}" class="btn btn-primary btn-sm">Edit</a> 
                            <a href="{{ url('supplier/product/'. $item->id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a> 
                    </tr>
                @empty 
                    <tr>
                        -
                    </tr> 
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="col-4 bg-gray">
        <h3 class="fw-bold fs-4 my-3">Form untuk menambah product</span></h3>
        <form action="{{ url('supplier/'. $supplier->id .'/product') }}" method="POST">
            @csrf
            {{-- <input type="hidden" name="supplier_id" value="{{ $supplier->id }}"> --}}
            <div class="mb-3">
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@foreach ($products as $item) 
<div class="modal fade" id="updateModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModalTitle">Ubah Data</h5>          
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
        </div>
        <div class="modal-body">
            <form action="{{ route('supplier.product.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
                </div>
                <div class="mb-3">
                  <label for="stock" class="form-label">Stock</label>
                  <input type="number" class="form-control" id="stock" name="stock" value="{{ $item->stock }}" required>
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
              </form>
        </div>
    </div>
</div>
</div>

@endforeach


<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('supplier.product.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')  <div class="mb-3">
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $item->stock }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  
@endsection