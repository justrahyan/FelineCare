@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Admin Dashboard</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-50 text-red-600 px-6 py-2 rounded-xl font-bold hover:bg-red-100 transition">Logout</button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-emerald-100">
            <span class="text-slate-500 font-bold uppercase text-xs tracking-widest">Total Diagnosa</span>
            <p class="text-4xl font-black text-emerald-600 mt-2">{{ $total_konsultasi }}</p>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-emerald-100">
            <span class="text-slate-500 font-bold uppercase text-xs tracking-widest">Data Penyakit</span>
            <p class="text-4xl font-black text-emerald-600 mt-2">{{ $total_penyakit }}</p>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-emerald-100">
            <span class="text-slate-500 font-bold uppercase text-xs tracking-widest">Data Gejala</span>
            <p class="text-4xl font-black text-emerald-600 mt-2">{{ $total_gejala }}</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-50 bg-slate-50/50">
            <h2 class="font-bold text-slate-800">5 Diagnosa Terakhir</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs uppercase text-slate-400 font-black tracking-widest">
                        <th class="p-6">Pemilik / Kucing</th>
                        <th class="p-6">Hasil</th>
                        <th class="p-6">Kepastian</th>
                        <th class="p-6">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 font-medium">
                    @foreach($riwayat as $r)
                    <tr class="border-t border-slate-50 hover:bg-emerald-50/30 transition">
                        <td class="p-6">
                            <span class="block font-bold text-slate-800">{{ $r->nama_pemilik }}</span>
                            <span class="text-xs text-slate-400 italic">Anabul: {{ $r->nama_kucing }}</span>
                        </td>
                        <td class="p-6 font-bold text-emerald-700">{{ $r->hasil_diagnosa }}</td>
                        <td class="p-6 italic">{{ $r->nilai_cf }}%</td>
                        <td class="p-6 text-sm text-slate-500">{{ $r->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection