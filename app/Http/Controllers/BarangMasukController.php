<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index() {
        $barang_masuk = BarangMasuk::with(['barang', 'penerima'])
            ->orderBy('tanggal_masuk', 'desc')
            ->paginate(10);

        return view('pages.barangmasuk.index', compact('barang_masuk'));
    }

    public function create() {
        $barang = Barang::all();
        $pegawai = Pegawai::all();
        return view('pages.barangmasuk.create', compact('barang', 'pegawai'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'diterima_oleh' => 'required'
        ]);

        BarangMasuk::create($request->all());

        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk berhasil ditambahkan');
    }

    public function edit($id) {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barang = Barang::all();
        $pegawai = Pegawai::all();
        return view('pages.barangmasuk.edit', compact('barangMasuk', 'barang', 'pegawai'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'diterima_oleh' => 'required'
        ]);

        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->update($request->all());

        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk berhasil diupdate');
    }

    public function destroy($id) {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->delete();
        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk berhasil dihapus');
    }
}
