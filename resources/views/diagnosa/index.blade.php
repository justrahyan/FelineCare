@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-slate-200">
    <h2 class="text-2xl font-bold text-slate-800 mb-6">Pilih Gejala yang Dialami Kucing</h2>
    
    <form action="{{ route('diagnosa.hitung') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($gejalas as $g)
            <div class="flex items-center p-4 border rounded-lg hover:bg-indigo-50 transition">
                <input type="checkbox" name="gejala[]" value="{{ $g->id_gejala }}" id="g{{ $g->id_gejala }}" class="w-5 h-5 text-indigo-600">
                <label for="g{{ $g->id_gejala }}" class="ml-3 text-slate-700">
                    <span class="font-bold text-indigo-600">[{{ $g->kode_gejala }}]</span> {{ $g->nama_gejala }}
                </label>
            </div>
            @endforeach
        </div>
        
        <button type="submit" class="w-full mt-8 bg-indigo-600 text-white py-4 rounded-lg font-bold hover:bg-indigo-700 shadow-lg transition">
            Proses Diagnosa Sekarang
        </button>
    </form>
</div>
@endsection