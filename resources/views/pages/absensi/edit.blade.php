@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($absensi) ? 'Edit Absensi' : 'Tambah Absensi' }}</h2>
    <form method="POST" action="{{ isset($absensi) ? route('absensi.update', $absensi->id_absensi) : route('absensi.store') }}">
        @csrf
        @if(isset($absensi)) @method('PUT') @endif

        <div class="mb-3">
            <label>Pegawai</label>
            <select name="id_pegawai" class="form-control" required>
                @foreach($pegawai as $p)
                    <option value="{{ $p->id_pegawai }}" {{ (old('id_pegawai', $absensi->id_pegawai ?? '') == $p->id_pegawai) ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $absensi->tanggal ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Jam Masuk</label>
            <input type="time" name="jam_masuk" class="form-control" value="{{ old('jam_masuk', $absensi->jam_masuk ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Jam Keluar</label>
            <input type="time" name="jam_keluar" class="form-control" value="{{ old('jam_keluar', $absensi->jam_keluar ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                @foreach(['Hadir','Izin','Sakit','Alpa'] as $status)
                    <option value="{{ $status }}" {{ (old('status', $absensi->status ?? '') == $status) ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
