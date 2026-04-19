@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-2 md:px-0 mt-6 md:mt-12" 
     x-data="{ 
        step: 1, 
        totalSteps: 4,
        nama_pemilik: '',
        jenis_kucing: '',
        error: '',
        nextStep() { 
            this.error = '';
            if(this.step === 1) {
                if(!this.nama_pemilik || !this.jenis_kucing) {
                    this.error = 'Harap isi identitas pasien terlebih dahulu!';
                    return;
                }
            }
            if(this.step < this.totalSteps) this.step++ 
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        prevStep() { if(this.step > 1) this.step-- }
     }">

    <div class="mb-6 flex flex-row justify-between items-center bg-white p-4 rounded-2xl border border-emerald-100 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="bg-emerald-600 text-white w-10 h-10 rounded-xl flex items-center justify-center shadow-lg">
                <span x-text="step" class="font-black text-lg"></span>
            </div>
            <div>
                <h1 class="text-base md:text-lg font-black text-slate-800 tracking-tight leading-none">Konsultasi Pakar</h1>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">Langkah Diagnosa</p>
            </div>
        </div>
        
        <div class="flex items-center gap-4">
            <span class="text-xs font-black text-slate-400">Step <span x-text="step" class="text-emerald-600"></span> of <span x-text="totalSteps"></span></span>
        </div>
    </div>

    <template x-if="error">
        <div class="mb-4 p-4 bg-red-50 border border-red-100 text-red-600 rounded-xl text-xs font-bold animate-pulse">
            ⚠️ <span x-text="error"></span>
        </div>
    </template>

    <form action="{{ route('diagnosa.hitung') }}" method="POST">
        @csrf

        <div x-show="step === 1" x-transition class="space-y-4">
            <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-sm border border-slate-100">
                <h2 class="text-xl font-black text-slate-800 mb-6 flex items-center gap-2">
                    <span class="w-1 h-6 bg-emerald-500 rounded-full"></span>
                    Identitas Pasien
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" x-model="nama_pemilik" placeholder="Masukkan nama pemilik Anda" 
                               class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50/50 outline-none transition font-bold text-sm">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Jenis / Ras Kucing</label>
                        <input type="text" name="jenis_kucing" x-model="jenis_kucing" placeholder="Masukkan jenis / ras kucing Anda" 
                               class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50/50 outline-none transition font-bold text-sm">
                    </div>
                </div>
            </div>
        </div>

        @php
            $steps = [
                2 => ['title' => 'Gejala Umum & Pencernaan', 'cats' => ['Umum', 'Pencernaan']],
                3 => ['title' => 'Gejala Pernapasan & Saraf', 'cats' => ['Pernapasan', 'Saraf', 'Telinga']],
                4 => ['title' => 'Gejala Fisik & Kulit', 'cats' => ['Kulit', 'Mata', 'Lainnya']]
            ];
        @endphp

        @foreach($steps as $sNum => $data)
        <div x-show="step === {{ $sNum }}" x-transition x-cloak class="space-y-4">
            <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-sm border border-slate-100">
                <div class="mb-8 text-center">
                    <span class="bg-emerald-50 text-emerald-600 px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest border border-emerald-100">Kategori Gejala</span>
                    <h2 class="text-2xl md:text-3xl font-black text-slate-800 mt-2 tracking-tight">{{ $data['title'] }}</h2>
                    <p class="text-slate-400 text-xs mt-1 font-medium italic">Silakan pilih gejala yang teramati pada kucing Anda</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-[450px] overflow-y-auto p-1 custom-scrollbar">
                    @foreach($gejalas->whereIn('kategori', $data['cats']) as $g)
                    <label class="flex items-center p-4 border-2 border-slate-50 bg-slate-50/50 rounded-2xl cursor-pointer hover:bg-white hover:border-emerald-500 hover:shadow-md hover:shadow-emerald-50 transition group relative overflow-hidden">
                        <input type="checkbox" name="gejala[]" value="{{ $g->id_gejala }}" class="w-6 h-6 text-emerald-600 rounded-lg border-slate-300 focus:ring-emerald-500 cursor-pointer">
                        <div class="ml-4">
                            <span class="block text-[9px] font-black text-emerald-500 uppercase tracking-tighter">{{ $g->kode_gejala }}</span>
                            <span class="text-sm text-slate-700 font-bold leading-tight">{{ $g->nama_gejala }}</span>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach

        <div class="mt-8 flex gap-4">
            <button type="button" x-show="step > 1" @click="prevStep" 
                    class="px-8 py-4 rounded-2xl bg-white border-2 border-slate-100 text-slate-400 font-bold text-sm hover:bg-slate-50 transition active:scale-95 cursor-pointer shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
            </button>
            
            <button type="button" x-show="step < totalSteps" @click="nextStep" 
                    class="flex-1 bg-emerald-600 text-white py-4 rounded-2xl font-black text-base hover:bg-emerald-700 shadow-xl shadow-emerald-100 transition active:scale-95 cursor-pointer flex justify-center items-center gap-2">
                Lanjutkan Konsultasi
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </button>

            <button type="submit" x-show="step === totalSteps" 
                    class="flex-1 bg-emerald-600 text-white py-4 rounded-2xl font-black text-base hover:bg-emerald-700 shadow-xl shadow-emerald-200 transition active:scale-95 cursor-pointer">
                Mulai Analisis Penyakit 🐾
            </button>
        </div>
    </form>
</div>

<style>
    [x-cloak] { display: none !important; }
    .custom-scrollbar::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f8fafc; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
</style>
@endsection