@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Barang Masuk</h2>
    <form action="{{ route('barang_masuk.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Barang</label>
            <select name="id_barang" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barang as $b)
                    <option value="{{ $b->id_barang }}">{{ $b->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Penerima</label>
            <select name="diterima_oleh" class="form-control" required>
                <option value="">-- Pilih Pegawai --</option>
                @foreach($pegawai as $p)
                    <option value="{{ $p->id_pegawai }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('barang_masuk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
