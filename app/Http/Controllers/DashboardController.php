<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Absensi;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        // Total pegawai
        $totalPegawai = Pegawai::count();

        // Pegawai per role
        $pegawaiRole = Pegawai::select('role', DB::raw('count(*) as total'))
            ->groupBy('role')
            ->pluck('total','role')
            ->toArray();

        // Barang masuk & keluar hari ini
        $barangMasukHariIni = BarangMasuk::whereDate('tanggal_masuk', $today)->count();
        $barangKeluarHariIni = BarangKeluar::whereDate('tanggal_keluar', $today)->count();

        // Total jam kerja hari ini
        $totalJamKerja = Absensi::whereDate('tanggal', $today)->sum('total_jam');

        // Rekap absensi hari ini dengan relasi pegawai
        $rekapAbsensi = Absensi::with('pegawai')
            ->whereDate('tanggal', $today)
            ->get();

        return view('dashboard', compact(
            'totalPegawai',
            'pegawaiRole',
            'barangMasukHariIni',
            'barangKeluarHariIni',
            'totalJamKerja',
            'rekapAbsensi'
        ));
    }
}
