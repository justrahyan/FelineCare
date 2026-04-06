@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Data Penyakit</h1>
            <p class="text-slate-500 mt-1">Kelola daftar penyakit kucing dan solusinya.</p>
        </div>
        <a href="{{ route('admin.penyakit.create') }}" class="bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-100">
            + Tambah Penyakit
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 text-emerald-700 p-4 rounded-xl mb-6 font-bold border border-emerald-100">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-[10px] uppercase text-slate-400 font-black tracking-widest bg-slate-50">
                    <th class="p-6">Kode</th>
                    <th class="p-6">Nama Penyakit</th>
                    <th class="p-6">Deskripsi & Solusi</th>
                    <th class="p-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-slate-700 font-medium">
                @foreach($penyakits as $p)
                <tr class="border-t border-slate-50 hover:bg-slate-50/50 transition">
                    <td class="p-6 font-bold text-emerald-600">{{ $p->kode_penyakit }}</td>
                    <td class="p-6 font-bold text-slate-800">{{ $p->nama_penyakit }}</td>
                    <td class="p-6">
                        <p class="text-xs text-slate-500 line-clamp-1 mb-1">{{ $p->deskripsi }}</p>
                        <p class="text-xs text-emerald-600 font-bold line-clamp-1 italic">Solusi: {{ $p->solusi }}</p>
                    </td>
                    <td class="p-6 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.penyakit.edit', $p->id_penyakit) }}" class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition">
                                ✏️
                            </a>
                            <form action="{{ route('admin.penyakit.destroy', $p->id_penyakit) }}" method="POST" onsubmit="return confirm('Yakin hapus penyakit ini?')">
                                @csrf @method('DELETE')
                                <button class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection