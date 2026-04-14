@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto"> <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <a href="{{ route('admin.riwayat.index') }}" class="inline-flex items-center gap-2 text-emerald-600 font-bold mb-4 hover:gap-3 transition-all cursor-pointer group">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="group-hover:-translate-x-1 transition-transform"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4 4m-4-4l4-4"/></svg>
                Kembali ke Riwayat
            </a>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Detail Konsultasi</h1>
            <p class="text-slate-500 mt-1 italic">Kasus: {{ $konsultasi->nama_kucing }} ({{ $konsultasi->nama_pemilik }})</p>
        </div>
        <div class="bg-white px-6 py-3 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest mb-1 text-center md:text-left">Waktu Diagnosa</p>
            <p class="font-bold text-slate-800 text-sm">{{ \Carbon\Carbon::parse($konsultasi->tanggal)->format('d F Y, H:i') }} WITA</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 items-start">
        <div class="lg:col-span-1 bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100">
            <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6">Profil Pasien</h3>
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-black text-xs">P</div>
                    <div>
                        <p class="text-[10px] text-slate-400 font-bold uppercase">Pemilik</p>
                        <p class="font-black text-slate-800 text-sm">{{ $konsultasi->nama_pemilik }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 font-black text-xs">K</div>
                    <div>
                        <p class="text-[10px] text-emerald-400 font-bold uppercase">Kucing</p>
                        <p class="font-black text-emerald-600 text-sm uppercase">{{ $konsultasi->nama_kucing }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-3 bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                <h3 class="text-sm font-black text-slate-800 uppercase tracking-widest">Gejala Teramati</h3>
                <span class="bg-slate-100 text-slate-600 text-[10px] font-black px-4 py-1.5 rounded-full uppercase">
                    {{ $konsultasi->detail_konsultasi->count() }} Gejala Masuk
                </span>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach($konsultasi->detail_konsultasi as $detail)
                    <div class="flex items-center gap-3 p-3.5 rounded-2xl bg-slate-50 border border-slate-100/50">
                        <div class="bg-emerald-100 text-emerald-600 p-1 rounded-lg shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-[11px] font-bold text-slate-700 leading-tight truncate">{{ $detail->gejala->nama_gejala }}</p>
                            <p class="text-[8px] text-slate-400 font-black uppercase mt-0.5 tracking-tighter">{{ $detail->gejala->kode_gejala }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <div class="flex items-center gap-4 mb-6">
            <h3 class="text-sm font-black text-slate-800 uppercase tracking-widest whitespace-nowrap">Interpretasi Hasil Algoritma</h3>
            <div class="h-px bg-slate-100 w-full"></div>
        </div>

        @php
            $all_results = explode(',', $konsultasi->hasil_diagnosa);
            $recomen = trim($all_results[0]);
            $others = array_slice($all_results, 1);
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <div class="md:col-span-5 lg:col-span-4">
                <div class="bg-emerald-600 p-8 rounded-[2.5rem] shadow-xl shadow-emerald-100 text-white relative overflow-hidden group">
                    <div class="relative z-10">
                        <div class="inline-flex items-center gap-2 bg-white/20 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path fill="currentColor" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z"/></svg>
                            Rekomendasi Utama
                        </div>
                        <h2 class="text-2xl md:text-3xl font-black leading-tight mb-2">{{ $recomen }}</h2>
                        <p class="text-emerald-100 text-sm font-medium opacity-80 italic">Diagnosa ini memiliki akumulasi bobot kepastian tertinggi berdasarkan gejala yang dipilih.</p>
                    </div>
                    <div class="absolute -right-10 -bottom-10 opacity-10 group-hover:scale-110 transition-transform duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2L4.5 20.29l.71.71L12 18l6.79 3l.71-.71L12 2z"/></svg>
                    </div>
                </div>
            </div>

            <div class="md:col-span-7 lg:col-span-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($others as $res)
                    <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                        <div class="mb-4">
                            <div class="w-2 h-2 rounded-full bg-slate-200 mb-3 group-hover:bg-emerald-400 transition-colors"></div>
                            <p class="text-sm font-bold text-slate-700 leading-snug">{{ trim($res) }}</p>
                        </div>
                        <p class="text-[9px] font-black text-slate-300 uppercase tracking-widest">Diagnosa Sekunder</p>
                    </div>
                    @empty
                    <div class="col-span-full py-12 text-center bg-slate-50 rounded-3xl border border-dashed border-slate-200">
                        <p class="text-slate-400 font-bold italic text-sm text-xs">Tidak ada kemungkinan penyakit lain yang terdeteksi.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection