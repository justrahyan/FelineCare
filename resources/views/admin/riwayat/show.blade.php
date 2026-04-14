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

            <div class="bg-white p-2 rounded-[2.2rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-4 pb-2">
                    <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-2">Hasil Analisis</h3>
                </div>
                <div class="p-2 space-y-2">
                    @php
                        // Memecah string hasil_diagnosa berdasarkan koma
                        $all_results = explode(',', $konsultasi->hasil_diagnosa);
                    @endphp

                    @foreach($all_results as $index => $res)
                        @php $isFirst = $index === 0; @endphp
                        <div class="{{ $isFirst ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100' : 'bg-slate-50 text-slate-600 border border-slate-100' }} p-5 rounded-[1.8rem] transition-all">
                            <div class="flex justify-between items-start mb-1">
                                <span class="text-[9px] font-black uppercase tracking-[0.15em] {{ $isFirst ? 'opacity-70' : 'text-slate-400' }}">
                                    {{ $isFirst ? 'Rekomendasi Utama' : 'Kemungkinan Lain' }}
                                </span>
                                @if($isFirst)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path fill="currentColor" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z"/></svg>
                                @endif
                            </div>
                            <p class="text-sm {{ $isFirst ? 'text-lg font-black' : 'font-bold' }} leading-tight">
                                {{ trim($res) }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-50 bg-slate-50/50 flex justify-between items-center">
                    <h3 class="text-sm font-black text-slate-800 uppercase tracking-widest">Gejala yang Terpilih</h3>
                    <span class="bg-slate-200 text-slate-600 text-[10px] font-black px-3 py-1 rounded-full uppercase">
                        {{ $konsultasi->detail_konsultasi->count() }} Gejala
                    </span>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach($konsultasi->detail_konsultasi as $detail)
                        <div class="flex items-start gap-3 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="bg-emerald-100 text-emerald-600 p-1.5 rounded-xl shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-800 leading-tight">{{ $detail->gejala->nama_gejala }}</p>
                                <p class="text-[9px] text-slate-400 font-black uppercase mt-1 tracking-tighter">
                                    {{ $detail->gejala->kode_gejala }} • {{ $detail->gejala->kategori }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection