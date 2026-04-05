@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <form action="{{ route('diagnosa.hitung') }}" method="POST" class="space-y-8">
        @csrf
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-emerald-100">
            <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                <span class="bg-emerald-600 text-white w-8 h-8 rounded-full flex items-center justify-center text-sm">1</span>
                Identitas Pasien
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" required placeholder="Contoh: Muhammad Rahyan" 
                           class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-emerald-500 focus:outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Kucing (Anabul)</label>
                    <input type="text" name="nama_kucing" required placeholder="Contoh: Molly" 
                           class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-emerald-500 focus:outline-none transition">
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-sm border border-emerald-100">
            <h2 class="text-2xl font-bold text-slate-800 mb-2 flex items-center gap-2">
                <span class="bg-emerald-600 text-white w-8 h-8 rounded-full flex items-center justify-center text-sm">2</span>
                Daftar Gejala
            </h2>
            <p class="text-slate-500 mb-6 ml-10">Pilih gejala yang terlihat pada kucing Anda saat ini.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($gejalas as $g)
                <label for="g{{ $g->id_gejala }}" class="group relative flex items-center p-4 border-2 border-slate-50 rounded-2xl cursor-pointer hover:bg-emerald-50 hover:border-emerald-200 transition-all">
                    <input type="checkbox" name="gejala[]" value="{{ $g->id_gejala }}" id="g{{ $g->id_gejala }}" 
                           class="w-6 h-6 text-emerald-600 border-slate-300 rounded focus:ring-emerald-500">
                    <div class="ml-4">
                        <span class="block text-xs font-black text-emerald-600 uppercase tracking-widest">{{ $g->kode_gejala }}</span>
                        <span class="text-slate-700 font-semibold leading-tight">{{ $g->nama_gejala }}</span>
                    </div>
                </label>
                @endforeach
            </div>
            
            <button type="submit" class="w-full mt-10 bg-emerald-600 text-white py-5 rounded-2xl font-bold text-xl hover:bg-emerald-700 hover:shadow-xl hover:-translate-y-1 transition-all">
                Analisis Kesehatan Sekarang
            </button>
        </div>
    </form>
</div>
@endsection