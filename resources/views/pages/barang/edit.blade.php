@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Barang</h2>
    <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
        </div>

        <div class="mb-3">
            <label>Serial Number</label>
            <input type="text" name="serial_number" class="form-control" value="{{ $barang->serial_number }}">
        </div>

        <div class="mb-3">
            <label>Total Quantity</label>
            <input type="number" name="quantity_total" class="form-control" value="{{ $barang->quantity_total }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
