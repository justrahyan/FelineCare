@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-8 md:gap-12 py-6 md:py-12 px-4">
    <div class="flex-1 w-full order-1 md:order-2">
        <img src="{{ asset('img/kucing.jpg') }}" 
             alt="Ilustrasi Kucing FelineCare" 
             class="w-full aspect-video md:aspect-[4/3] rounded-2xl md:rounded-3xl shadow-xl object-cover border-4 border-white">
    </div>

    <div class="flex-1 text-center md:text-left order-2 md:order-1">
        <span class="inline-block bg-emerald-100 text-emerald-800 px-4 py-1.5 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-widest border border-emerald-200">
            🐾 Sahabat Kucing Anda
        </span>
        <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mt-4 text-slate-800 leading-tight">
            Kenali Kondisi <span class="text-emerald-600">Anabul</span> Anda Lebih Dini.
        </h1>
        <p class="mt-4 md:mt-6 text-base md:text-xl text-slate-600 leading-relaxed font-medium">
            Diagnosa kesehatan kucing Anda dengan teknologi sistem pakar <b>Certainty Factor</b>. Cepat, akurat, dan mudah digunakan.
        </p>
        <div class="mt-8 md:mt-10">
            <a href="{{ route('diagnosa.index') }}" 
               class="inline-block w-full md:w-auto rounded-2xl bg-emerald-600 px-10 py-4 md:py-5 text-lg md:text-xl font-bold text-white shadow-lg hover:bg-emerald-700 transition-all">
                Mulai Konsultasi
            </a>
        </div>
    </div>
</div>
@endsection