@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Barang Masuk</h2>
    <form action="{{ route('barang_masuk.update', $barangMasuk->id_barang_masuk) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Barang</label>
            <select name="id_barang" class="form-control" required>
                @foreach($barang as $b)
                    <option value="{{ $b->id_barang }}" {{ $b->id_barang == $barangMasuk->id_barang ? 'selected' : '' }}>
                        {{ $b->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $barangMasuk->jumlah }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" value="{{ $barangMasuk->tanggal_masuk }}" required>
        </div>

        <div class="mb-3">
            <label>Penerima</label>
            <select name="diterima_oleh" class="form-control" required>
                @foreach($pegawai as $p)
                    <option value="{{ $p->id_pegawai }}" {{ $p->id_pegawai == $barangMasuk->diterima_oleh ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('barang_masuk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
