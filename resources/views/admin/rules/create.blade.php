@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.rules.index') }}" class="inline-flex items-center gap-2 text-emerald-600 font-bold mb-4 hover:gap-3 transition-all cursor-pointer group">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="group-hover:-translate-x-1 transition-transform"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4 4m-4-4l4-4"/></svg>
            Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Tambah Aturan</h1>
        <p class="text-slate-500">Hubungkan penyakit dengan gejala serta tentukan nilai keyakinannya.</p>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
        <form action="{{ route('admin.rules.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Pilih Penyakit</label>
                    <select name="id_penyakit" required class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200 cursor-pointer text-sm">
                        <option value="" disabled selected>Pilih Penyakit</option>
                        @foreach($penyakit as $p)
                            <option value="{{ $p->id_penyakit }}">{{ $p->kode_penyakit }} - {{ $p->nama_penyakit }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Pilih Gejala</label>
                    <select name="id_gejala" required class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200 cursor-pointer text-sm">
                        <option value="" disabled selected>Pilih Gejala</option>
                        @foreach($gejala as $g)
                            <option value="{{ $g->id_gejala }}">{{ $g->kode_gejala }} - {{ $g->nama_gejala }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nilai MB (0 - 1)</label>
                    <input type="number" name="mb" step="0.1" min="0" max="1" placeholder="Contoh: 0.8" required 
                           class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200 text-sm">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nilai MD (0 - 1)</label>
                    <input type="number" name="md" step="0.1" min="0" max="1" placeholder="Contoh: 0.1" required 
                           class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200 text-sm">
                </div>
            </div>

            <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-100 active:scale-[0.98] cursor-pointer">
                Simpan Aturan
            </button>
        </form>
    </div>
</div>
@endsection