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
        $this->call([
            UserSeeder::class,
        ]);

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

        // 3. Basis Pengetahuan / Rule Base (Hasil Wawancara Pakar)
        $rules = [
            // P01 (FIP)
            ['P01', 'G01', 0.7, 0.3], ['P01', 'G02', 0.8, 0.2], ['P01', 'G04', 0.7, 0.3], ['P01', 'G15', 0.7, 0.3],

            // P02 (FPV)
            ['P02', 'G01', 0.8, 0.2], ['P02', 'G03', 0.4, 0.6], ['P02', 'G12', 0.8, 0.2], ['P02', 'G14', 0.9, 0.1],

            // P03 (FCV)
            ['P03', 'G09', 0.9, 0.1], ['P03', 'G10', 0.9, 0.1],

            // P04 (FVR)
            ['P04', 'G06', 0.9, 0.1], ['P04', 'G07', 0.8, 0.2], ['P04', 'G08', 0.9, 0.1], ['P04', 'G24', 0.6, 0.4], ['P04', 'G25', 0.4, 0.6],

            // P05 (Scabies)
            ['P05', 'G16', 0.9, 0.1], ['P05', 'G18', 0.9, 0.1], ['P05', 'G19', 0.7, 0.3], ['P05', 'G20', 0.4, 0.6],

            // P06 (Ringworm)
            ['P06', 'G17', 0.9, 0.1], ['P06', 'G18', 0.9, 0.1],

            // P07 (Ear Mites)
            ['P07', 'G21', 0.9, 0.1], ['P07', 'G22', 0.9, 0.1], ['P07', 'G23', 0.9, 0.1],

            // P08 (Cacingan)
            ['P08', 'G03', 0.2, 0.8], ['P08', 'G04', 0.4, 0.6], ['P08', 'G13', 0.6, 0.4], ['P08', 'G15', 0.7, 0.3],

            // P09 (Chlamydiosis)
            ['P09', 'G01', 0.2, 0.8], ['P09', 'G03', 0.2, 0.8], ['P09', 'G24', 0.3, 0.7], ['P09', 'G25', 0.3, 0.7],

            // P10 (Kutu/Pinjal)
            ['P10', 'G16', 0.7, 0.3], ['P10', 'G17', 0.9, 0.1], ['P10', 'G19', 0.4, 0.6],

            // P11 (Enteritis)
            ['P11', 'G01', 0.2, 0.8], ['P11', 'G02', 0.2, 0.8], ['P11', 'G03', 0.2, 0.8], ['P11', 'G04', 0.6, 0.4], ['P11', 'G05', 0.9, 0.1], ['P11', 'G12', 0.1, 0.9], ['P11', 'G13', 0.9, 0.1],

            // P12 (Rabies)
            ['P12', 'G01', 0.2, 0.8], ['P12', 'G02', 0.2, 0.8], ['P12', 'G03', 0.2, 0.8], ['P12', 'G04', 0.2, 0.8], ['P12', 'G05', 0.2, 0.8], ['P12', 'G10', 0.9, 0.1],

            // P13 (Gastritis)
            ['P13', 'G03', 0.2, 0.8], ['P13', 'G12', 0.2, 0.8],

            // P14 (Conjunctivitis)
            ['P14', 'G24', 0.9, 0.1], ['P14', 'G25', 0.9, 0.1],
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