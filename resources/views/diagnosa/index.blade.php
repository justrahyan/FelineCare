@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-2 md:px-0 mt-6 md:mt-12" 
     x-data="{ 
        step: 1, 
        totalSteps: 4,
        nama_pemilik: '',
        nama_kucing: '',
        error: '',
        nextStep() { 
            this.error = '';
            if(this.step === 1) {
                if(!this.nama_pemilik || !this.nama_kucing) {
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
            <div class="bg-emerald-600 text-white w-8 h-8 rounded-lg flex items-center justify-center shadow-md">
                <span x-text="step" class="font-black text-sm"></span>
            </div>
            <div>
                <h1 class="text-sm md:text-base font-black text-slate-800 tracking-tight leading-none">Konsultasi Pakar</h1>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-0.5">
                    <span x-show="step === 1">Identitas Pasien</span>
                    <span x-show="step === 2">Gejala Umum & Pencernaan</span>
                    <span x-show="step === 3">Gejala Pernapasan & Saraf</span>
                    <span x-show="step === 4">Gejala Fisik & Kulit</span>
                </p>
            </div>
        </div>
        
        <div class="flex items-center gap-4">
            <div class="hidden sm:block h-1.5 w-32 bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-emerald-500 transition-all duration-500" :style="`width: ${(step/totalSteps)*100}%` text-sm"></div>
            </div>
            <span class="text-xs font-black text-slate-400"><span x-text="step" class="text-emerald-600"></span>/<span x-text="totalSteps"></span></span>
        </div>
    </div>

    <template x-if="error">
        <div class="mb-4 p-4 bg-red-50 border border-red-100 text-red-600 rounded-xl text-xs font-bold animate-bounce">
            ⚠️ <span x-text="error"></span>
        </div>
    </template>

    <form action="{{ route('diagnosa.hitung') }}" method="POST">
        @csrf

        <div x-show="step === 1" x-transition class="space-y-4">
            <div class="bg-white p-6 md:p-8 rounded-[1.5rem] shadow-sm border border-slate-100">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" x-model="nama_pemilik" placeholder="Contoh: Rahyan" 
                               class="w-full px-5 py-3.5 rounded-xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50/50 outline-none transition font-bold text-sm">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Kucing</label>
                        <input type="text" name="nama_kucing" x-model="nama_kucing" placeholder="Contoh: Haerin" 
                               class="w-full px-5 py-3.5 rounded-xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50/50 outline-none transition font-bold text-sm">
                    </div>
                </div>
            </div>
        </div>

        <div x-show="step === 2" x-transition x-cloak class="space-y-4">
            <div class="bg-white p-5 md:p-7 rounded-[1.5rem] shadow-sm border border-slate-100">
                <p class="text-[11px] font-bold text-slate-400 mb-4 px-1 italic text-center">Apakah kucing Anda mengalami gejala di bawah ini?</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-[400px] overflow-y-auto p-1 custom-scrollbar">
                    @foreach($gejalas->whereIn('kategori', ['Umum', 'Pencernaan']) as $g)
                    <label class="flex items-center p-3 border-2 border-slate-50 bg-slate-50/50 rounded-xl cursor-pointer hover:bg-white hover:border-emerald-500 transition group">
                        <input type="checkbox" name="gejala[]" value="{{ $g->id_gejala }}" class="w-5 h-5 text-emerald-600 rounded-md border-slate-300 focus:ring-emerald-500 cursor-pointer">
                        <div class="ml-3">
                            <span class="block text-[8px] font-black text-emerald-500 uppercase">{{ $g->kode_gejala }}</span>
                            <span class="text-xs md:text-sm text-slate-700 font-bold leading-tight">{{ $g->nama_gejala }}</span>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>

        <div x-show="step === 3" x-transition x-cloak class="space-y-4">
            <div class="bg-white p-5 md:p-7 rounded-[1.5rem] shadow-sm border border-slate-100">
                <p class="text-[11px] font-bold text-slate-400 mb-4 px-1 italic text-center">Cek kondisi pernapasan dan perilaku kucing:</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-[400px] overflow-y-auto p-1 custom-scrollbar">
                    @foreach($gejalas->whereIn('kategori', ['Pernapasan', 'Saraf', 'Telinga']) as $g)
                    <label class="flex items-center p-3 border-2 border-slate-50 bg-slate-50/50 rounded-xl cursor-pointer hover:bg-white hover:border-emerald-500 transition group">
                        <input type="checkbox" name="gejala[]" value="{{ $g->id_gejala }}" class="w-5 h-5 text-emerald-600 rounded-md border-slate-300 focus:ring-emerald-500 cursor-pointer">
                        <div class="ml-3">
                            <span class="block text-[8px] font-black text-emerald-500 uppercase">{{ $g->kode_gejala }}</span>
                            <span class="text-xs md:text-sm text-slate-700 font-bold leading-tight">{{ $g->nama_gejala }}</span>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>

        <div x-show="step === 4" x-transition x-cloak class="space-y-4">
            <div class="bg-white p-5 md:p-7 rounded-[1.5rem] shadow-sm border border-slate-100">
                <p class="text-[11px] font-bold text-slate-400 mb-4 px-1 italic text-center">Terakhir, apakah ada gejala pada kulit atau fisik luar?</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-[400px] overflow-y-auto p-1 custom-scrollbar">
                    @foreach($gejalas->whereIn('kategori', ['Kulit', 'Mata', 'Lainnya']) as $g)
                    <label class="flex items-center p-3 border-2 border-slate-50 bg-slate-50/50 rounded-xl cursor-pointer hover:bg-white hover:border-emerald-500 transition group">
                        <input type="checkbox" name="gejala[]" value="{{ $g->id_gejala }}" class="w-5 h-5 text-emerald-600 rounded-md border-slate-300 focus:ring-emerald-500 cursor-pointer">
                        <div class="ml-3">
                            <span class="block text-[8px] font-black text-emerald-500 uppercase">{{ $g->kode_gejala }}</span>
                            <span class="text-xs md:text-sm text-slate-700 font-bold leading-tight">{{ $g->nama_gejala }}</span>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="button" x-show="step > 1" @click="prevStep" 
                    class="px-6 py-4 rounded-xl bg-white border-2 border-slate-100 text-slate-400 font-bold text-sm hover:bg-slate-50 transition active:scale-95 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
            </button>
            
            <button type="button" x-show="step < totalSteps" @click="nextStep" 
                    class="flex-1 bg-emerald-600 text-white py-4 rounded-xl font-bold text-sm hover:bg-emerald-700 shadow-lg shadow-emerald-100 transition active:scale-95 cursor-pointer flex justify-center items-center gap-2">
                Lanjut
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </button>

            <button type="submit" x-show="step === totalSteps" 
                    class="flex-1 bg-emerald-600 text-white py-4 rounded-xl font-bold text-sm hover:bg-emerald-700 shadow-lg shadow-emerald-200 transition active:scale-95 cursor-pointer">
                Analisis Sekarang 🐾
            </button>
        </div>
    </form>
</div>
@endsection