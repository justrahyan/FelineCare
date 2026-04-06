@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.penyakit.index') }}" class="text-emerald-600 font-bold flex items-center gap-2 mb-2 hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4 4m-4-4l4-4"/></svg>
            Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Edit Penyakit</h1>
        <p class="text-slate-500">Ubah informasi untuk penyakit <span class="text-emerald-600 font-bold">{{ $penyakit->nama_penyakit }}</span>.</p>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
        <form action="{{ route('admin.penyakit.update', $penyakit->id_penyakit) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Kode Penyakit</label>
                    <input type="text" name="kode_penyakit" value="{{ old('kode_penyakit', $penyakit->kode_penyakit) }}" readonly 
                           class="w-full px-5 py-4 rounded-2xl border-2 border-slate-100 bg-slate-50 outline-none text-slate-400 cursor-not-allowed font-bold">
                    <p class="text-[10px] mt-1 ml-1 text-slate-400">* Kode tidak dapat diubah</p>
                </div>
                <div>
                    <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Penyakit</label>
                    <input type="text" name="nama_penyakit" value="{{ old('nama_penyakit', $penyakit->nama_penyakit) }}" required 
                           class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200">
                </div>
            </div>

            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Deskripsi</label>
                <textarea name="deskripsi" rows="3" required 
                          class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200">{{ old('deskripsi', $penyakit->deskripsi) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Solusi / Penanganan</label>
                <textarea name="solusi" rows="3" required 
                          class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200">{{ old('solusi', $penyakit->solusi) }}</textarea>
            </div>

            <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-100 active:scale-[0.98]">
                Perbarui Penyakit
            </button>
        </form>
    </div>
</div>
@endsection