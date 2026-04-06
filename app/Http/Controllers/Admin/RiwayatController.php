<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        // Mengambil data konsultasi terbaru (dari tabel konsultasis)
        $riwayats = Konsultasi::latest('tanggal')->get();
        return view('admin.riwayat.index', compact('riwayats'));
    }

    public function destroy($id)
    {
        // Hapus data berdasarkan id_konsultasi (Primary Key di modelmu)
        $konsultasi = Konsultasi::where('id_konsultasi', $id)->firstOrFail();
        $konsultasi->delete();
        
        return redirect()->route('admin.riwayat.index')->with('success', 'Data riwayat konsultasi berhasil dihapus!');
    }
}