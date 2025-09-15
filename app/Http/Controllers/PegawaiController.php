<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // List semua pegawai
    public function index() {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    // Form tambah pegawai
    public function create() {
        return view('pegawai.create');
    }

    // Simpan pegawai baru
    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik_ktp' => 'required|string|unique:pegawai',
            'no_kk' => 'nullable|string',
            'no_bpjs' => 'nullable|string',
            'no_jmo' => 'nullable|string',
            'no_npwp' => 'nullable|string',
            'badge_id' => 'required|string|unique:pegawai',
            'role' => 'required|string',
            'dokumen' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/dokumen'), $filename);
            $validated['dokumen'] = $filename;
        }

        Pegawai::create($validated);

        return redirect()->route('pegawai.index')->with('success','Pegawai berhasil ditambahkan');
    }

    // Form edit pegawai
    public function edit(Pegawai $pegawai) {
        return view('pegawai.edit', compact('pegawai'));
    }

    // Update data pegawai
    public function update(Request $request, Pegawai $pegawai) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik_ktp' => 'required|string|unique:pegawai,nik_ktp,'.$pegawai->id_pegawai.',id_pegawai',
            'no_kk' => 'nullable|string',
            'no_bpjs' => 'nullable|string',
            'no_jmo' => 'nullable|string',
            'no_npwp' => 'nullable|string',
            'badge_id' => 'required|string|unique:pegawai,badge_id,'.$pegawai->id_pegawai.',id_pegawai',
            'role' => 'required|string',
            'dokumen' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/dokumen'), $filename);
            $validated['dokumen'] = $filename;
        }

        $pegawai->update($validated);

        return redirect()->route('pegawai.index')->with('success','Pegawai berhasil diperbarui');
    }

    // Hapus pegawai
    public function destroy(Pegawai $pegawai) {
        if ($pegawai->dokumen && file_exists(public_path('uploads/dokumen/'.$pegawai->dokumen))) {
            unlink(public_path('uploads/dokumen/'.$pegawai->dokumen));
        }
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success','Pegawai berhasil dihapus');
    }
}
