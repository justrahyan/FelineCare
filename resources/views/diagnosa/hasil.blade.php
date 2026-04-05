@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
        <h2 class="text-3xl font-extrabold text-slate-800">Hasil Analisis 🐾</h2>
        <a href="{{ route('diagnosa.index') }}" class="bg-white px-6 py-2 rounded-xl font-bold text-emerald-600 shadow-sm border border-emerald-100 hover:bg-emerald-50 transition">← Konsultasi Ulang</a>
    </div>

    @if(count($hasilDiagnosa) > 0)
        <div class="space-y-6">
            @foreach($hasilDiagnosa as $index => $h)
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 overflow-hidden relative">
                @if($index == 0)
                    <div class="absolute top-0 right-0 bg-emerald-600 text-white px-6 py-1 rounded-bl-2xl font-bold text-sm">
                        Rekomendasi Utama
                    </div>
                @endif

                <div class="flex flex-col md:flex-row justify-between items-start gap-6 mb-6">
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-slate-800 leading-tight">{{ $h['nama'] }}</h3>
                        <p class="text-slate-500 mt-2 text-lg">{{ $h['deskripsi'] }}</p>
                    </div>
                    <div class="bg-emerald-50 p-6 rounded-3xl text-center min-w-[140px] border border-emerald-100">
                        <span class="block text-4xl font-black text-emerald-600">{{ number_format($h['skor'], 1) }}%</span>
                        <span class="text-xs font-bold text-emerald-800 uppercase tracking-widest mt-1">Kepastian</span>
                    </div>
                </div>

                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                    <h4 class="font-bold text-slate-800 flex items-center gap-2 mb-3">
                        <span class="bg-emerald-100 p-1 rounded-lg">💡</span> Saran Tindakan:
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