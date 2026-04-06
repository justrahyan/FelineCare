@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.riwayat.index') }}" class="inline-flex items-center gap-2 text-emerald-600 font-bold mb-4 hover:gap-3 transition-all cursor-pointer group">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="group-hover:-translate-x-1 transition-transform"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4 4m-4-4l4-4"/></svg>
            Kembali ke Riwayat
        </a>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Detail Konsultasi</h1>
        <p class="text-slate-500 mt-1">Informasi lengkap hasil diagnosa pengguna.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100">
                <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Data Pasien</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-slate-400">Nama Pemilik</p>
                        <p class="font-bold text-slate-800">{{ $konsultasi->nama_pemilik }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Nama Kucing</p>
                        <p class="font-bold text-emerald-600 uppercase">{{ $konsultasi->nama_kucing }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Tanggal Diagnosa</p>
                        <p class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($konsultasi->tanggal)->format('d F Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-emerald-600 p-6 rounded-[2rem] shadow-lg shadow-emerald-100 text-white text-center">
                <h3 class="text-[10px] font-black opacity-70 uppercase tracking-widest mb-2">Hasil Akhir</h3>
                <p class="text-xl font-black leading-tight mb-2">{{ $konsultasi->hasil_diagnosa }}</p>
                <div class="inline-block bg-white/20 px-4 py-1 rounded-full text-sm font-bold">
                    Kepastian: {{ number_format($konsultasi->nilai_cf, 2) }}%
                </div>
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-50 bg-slate-50/50">
                    <h3 class="text-sm font-black text-slate-800 uppercase tracking-widest">Gejala yang Terpilih</h3>
                </div>
                <div class="p-6">
                    <ul class="space-y-3">
                        @foreach($konsultasi->detail_konsultasi as $detail)
                        <li class="flex items-start gap-3 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <span class="bg-emerald-100 text-emerald-600 p-1 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            </span>
                            <div>
                                <p class="text-sm font-bold text-slate-800 leading-tight">{{ $detail->gejala->nama_gejala }}</p>
                                <p class="text-[10px] text-slate-400 font-black uppercase mt-1">{{ $detail->gejala->kode_gejala }} | {{ $detail->gejala->kategori }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection