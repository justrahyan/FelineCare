@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto px-4">
    <div class="mb-8">
        <a href="{{ route('admin.rules.index') }}" class="inline-flex items-center gap-2 text-emerald-600 font-bold mb-4 hover:gap-3 transition-all cursor-pointer group">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="group-hover:-translate-x-1 transition-transform"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4 4m-4-4l4-4"/></svg>
            Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Tambah Aturan Sekaligus</h1>
        <p class="text-slate-500">Pilih satu penyakit dan tentukan tingkat keyakinan untuk setiap gejala terkait.</p>
    </div>

    <form action="{{ route('admin.rules.store') }}" method="POST">
        @csrf
        <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
            <div class="max-w-md mb-8">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">1. Pilih Penyakit Utama</label>
                <select name="id_penyakit" required class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200 cursor-pointer text-sm font-bold">
                    <option value="" disabled selected>Pilih Penyakit</option>
                    @foreach($penyakit as $p)
                        <option value="{{ $p->id_penyakit }}">{{ $p->kode_penyakit }} - {{ $p->nama_penyakit }}</option>
                    @endforeach
                </select>
            </div>

            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4 ml-1">2. Tandai Gejala & Pilih Tingkat Keyakinan (MB)</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-h-[500px] overflow-y-auto p-2 custom-scrollbar">
                @foreach($gejala as $g)
                <div class="relative flex flex-col p-5 rounded-2xl border-2 border-slate-50 bg-slate-50/50 hover:bg-white hover:border-emerald-500 transition-all group">
                    <div class="flex items-start gap-3 mb-4">
                        <input type="checkbox" name="gejala[]" value="{{ $g->id_gejala }}" class="mt-1 w-5 h-5 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 cursor-pointer">
                        <div>
                            <span class="block text-[9px] font-black text-emerald-500 uppercase leading-none mb-1">{{ $g->kode_gejala }}</span>
                            <span class="text-sm font-bold text-slate-700 leading-tight">{{ $g->nama_gejala }}</span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-slate-400 ml-1">Tingkat Keyakinan Pakar</label>
                        <select name="mb_{{ $g->id_gejala }}" class="w-full px-3 py-2 rounded-xl border border-slate-100 bg-white text-xs font-bold text-slate-600 outline-none focus:border-emerald-500 cursor-pointer">
                            <option value="1.0">Pasti Ya (1.0)</option>
                            <option value="0.9">Sangat Yakin (0.9)</option>
                            <option value="0.8">Hampir Pasti Ya (0.8)</option>
                            <option value="0.7">Sangat Mungkin (0.7)</option>
                            <option value="0.6" selected>Kemungkinan Besar Ya (0.6)</option>
                            <option value="0.4">Mungkin Ya (0.4)</option>
                            <option value="0.3">Sedikit Mungkin (0.3)</option>
                            <option value="0.2">Hampir Mungkin (0.2)</option>
                            <option value="0.1">Sangat Sedikit Mungkin (0.1)</option>
                            <option value="0.0">Tidak (0.0)</option>
                        </select>
                        <input type="hidden" name="md_{{ $g->id_gejala }}" value="0">
                    </div>
                </div>
                @endforeach
            </div>

            <button type="submit" class="w-full mt-8 bg-emerald-600 text-white py-5 rounded-2xl font-black text-lg hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-100 active:scale-[0.98] cursor-pointer">
                Simpan Aturan Pengetahuan
            </button>
        </div>
    </form>
</div>
@endsection