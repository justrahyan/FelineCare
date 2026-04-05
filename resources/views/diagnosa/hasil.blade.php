@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-slate-800">Hasil Diagnosa FelineCare</h2>
        <a href="{{ route('diagnosa.index') }}" class="text-indigo-600 hover:underline">← Konsultasi Ulang</a>
    </div>

    @if(count($hasilDiagnosa) > 0)
        <div class="space-y-6">
            @foreach($hasilDiagnosa as $index => $h)
            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 {{ $index == 0 ? 'border-indigo-600' : 'border-slate-300' }}">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800">{{ $h['nama'] }}</h3>
                        <p class="text-sm text-slate-500 mt-1 italic">{{ $h['deskripsi'] }}</p>
                    </div>
                    <div class="text-right">
                        <span class="text-2xl font-black text-indigo-600">{{ number_format($h['skor'], 2) }}%</span>
                        <p class="text-xs text-slate-400 uppercase tracking-widest font-bold">Kepastian</p>
                    </div>
                </div>

                <div class="bg-indigo-50 p-4 rounded-lg">
                    <h4 class="font-bold text-indigo-800 text-sm uppercase mb-2">Saran & Solusi:</h4>
                    <p class="text-slate-700 leading-relaxed">{{ $h['solusi'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="bg-yellow-50 border border-yellow-200 p-8 rounded-xl text-center">
            <p class="text-yellow-700 font-medium">Maaf, sistem tidak menemukan penyakit yang sesuai dengan gejala yang Anda pilih.</p>
        </div>
    @endif
</div>
@endsection