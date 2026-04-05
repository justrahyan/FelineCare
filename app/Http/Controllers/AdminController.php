<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\Penyakit;
use App\Models\Gejala;

class AdminController extends Controller
{
    public function index() {
        $data = [
            'total_konsultasi' => Konsultasi::count(),
            'total_penyakit' => Penyakit::count(),
            'total_gejala' => Gejala::count(),
            'riwayat' => Konsultasi::latest()->take(5)->get()
        ];
        return view('admin.dashboard', $data);
    }
}