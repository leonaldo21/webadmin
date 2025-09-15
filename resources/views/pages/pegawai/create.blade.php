@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pegawai</h2>
    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('pegawai.form')
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
