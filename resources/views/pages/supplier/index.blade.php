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
                    <td>Product</td>
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
                            [{{ $item->products->count() }}]
                            <a href="{{ url('supplier/'. $item->id . '/product') }}" class="btn btn-secondary btn-sm ms-2"> Tambah/Lihat Product</a>
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('supplier.edit', $item->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                            <form action="{{ route('supplier.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier?')">Delete</button>
                            </form>
                            
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