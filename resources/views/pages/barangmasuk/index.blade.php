@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Barang Masuk</h2>
    <a href="{{ route('barang_masuk.create') }}" class="btn btn-primary mb-3">+ Tambah Barang Masuk</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Penerima</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang_masuk as $bm)
            <tr>
                <td>{{ $bm->id_barang_masuk }}</td>
                <td>{{ $bm->barang->nama_barang ?? '-' }}</td>
                <td>{{ $bm->jumlah }}</td>
                <td>{{ $bm->penerima->nama ?? '-' }}</td>
                <td>{{ $bm->tanggal_masuk }}</td>
                <td>
                    <a href="{{ route('barang_masuk.edit', $bm->id_barang_masuk) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('barang_masuk.destroy', $bm->id_barang_masuk) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $barang_masuk->links() }}
</div>
@endsection
