@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Absensi</h2>
    <a href="{{ route('absensi.create') }}" class="btn btn-primary mb-3">+ Tambah Absensi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pegawai</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Total Jam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $a)
            <tr>
                <td>{{ $a->pegawai->nama }}</td>
                <td>{{ $a->tanggal }}</td>
                <td>{{ $a->jam_masuk }}</td>
                <td>{{ $a->jam_keluar }}</td>
                <td>{{ $a->total_jam }}</td>
                <td>{{ $a->status }}</td>
                <td>
                    <a href="{{ route('absensi.edit', $a->id_absensi) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('absensi.destroy', $a->id_absensi) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
