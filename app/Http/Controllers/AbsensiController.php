<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index() {
        $absensi = Absensi::with('pegawai')->orderBy('tanggal', 'desc')->get();
        return view('absensi.index', compact('absensi'));
    }

    public function create() {
        $pegawai = Pegawai::all();
        return view('absensi.create', compact('pegawai'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required|after:jam_masuk',
            'status' => 'required',
        ]);

        $totalJam = (strtotime($request->jam_keluar) - strtotime($request->jam_masuk)) / 3600;

        Absensi::create([
            'id_pegawai' => $request->id_pegawai,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'total_jam' => $totalJam,
            'status' => $request->status,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil ditambahkan.');
    }

    public function edit(Absensi $absensi) {
        $pegawai = Pegawai::all();
        return view('absensi.edit', compact('absensi', 'pegawai'));
    }

    public function update(Request $request, Absensi $absensi) {
        $request->validate([
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required|after:jam_masuk',
            'status' => 'required',
        ]);

        $totalJam = (strtotime($request->jam_keluar) - strtotime($request->jam_masuk)) / 3600;

        $absensi->update([
            'id_pegawai' => $request->id_pegawai,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'total_jam' => $totalJam,
            'status' => $request->status,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui.');
    }

    public function destroy(Absensi $absensi) {
        $absensi->delete();
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
