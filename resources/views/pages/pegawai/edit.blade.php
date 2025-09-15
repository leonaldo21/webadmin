@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pegawai</h2>
    <form action="{{ route('pegawai.update',$pegawai->id_pegawai) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('pegawai.form', ['pegawai' => $pegawai])
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
