@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12 py-12 px-4">
    <div class="flex-1 text-center md:text-left order-2 md:order-1">
        <span class="inline-block bg-emerald-100 text-emerald-800 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest border border-emerald-200 shadow-inner">
            🐾 Sahabat Kucing Anda
        </span>
        <h1 class="text-5xl font-extrabold tracking-tight mt-5 text-slate-800 leading-tight">
            Kenali Kondisi <span class="text-emerald-600">Anabul</span> Anda Lebih Dini.
        </h1>
        <p class="mt-6 text-xl text-slate-600 leading-relaxed font-medium">
            Diagnosa kesehatan kucing kesayangan Anda dengan teknologi sistem pakar berbasis <b>Certainty Factor</b>. Cepat, akurat, dan sangat mudah digunakan.
        </p>
        <div class="mt-10 flex flex-wrap gap-4 justify-center md:justify-start">
            <a href="{{ route('diagnosa.index') }}" 
               class="rounded-2xl bg-emerald-600 px-10 py-5 text-xl font-bold text-white shadow-lg shadow-emerald-200 hover:bg-emerald-700 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                Mulai Konsultasi Gratis
            </a>
        </div>
    </div>

    <div class="flex-1 w-full order-1 md:order-2">
        <img src="{{ asset('img/kucing.jpg') }}" 
             alt="Ilustrasi Kucing FelineCare" 
             class="w-full aspect-video md:aspect-[4/3] rounded-3xl shadow-2xl shadow-emerald-100 object-cover border-4 border-white transition-all hover:scale-[1.02]">
    </div>
</div>
@endsection