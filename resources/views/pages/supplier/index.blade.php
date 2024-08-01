@extends('layouts.app')

@section('body')
<h3 class="fw-bold fs-4 my-3">Supplier</h3>
<div class="row">
    <div class="col-8">
        <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">
            Tambah Supplier
        </a>
    </div>
    <div class="col-8">
        <table class="table table-striped">
            <thead>
                <tr class="highlight">
                    <th>No</th>
                    <td>Nama</td>
                    <td>Kontak</td>
                    <td>Alamat</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers as $item) 
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->contact }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a href="{{ route('supplier.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('supplier.destroy', $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            <a href="{{ route('product.create', $item->id) }}" class="btn btn-danger btn-sm">Tambah Product</a>
                        </td>
                    </tr>
                @empty 
                    <tr>
                        -
                    </tr> 
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection