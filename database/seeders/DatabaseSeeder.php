<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\BasisPengetahuan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Data Gejala
        $gejalas = [
            ['G01', 'Demam Tinggi (>39.5°C)', 'Umum'],
            ['G02', 'Lesu dan Lemas', 'Umum'],
            ['G03', 'Penurunan Nafsu Makan (Anoreksia)', 'Umum'],
            ['G04', 'Penurunan Berat Badan Drastis', 'Umum'],
            ['G05', 'Dehidrasi', 'Umum'],
            ['G06', 'Bersin-bersin', 'Pernapasan'],
            ['G07', 'Mata Berair / Belekan', 'Pernapasan'],
            ['G08', 'Keluar Ingus Kental (Ingusan)', 'Pernapasan'],
            ['G09', 'Sariawan atau Luka di Lidah/Mulut', 'Pernapasan'],
            ['G10', 'Air Liur Berlebihan (Hipersalivasi)', 'Pernapasan'],
            ['G11', 'Sesak Napas / Batuk', 'Pernapasan'],
            ['G12', 'Muntah', 'Pencernaan'],
            ['G13', 'Diare Encer', 'Pencernaan'],
            ['G14', 'Diare Berdarah dan Berbau Amis', 'Pencernaan'],
            ['G15', 'Perut Membesar (Busung/Asites)', 'Pencernaan'],
            ['G16', 'Gatal-gatal Hebat (Sering Menggaruk)', 'Kulit'],
            ['G17', 'Bulu Rontok / Kebotakan (Alopecia)', 'Kulit'],
            ['G18', 'Muncul Kerak/Keropeng pada Kulit', 'Kulit'],
            ['G19', 'Kulit Memerah dan Meradang', 'Kulit'],
            ['G20', 'Muncul Bintik Merah/Luka Lecet', 'Kulit'],
            ['G21', 'Cairan di Telinga', 'Telinga'],
            ['G22', 'Sering Menggelengkan Kepala', 'Telinga'],
            ['G23', 'Bau Busuk dari Telinga', 'Telinga'],
            ['G24', 'Mata Merah dan Bengkak', 'Mata'],
            ['G25', 'Selaput Mata (Third Eyelid) Menutup', 'Mata'],
        ];

        foreach ($gejalas as $g) {
            Gejala::create(['kode_gejala' => $g[0], 'nama_gejala' => $g[1], 'kategori' => $g[2]]);
        }

        // 2. Data Penyakit
        $penyakits = [
            ['P01', 'Feline Infectious Peritonitis (FIP)', 'Penyakit virus mematikan, sering ada cairan di perut.', 'Konsultasi dokter segera, terapi suportif.'],
            ['P02', 'Feline Panleukopenia (FPV)', 'Parvo kucing, sangat menular, menyerang pencernaan.', 'Isolasi ketat, infus cairan, antibiotik sekunder.'],
            ['P03', 'Feline Calicivirus (FCV)', 'Flu kucing dengan ciri khas sariawan mulut.', 'Pembersihan mulut, makanan lunak, antiviral.'],
            ['P04', 'Feline Viral Rhinotracheitis (FVR)', 'Flu kucing akibat Herpesvirus, menyerang mata/napas.', 'L-Lysine, obat tetes mata, nebulisasi.'],
            ['P05', 'Scabies / Kudis', 'Infeksi tungau kulit, sangat gatal dan menular.', 'Injeksi ivermectin (oleh drh), salep belerang.'],
            ['P06', 'Ringworm (Jamur)', 'Infeksi jamur, pola rontok melingkar.', 'Obat antijamur oral, sampo ketoconazole.'],
            ['P07', 'Otitis External (Ear Mites)', 'Infeksi tungau di lubang telinga.', 'Pembersihan telinga, obat tetes telinga anti-tungau.'],
            ['P08', 'Helminthiasis (Cacingan)', 'Infeksi cacing usus, perut buncit tapi badan kurus.', 'Pemberian obat cacing (Drontal/Combantrin) rutin.'],
            ['P09', 'Feline Chlamydiosis', 'Infeksi bakteri pada mata dan napas.', 'Antibiotik tetrasiklin, salep mata eritromisin.'],
            ['P10', 'Ektoparasit (Kutu/Pinjal)', 'Infeksi parasit luar penyebab gatal.', 'Obat tetes tengkuk (Spot-on), sisir kutu.'],
            ['P11', 'Enteritis (Radang Usus)', 'Peradangan pencernaan akibat bakteri/makanan.', 'Diet ketat, probiotik, kaolin-pektin.'],
            ['P12', 'Rabies', 'Penyakit virus saraf berbahaya.', 'Euthanasia (prosedur medis), vaksinasi pencegahan.'],
            ['P13', 'Gastritis (Radang Perut)', 'Gangguan lambung penyebab muntah.', 'Puasa makan 12 jam, obat pelindung lambung.'],
            ['P14', 'Conjunctivitis', 'Peradangan selaput lendir mata.', 'Tetes mata antibiotik, kompres air hangat.'],
        ];

        foreach ($penyakits as $p) {
            Penyakit::create(['kode_penyakit' => $p[0], 'nama_penyakit' => $p[1], 'deskripsi' => $p[2], 'solusi' => $p[3]]);
        }

        // 3. Basis Pengetahuan / Rule Base
        $rules = [
            ['P01', 'G01', 0.6, 0.4], ['P01', 'G02', 0.6, 0.4], ['P01', 'G04', 0.6, 0.4], ['P01', 'G15', 0.6, 0.4],
            ['P02', 'G01', 1.0, 0.0], ['P02', 'G03', 1.0, 0.0], ['P02', 'G12', 1.0, 0.0], ['P02', 'G14', 1.0, 0.0],
            ['P03', 'G09', 1.0, 0.0], ['P03', 'G10', 1.0, 0.0],
            ['P04', 'G06', 1.0, 0.0], ['P04', 'G07', 1.0, 0.0], ['P04', 'G08', 1.0, 0.0], ['P04', 'G24', 1.0, 0.0], ['P04', 'G25', 1.0, 0.0],
            ['P07', 'G21', 1.0, 0.0], ['P07', 'G22', 1.0, 0.0], ['P07', 'G23', 1.0, 0.0],
            ['P14', 'G24', 1.0, 0.0], ['P14', 'G25', 1.0, 0.0],
        ];

        foreach ($rules as $r) {
            $idPenyakit = Penyakit::where('kode_penyakit', $r[0])->first()->id_penyakit;
            $idGejala = Gejala::where('kode_gejala', $r[1])->first()->id_gejala;
            BasisPengetahuan::create([
                'id_penyakit' => $idPenyakit,
                'id_gejala' => $idGejala,
                'mb' => $r[2],
                'md' => $r[3]
            ]);
        }
    }
}