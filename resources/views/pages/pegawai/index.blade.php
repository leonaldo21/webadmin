@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pegawai</h2>
    <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Badge ID</th>
                <th>Role</th>
                <th>Dokumen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pegawai as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->nik_ktp }}</td>
                <td>{{ $p->badge_id }}</td>
                <td>{{ $p->role }}</td>
                <td>
                    @if($p->dokumen)
                        <a href="{{ asset('uploads/dokumen/'.$p->dokumen) }}" target="_blank">Lihat Dokumen</a>
                    @else
                        Belum ada
                    @endif
                </td>
                <td>
                    <a href="{{ route('pegawai.edit',$p->id_pegawai) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pegawai.destroy',$p->id_pegawai) }}" method="POST" style="display:inline-block">
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
