<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;

class TimesheetController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('pegawai')->orderBy('tanggal','desc')->get();
        return view('timesheet', compact('absensi'));
    }
}
