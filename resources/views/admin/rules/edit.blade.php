@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.rules.index') }}" class="inline-flex items-center gap-2 text-emerald-600 font-bold mb-4 hover:gap-3 transition-all cursor-pointer group text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="group-hover:-translate-x-1 transition-transform"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4 4m-4-4l4-4"/></svg>
            Kembali
        </a>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Edit Aturan</h1>
        <p class="text-slate-500">Ubah tingkat keyakinan gejala pada penyakit ini.</p>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
        <form action="{{ route('admin.rules.update', $rule->id_rule) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-4">
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                    <span class="text-[9px] font-black text-emerald-600 uppercase tracking-widest">{{ $rule->penyakit->kode_penyakit }}</span>
                    <p class="font-bold text-slate-800">{{ $rule->penyakit->nama_penyakit }}</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                    <span class="text-[9px] font-black text-emerald-600 uppercase tracking-widest">{{ $rule->gejala->kode_gejala }}</span>
                    <p class="font-bold text-slate-800">{{ $rule->gejala->nama_gejala }}</p>
                </div>
            </div>

            <input type="hidden" name="id_penyakit" value="{{ $rule->id_penyakit }}">
            <input type="hidden" name="id_gejala" value="{{ $rule->id_gejala }}">

            <div>
                <label class="block text-[10px] font-bold text-slate-400 mb-2 ml-1">Tingkat Keyakinan Pakar</label>
                <select name="mb" required class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition font-bold text-sm cursor-pointer">
                    <option value="1.0" {{ $rule->mb == 1.0 ? 'selected' : '' }}>Pasti Ya (1.0)</option>
                    <option value="0.8" {{ $rule->mb == 0.8 ? 'selected' : '' }}>Hampir Pasti Ya (0.8)</option>
                    <option value="0.6" {{ $rule->mb == 0.6 ? 'selected' : '' }}>Kemungkinan Besar Ya (0.6)</option>
                    <option value="0.4" {{ $rule->mb == 0.4 ? 'selected' : '' }}>Mungkin Ya (0.4)</option>
                    <option value="0.2" {{ $rule->mb == 0.2 ? 'selected' : '' }}>Hampir Mungkin (0.2)</option>
                    <option value="0.0" {{ $rule->mb == 0.0 ? 'selected' : '' }}>Tidak (0.0)</option>
                </select>
                <input type="hidden" name="md" value="0">
            </div>

            <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-2xl font-black text-lg hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-100 active:scale-[0.98] cursor-pointer">
                Perbarui Aturan
            </button>
        </form>
    </div>
</div>
@endsection