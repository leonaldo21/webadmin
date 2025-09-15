<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $pegawai->nama ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>NIK KTP</label>
    <input type="text" name="nik_ktp" value="{{ old('nik_ktp', $pegawai->nik_ktp ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>No KK</label>
    <input type="text" name="no_kk" value="{{ old('no_kk', $pegawai->no_kk ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>No BPJS</label>
    <input type="text" name="no_bpjs" value="{{ old('no_bpjs', $pegawai->no_bpjs ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>No JMO</label>
    <input type="text" name="no_jmo" value="{{ old('no_jmo', $pegawai->no_jmo ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>No NPWP</label>
    <input type="text" name="no_npwp" value="{{ old('no_npwp', $pegawai->no_npwp ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Badge ID</label>
    <input type="text" name="badge_id" value="{{ old('badge_id', $pegawai->badge_id ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Role</label>
    <select name="role" class="form-control">
        <option value="helper" {{ old('role', $pegawai->role ?? '')=='helper'?'selected':'' }}>Helper</option>
        <option value="supervisor" {{ old('role', $pegawai->role ?? '')=='supervisor'?'selected':'' }}>Supervisor</option>
        <option value="foreman" {{ old('role', $pegawai->role ?? '')=='foreman'?'selected':'' }}>Foreman</option>
        <option value="insulator" {{ old('role', $pegawai->role ?? '')=='insulator'?'selected':'' }}>Insulator</option>
        <option value="carpenter" {{ old('role', $pegawai->role ?? '')=='carpenter'?'selected':'' }}>Carpenter</option>
    </select>
</div>

<div class="mb-3">
    <label>Dokumen (PDF/DOC)</label>
    <input type="file" name="dokumen" class="form-control">
    @if(!empty($pegawai->dokumen))
        <small>Dokumen sekarang: <a href="{{ asset('uploads/dokumen/'.$pegawai->dokumen) }}" target="_blank">{{ $pegawai->dokumen }}</a></small>
    @endif
</div>
