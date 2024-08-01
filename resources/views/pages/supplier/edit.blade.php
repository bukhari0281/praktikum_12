@extends('layouts.app')

@section('body')

<h3 class="fw-bold fs-4 my-3">Edit Supplier</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
    @csrf
    @method('PUT')  <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $supplier->name) }}" required>
    </div>
    <div class="mb-3">
        <label for="contact" class="form-label">Contact</label>
        <input type="text" class="form-control" id="contact" name="contact" value="{{ old('name', $supplier->contact) }}" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old('name', $supplier->address) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endSection
