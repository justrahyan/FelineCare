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
        $rules = BasisPengetahuan::with(['penyakit', 'gejala'])->get();
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
            'id_gejala' => 'required',
            'mb' => 'required|numeric|between:0,1',
            'md' => 'required|numeric|between:0,1',
        ]);

        BasisPengetahuan::create($request->all());
        return redirect()->route('admin.rules.index')->with('success', 'Aturan berhasil ditambahkan!');
    }

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