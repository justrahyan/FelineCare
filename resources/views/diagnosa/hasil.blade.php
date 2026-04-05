@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-2">
    <div class="mb-6 flex flex-row justify-between items-center gap-4 text-center md:text-left">
        <h2 class="text-xl md:text-3xl font-extrabold text-slate-800">Hasil Analisis 🐾</h2>
        <a href="{{ route('diagnosa.index') }}" class="w-auto bg-white px-6 py-2 rounded-xl font-bold text-emerald-600 shadow-sm border border-emerald-100">← Ulangi</a>
    </div>

    @if(count($hasilDiagnosa) > 0)
        <div class="space-y-6">
            @foreach($hasilDiagnosa as $index => $h)
            <div class="bg-white p-5 md:p-8 rounded-2xl md:rounded-3xl shadow-sm border border-slate-100 relative mb-6 overflow-hidden">
                
                @if($index == 0)
                    <div class="absolute top-0 right-0 bg-emerald-600 text-white px-3 py-1 md:px-6 md:py-1.5 rounded-bl-xl md:rounded-bl-2xl font-bold text-[10px] md:text-sm uppercase tracking-wider">
                        ⭐ Rekomendasi Utama
                    </div>
                @endif
                
                <div class="mt-4 md:mt-0 flex flex-col md:flex-row justify-between items-center md:items-start gap-4 md:gap-6">
                    <div class="flex-1 text-center md:text-left">
                        <h3 class="text-xl md:text-2xl font-bold text-slate-800 leading-tight">{{ $h['nama'] }}</h3>
                        <p class="text-sm md:text-lg text-slate-500 mt-2">{{ $h['deskripsi'] }}</p>
                    </div>
                    
                    <div class="bg-emerald-50 px-6 py-4 rounded-2xl text-center border border-emerald-100 w-full md:w-auto order-first md:order-last">
                        <span class="block text-3xl md:text-4xl font-black text-emerald-600">{{ number_format($h['skor'], 1) }}%</span>
                        <span class="text-[10px] font-bold text-emerald-800 uppercase tracking-widest">Kepastian</span>
                    </div>
                </div>

                <div class="mt-6 bg-slate-50 p-4 md:p-6 rounded-xl border border-slate-100 text-sm md:text-base text-center md:text-left">
                    <h4 class="font-bold text-slate-800 mb-2 flex items-center justify-center md:justify-start gap-2">
                        <span>💡</span> Saran Tindakan:
                    </h4>
                    <p class="text-slate-600 leading-relaxed">{{ $h['solusi'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="bg-white p-12 rounded-3xl text-center shadow-sm border border-slate-100">
            <span class="text-6xl">🧐</span>
            <h3 class="text-2xl font-bold text-slate-800 mt-6">Gejala Kurang Spesifik</h3>
            <p class="text-slate-500 mt-2">Maaf, FelineCare tidak menemukan kecocokan penyakit. Pastikan gejala yang Anda pilih sudah akurat.</p>
        </div>
    @endif
</div>
@endsection