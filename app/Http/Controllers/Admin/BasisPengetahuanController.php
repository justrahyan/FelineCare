<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasisPengetahuan;
use App\Models\Penyakit;
use App\Models\Gejala;
use Illuminate\Http\Request;

class BasisPengetahuanController extends Controller
{
    public function index()
    {
        // Grouping berdasarkan penyakit agar di index tidak berantakan
        $rules = Penyakit::with(['basis_pengetahuan.gejala'])->has('basis_pengetahuan')->get();
        return view('admin.rules.index', compact('rules'));
    }

    public function create()
    {
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        return view('admin.rules.create', compact('penyakit', 'gejala'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penyakit' => 'required',
            'gejala' => 'required|array',
        ]);

        foreach ($request->gejala as $id_gejala) {
            // Ambil nilai MB dari dropdown dinamis
            $mb = $request->input("mb_{$id_gejala}");
            $md = $request->input("md_{$id_gejala}") ?? 0;

            $exists = BasisPengetahuan::where('id_penyakit', $request->id_penyakit)
                ->where('id_gejala', $id_gejala)
                ->exists();

            if (!$exists) {
                BasisPengetahuan::create([
                    'id_penyakit' => $request->id_penyakit,
                    'id_gejala' => $id_gejala,
                    'mb' => $mb,
                    'md' => $md,
                ]);
            }
        }

        return redirect()->route('admin.rules.index')->with('success', 'Berhasil menambahkan basis pengetahuan!');
    }

    // Edit dan Update tetap satu-satu karena nilai MB/MD tiap gejala bisa beda di sistem pakar yang teliti.
    public function edit($id)
    {
        $rule = BasisPengetahuan::where('id_rule', $id)->firstOrFail();
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        return view('admin.rules.edit', compact('rule', 'penyakit', 'gejala'));
    }

    public function update(Request $request, $id)
    {
        $rule = BasisPengetahuan::where('id_rule', $id)->firstOrFail();
        $request->validate([
            'id_penyakit' => 'required',
            'id_gejala' => 'required',
            'mb' => 'required|numeric|between:0,1',
            'md' => 'required|numeric|between:0,1',
        ]);
        $rule->update($request->all());
        return redirect()->route('admin.rules.index')->with('success', 'Aturan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $rule = BasisPengetahuan::where('id_rule', $id)->firstOrFail();
        $rule->delete();
        return redirect()->route('admin.rules.index')->with('success', 'Aturan berhasil dihapus!');
    }
}