@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-2 md:px-0">
    <form action="{{ route('diagnosa.hitung') }}" method="POST" class="space-y-6 md:space-y-8">
        @csrf
        <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl shadow-sm border border-emerald-100">
            <h2 class="text-xl md:text-2xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                <span class="bg-emerald-600 text-white w-7 h-7 md:w-8 md:h-8 rounded-full flex items-center justify-center text-xs md:text-sm">1</span>
                Identitas Pasien
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700">Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" required placeholder="Contoh: Rahyan" 
                           class="w-full px-4 py-3 rounded-xl border-2 border-slate-50 focus:border-emerald-500 outline-none transition text-sm md:text-base">
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700">Nama Kucing</label>
                    <input type="text" name="nama_kucing" required placeholder="Contoh: Molly" 
                           class="w-full px-4 py-3 rounded-xl border-2 border-slate-50 focus:border-emerald-500 outline-none transition text-sm md:text-base">
                </div>
            </div>
        </div>

        <div class="bg-white p-6 md:p-8 rounded-2xl md:rounded-3xl shadow-sm border border-emerald-100">
            <h2 class="text-xl md:text-2xl font-bold text-slate-800 mb-2 flex items-center gap-2">
                <span class="bg-emerald-600 text-white w-7 h-7 md:w-8 md:h-8 rounded-full flex items-center justify-center text-xs md:text-sm">2</span>
                Daftar Gejala
            </h2>
            <p class="text-xs md:text-sm text-slate-500 mb-6 md:ml-10">Pilih gejala yang terlihat pada kucing Anda.</p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
                @foreach($gejalas as $g)
                <label class="flex items-center p-3 md:p-4 border-2 border-slate-50 rounded-xl md:rounded-2xl cursor-pointer hover:bg-emerald-50 transition-all">
                    <input type="checkbox" name="gejala[]" value="{{ $g->id_gejala }}" class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 rounded">
                    <div class="ml-3">
                        <span class="block text-[10px] font-black text-emerald-600 uppercase">{{ $g->kode_gejala }}</span>
                        <span class="text-sm md:text-base text-slate-700 font-semibold leading-tight">{{ $g->nama_gejala }}</span>
                    </div>
                </label>
                @endforeach
            </div>
            
            <button type="submit" class="w-full mt-8 md:mt-10 bg-emerald-600 text-white py-4 md:py-5 rounded-xl md:rounded-2xl font-bold text-lg md:text-xl hover:bg-emerald-700 shadow-md">
                Analisis Sekarang
            </button>
        </div>
    </form>
</div>
@endsection