@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Basis Pengetahuan</h1>
            <p class="text-slate-500 mt-1 text-sm md:text-base">Kelola aturan relasi antara gejala, penyakit, dan nilai CF.</p>
        </div>
        <a href="{{ route('admin.rules.create') }}" class="bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-100 cursor-pointer text-sm md:text-base">
            + Tambah Aturan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 text-emerald-700 p-4 rounded-xl mb-6 font-bold border border-emerald-100 text-sm md:text-base">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden text-sm md:text-base">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-[10px] uppercase text-slate-400 font-black tracking-widest bg-slate-50">
                    <th class="p-6">Penyakit</th>
                    <th class="p-6">Gejala</th>
                    <th class="p-6 text-center">MB</th>
                    <th class="p-6 text-center">MD</th>
                    <th class="p-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-slate-700 font-medium">
                @foreach($rules as $r)
                <tr class="border-t border-slate-50 hover:bg-slate-50/50 transition">
                    <td class="p-6 font-bold text-slate-800">{{ $r->penyakit->nama_penyakit }}</td>
                    <td class="p-6 text-slate-600">{{ $r->gejala->nama_gejala }}</td>
                    <td class="p-6 text-center font-bold text-emerald-600">{{ $r->mb }}</td>
                    <td class="p-6 text-center font-bold text-red-600">{{ $r->md }}</td>
                    <td class="p-6 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.rules.edit', $r->id_rule) }}" 
                               class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition flex items-center justify-center cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1"/><path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3"/></g></svg>
                            </a>
                            <button type="button" onclick="openDeleteModal('{{ route('admin.rules.destroy', $r->id_rule) }}', 'Aturan ini')"
                                    class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition flex items-center justify-center cursor-pointer text-sm md:text-base">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('components.delete-modal')
@endsection