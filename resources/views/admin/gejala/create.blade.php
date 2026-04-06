@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8 text-center md:text-left">
        <a href="{{ route('admin.gejala.index') }}" class="inline-flex items-center gap-2 text-emerald-600 font-bold mb-4 hover:gap-3 transition-all duration-300 group">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="group-hover:-translate-x-1 transition-transform"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4 4m-4-4l4-4"/></svg>
            Kembali ke Daftar
        </a>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Tambah Gejala</h1>
        <p class="text-slate-500">Definisikan gejala klinis baru untuk sistem diagnosa.</p>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
        <form action="{{ route('admin.gejala.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Kode Gejala</label>
                    <input type="text" name="kode_gejala" value="{{ old('kode_gejala') }}" placeholder="Contoh: G01" required 
                           class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200">
                    @error('kode_gejala') <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Kategori</label>
                    <select name="kategori" required 
                            class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200 appearance-none">
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Umum">Umum</option>
                        <option value="Pernapasan">Pernapasan</option>
                        <option value="Pencernaan">Pencernaan</option>
                        <option value="Kulit">Kulit</option>
                        <option value="Saraf">Saraf</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Gejala / Pertanyaan</label>
                <textarea name="nama_gejala" rows="3" placeholder="Contoh: Apakah kucing mengalami nafsu makan berkurang?" required 
                          class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200">{{ old('nama_gejala') }}</textarea>
                <p class="text-[10px] text-slate-400 mt-2 ml-1 italic">* Tuliskan dalam bentuk kalimat tanya agar mudah dipahami user saat diagnosa.</p>
            </div>

            <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-100 active:scale-[0.98]">
                Simpan Gejala
            </button>
        </form>
    </div>
</div>
@endsection