@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8 text-center md:text-left">
        <a href="{{ route('admin.gejala.index') }}" class="inline-flex items-center gap-2 text-emerald-600 font-bold mb-4 hover:gap-3 transition-all duration-300 group">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="group-hover:-translate-x-1 transition-transform"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4 4m-4-4l4-4"/></svg>
            Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Edit Gejala</h1>
        <p class="text-slate-500">Ubah informasi untuk gejala <span class="text-emerald-600 font-bold">{{ $gejala->kode_gejala }}</span>.</p>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
        <form action="{{ route('admin.gejala.update', $gejala->id_gejala) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Kode Gejala</label>
                    <input type="text" value="{{ $gejala->kode_gejala }}" readonly 
                           class="w-full px-5 py-4 rounded-2xl border-2 border-slate-100 bg-slate-50 outline-none text-slate-400 cursor-not-allowed font-bold italic">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Kategori</label>
                    <select name="kategori" required 
                            class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200 appearance-none">
                        @foreach(['Umum', 'Pernapasan', 'Pencernaan', 'Kulit', 'Saraf'] as $cat)
                            <option value="{{ $cat }}" {{ $gejala->kategori == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Gejala / Pertanyaan</label>
                <textarea name="nama_gejala" rows="3" required 
                          class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200">{{ old('nama_gejala', $gejala->nama_gejala) }}</textarea>
            </div>

            <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-100 active:scale-[0.98]">
                Perbarui Gejala
            </button>
        </form>
    </div>
</div>
@endsection