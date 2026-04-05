@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto text-center py-12">
    <h1 class="text-4xl font-black tracking-tight sm:text-6xl text-indigo-600">
        Selamat Datang di FelineCare
    </h1>
    <p class="mt-6 text-lg leading-8 text-slate-600">
        Sistem Pakar Diagnosa Penyakit Kucing dengan Metode Forward Chaining & Certainty Factor.
    </p>
    <div class="mt-10 flex items-center justify-center gap-x-6">
        <a href="#" class="rounded-md bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 transition-all">
            Mulai Konsultasi
        </a>
    </div>
</div>
@endsection