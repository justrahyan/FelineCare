@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-black text-slate-800 tracking-tight">Basis Pengetahuan</h1>
            <p class="text-slate-500 text-xs md:text-sm mt-1">Klik pada nama penyakit untuk melihat daftar gejala terkait.</p>
        </div>
        <a href="{{ route('admin.rules.create') }}" class="w-full md:w-auto text-center bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-100 cursor-pointer text-sm">
            + Tambah Aturan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 text-emerald-700 p-4 rounded-xl mb-6 font-bold border border-emerald-100 text-xs md:text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @foreach($rules as $index => $p)
        <div x-data="{ expanded: false }" class="bg-white rounded-[1.5rem] md:rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden transition-all duration-300">
            
            <div @click="expanded = !expanded" 
                 class="p-5 md:p-6 flex justify-between items-center cursor-pointer hover:bg-slate-50/50 transition">
                <div class="flex items-center gap-4">
                    <div class="bg-emerald-50 text-emerald-600 p-3 rounded-2xl hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><path d="M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2m0 7h6m-6 4h6"/></g></svg>
                    </div>
                    <div>
                        <span class="text-[9px] md:text-[10px] font-black text-emerald-600 uppercase tracking-[0.2em]">{{ $p->kode_penyakit }}</span>
                        <h2 class="text-sm md:text-lg font-black text-slate-800 leading-tight">{{ $p->nama_penyakit }}</h2>
                    </div>
                </div>

                <div class="flex items-center gap-3 md:gap-6">
                    <div class="hidden sm:flex flex-col items-end">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Total Gejala</span>
                        <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-[10px] font-black">
                            {{ $p->basis_pengetahuan->count() }}
                        </span>
                    </div>
                    <div class="text-slate-400 transition-transform duration-300" :class="expanded ? 'rotate-180 text-emerald-500' : ''">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m6 9l6 6l6-6"/></svg>
                    </div>
                </div>
            </div>

            <div x-show="expanded" 
                 x-collapse
                 x-cloak>
                <div class="px-5 md:px-6 pb-6 pt-2">
                    <div class="bg-slate-50/50 rounded-2xl border border-slate-100 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse min-w-[650px]">
                                <thead>
                                    <tr class="text-[9px] md:text-[10px] uppercase text-slate-400 font-black tracking-widest bg-white/80">
                                        <th class="px-6 py-4">Kode</th>
                                        <th class="px-6 py-4">Nama Gejala</th>
                                        <th class="px-6 py-4 text-center">MB</th>
                                        <th class="px-6 py-4 text-center">MD</th>
                                        <th class="px-6 py-4 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-slate-700 font-medium">
                                    @foreach($p->basis_pengetahuan as $rule)
                                    <tr class="border-t border-slate-100 hover:bg-white transition group">
                                        <td class="px-6 py-4 font-bold text-emerald-600 text-xs">{{ $rule->gejala->kode_gejala }}</td>
                                        <td class="px-6 py-4 text-sm font-bold text-slate-700 leading-snug">{{ $rule->gejala->nama_gejala }}</td>
                                        <td class="px-6 py-4 text-center font-bold text-slate-800 text-xs">{{ $rule->mb }}</td>
                                        <td class="px-6 py-4 text-center font-bold text-slate-800 text-xs">{{ $rule->md }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center gap-2">
                                                <a href="{{ route('admin.rules.edit', $rule->id_rule) }}" 
                                                   class="p-2 bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-100 transition cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1"/><path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3"/></g></svg>
                                                </a>
                                                <button type="button" 
                                                        onclick="openDeleteModal('{{ route('admin.rules.destroy', $rule->id_rule) }}', 'Gejala {{ $rule->gejala->kode_gejala }} dari {{ $p->nama_penyakit }}')" 
                                                        class="p-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('components.delete-modal')
@endsection