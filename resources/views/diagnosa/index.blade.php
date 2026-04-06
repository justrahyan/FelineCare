@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-2 md:px-0 mt-8 md:mt-16">
    <div class="mb-8 text-center md:text-left">
        <h1 class="text-2xl md:text-4xl font-black text-slate-800 tracking-tight">Konsultasi Kesehatan 🐾</h1>
        <p class="text-slate-500 mt-2 text-sm md:text-base font-medium">Lengkapi data dan pilih gejala yang dialami kucing Anda.</p>
    </div>

    <form action="{{ route('diagnosa.hitung') }}" method="POST" class="space-y-6 md:space-y-10">
        @csrf
        <div class="bg-white p-6 md:p-10 rounded-[2rem] md:rounded-[3rem] shadow-sm border border-emerald-100">
            <h2 class="text-xl md:text-2xl font-black text-slate-800 mb-8 flex items-center gap-3">
                <span class="bg-emerald-600 text-white w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold shadow-lg shadow-emerald-100">1</span>
                Identitas Pasien
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                <div class="space-y-3">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" required placeholder="Contoh: Rahyan" 
                           class="w-full px-6 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200 font-bold text-sm md:text-base">
                </div>
                <div class="space-y-3">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Kucing</label>
                    <input type="text" name="nama_kucing" required placeholder="Contoh: Molly" 
                           class="w-full px-6 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200 font-bold text-sm md:text-base">
                </div>
            </div>
        </div>

        <div class="bg-white p-6 md:p-10 rounded-[2.5rem] md:rounded-[3.5rem] shadow-sm border border-emerald-100">
            <h2 class="text-xl md:text-2xl font-black text-slate-800 mb-2 flex items-center gap-3">
                <span class="bg-emerald-600 text-white w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold shadow-lg shadow-emerald-100">2</span>
                Daftar Gejala
            </h2>
            <p class="text-xs md:text-sm font-medium text-slate-400 mb-8 md:ml-11 italic">Pilih satu atau lebih gejala yang terlihat pada kucing Anda.</p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
                @foreach($gejalas as $g)
                <label class="flex items-center p-4 md:p-5 border-2 border-slate-50 bg-slate-50/50 rounded-2xl md:rounded-[1.5rem] cursor-pointer hover:bg-white hover:border-emerald-500 transition-all duration-300 group">
                    <input type="checkbox" name="gejala[]" value="{{ $g->id_gejala }}" class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 rounded-lg border-slate-300 focus:ring-emerald-500 transition cursor-pointer">
                    <div class="ml-4">
                        <span class="block text-[9px] md:text-[10px] font-black text-emerald-600 uppercase tracking-tighter">{{ $g->kode_gejala }}</span>
                        <span class="text-sm md:text-base text-slate-700 font-bold leading-tight group-hover:text-emerald-700">{{ $g->nama_gejala }}</span>
                    </div>
                </label>
                @endforeach
            </div>
            
            <button type="submit" class="w-full mt-10 bg-emerald-600 text-white py-5 md:py-6 rounded-[1.5rem] md:rounded-[2rem] font-black text-lg md:text-xl hover:bg-emerald-700 shadow-xl shadow-emerald-100 active:scale-[0.98] transition-all cursor-pointer">
                Mulai Analisis Sekarang
            </button>
        </div>
    </form>
</div>
@endsection