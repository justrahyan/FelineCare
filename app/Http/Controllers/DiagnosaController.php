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
                    $cfPakar = $rule->mb - $rule->md;
                    $cfUser = 1.0;
                    $cfE = $cfPakar * $cfUser;

                    // Rumus CF Combine: CFc = CF1 + CF2 * (1 - CF1)
                    if ($matchCount == 0) {
                        $cfLama = $cfE;
                    } else {
                        $cfLama = $cfLama + ($cfE * (1 - $cfLama));
                    }
                    $matchCount++;
                }
            }

            if ($cfLama > 0) {
                $hasilDiagnosa[] = [
                    'nama' => $p->nama_penyakit,
                    'skor' => $cfLama * 100,
                    'deskripsi' => $p->deskripsi,
                    'solusi' => $p->solusi
                ];
            }
        }

        // Urutkan hasil dari skor tertinggi
        usort($hasilDiagnosa, fn($a, $b) => $b['skor'] <=> $a['skor']);

        // Simpan riwayat
        if (count($hasilDiagnosa) > 0) {
            $simpan = Konsultasi::create([
                'nama_pemilik' => $request->nama_pemilik ?? 'Guest',
                'nama_kucing' => $request->nama_kucing ?? 'Anabul',
                'tanggal' => Carbon::now(),
                'hasil_diagnosa' => $hasilDiagnosa[0]['nama'], // Ambil yang tertinggi
                'nilai_cf' => $hasilDiagnosa[0]['skor']
            ]);

            foreach ($gejalaTerpilih as $idG) {
                DetailKonsultasi::create([
                    'id_konsultasi' => $simpan->id_konsultasi,
                    'id_gejala' => $idG
                ]);
            }
        }

        return view('diagnosa.hasil', compact('hasilDiagnosa'));
    }
}