<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\BasisPengetahuan;
use App\Models\Konsultasi;
use App\Models\DetailKonsultasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    // Menampilkan halaman pilihan gejala
    public function index()
    {
        $gejalas = Gejala::all();
        return view('diagnosa.index', compact('gejalas'));
    }

    // Memproses diagnosa dengan Certainty Factor
    public function hitung(Request $request)
    {
        $gejalaTerpilih = $request->gejala;

        if (!$gejalaTerpilih) {
            return redirect()->back()->with('error', 'Silakan pilih minimal satu gejala!');
        }

        $hasilDiagnosa = [];
        $penyakits = Penyakit::all();

        foreach ($penyakits as $p) {
            $cfLama = 0;
            $rules = BasisPengetahuan::where('id_penyakit', $p->id_penyakit)->get();
            
            $matchCount = 0;
            foreach ($rules as $rule) {
                if (in_array($rule->id_gejala, $gejalaTerpilih)) {
                    // Menghitung CF Pakar (MB - MD)
                    $cfPakar = $rule->mb - $rule->md;
                    // Asumsi CF User adalah 1.0 (Sangat Yakin)
                    $cfUser = 1.0; 
                    $cfE = $cfPakar * $cfUser;

                    // Rumus CF Combine
                    if ($matchCount == 0) {
                        $cfLama = $cfE;
                    } else {
                        $cfLama = $cfLama + ($cfE * (1 - $cfLama));
                    }
                    $matchCount++;
                }
            }

            // Hanya masukkan jika nilai kepastian di atas 0
            if ($cfLama > 0) {
                $hasilDiagnosa[] = [
                    'nama' => $p->nama_penyakit,
                    'skor' => $cfLama * 100,
                    'deskripsi' => $p->deskripsi,
                    'solusi' => $p->solusi
                ];
            }
        }

        // 1. Urutkan hasil dari skor tertinggi ke terendah
        usort($hasilDiagnosa, fn($a, $b) => $b['skor'] <=> $a['skor']);

        // 2. Proses Simpan Riwayat jika ada hasil diagnosa
        if (count($hasilDiagnosa) > 0) {
            $daftarHasilString = "";
            foreach ($hasilDiagnosa as $h) {
                $daftarHasilString .= $h['nama'] . " (" . number_format($h['skor'], 2) . "%), ";
            }
            $daftarHasilString = rtrim($daftarHasilString, ", ");

            // Simpan ke Tabel Konsultasi
            $simpan = Konsultasi::create([
                'nama_pemilik'   => $request->nama_pemilik ?? 'Guest',
                'nama_kucing'    => $request->nama_kucing ?? 'Anabul',
                'tanggal'        => Carbon::now(),
                'hasil_diagnosa' => $daftarHasilString,       // String lengkap semua penyakit
                'nilai_cf'       => $hasilDiagnosa[0]['skor'] // Tetap simpan skor tertinggi untuk index admin
            ]);

            // Simpan Detail Gejala yang dipilih
            foreach ($gejalaTerpilih as $idG) {
                DetailKonsultasi::create([
                    'id_konsultasi' => $simpan->id_konsultasi,
                    'id_gejala'     => $idG
                ]);
            }
        }

        // 3. Tampilkan ke halaman hasil
        return view('diagnosa.hasil', compact('hasilDiagnosa'));
    }
}