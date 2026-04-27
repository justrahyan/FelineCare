@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Dashboard Overview</h1>
        <p class="text-slate-500 mt-1">Selamat datang kembali, Admin FelineCare.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-emerald-100">
            <span class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.2em]">Total Diagnosa</span>
            <p class="text-4xl font-black text-emerald-600 mt-2">{{ $total_konsultasi }}</p>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-emerald-100">
            <span class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.2em]">Data Penyakit</span>
            <p class="text-4xl font-black text-emerald-600 mt-2">{{ $total_penyakit }}</p>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-emerald-100">
            <span class="text-slate-400 font-bold uppercase text-[10px] tracking-[0.2em]">Data Gejala</span>
            <p class="text-4xl font-black text-emerald-600 mt-2">{{ $total_gejala }}</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-50 bg-slate-50/50 flex justify-between items-center">
            <h2 class="font-bold text-slate-800 tracking-tight">5 Diagnosa Terakhir</h2>
            <a href="{{ route('admin.riwayat.index') }}" class="text-xs font-bold text-emerald-600 hover:underline tracking-widest uppercase">Lihat Semua →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-[10px] uppercase text-slate-400 font-black tracking-widest bg-slate-50">
                        <th class="p-6">Pemilik / Jenis Kucing</th>
                        <th class="p-6">Hasil Diagnosa</th>
                        <th class="p-6">Nilai CF</th>
                        <th class="p-6 text-right">Waktu</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 font-medium">
                    @foreach($riwayat as $r)
                    <tr class="border-t border-slate-50 hover:bg-emerald-50/30 transition">
                        <td class="p-6">
                            <span class="block font-bold text-slate-800">{{ $r->nama_pemilik }}</span>
                            <span class="text-xs text-emerald-600 font-bold uppercase tracking-tighter">Ras: {{ $r->jenis_kucing }}</span>
                        </td>
                        <td class="p-6">
                            @php
                                $results = explode(',', $r->hasil_diagnosa);
                                $count = count($results);
                            @endphp
                            
                            <div class="flex flex-col gap-1.5">
                                <span class="font-bold text-slate-800 text-sm leading-tight">
                                    {{ trim($results[0]) }}
                                </span>

                                @if($count > 1)
                                    <div class="flex items-center gap-1.5">
                                        <span class="bg-slate-100 text-slate-500 px-2 py-0.5 rounded-md text-[10px] font-bold">
                                            +{{ $count - 1 }} Kemungkinan Lain
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="p-6">
                            <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-[10px] font-black">
                                {{ number_format($r->nilai_cf, 1) }}%
                            </span>
                        </td>
                        <td class="p-6 text-sm text-slate-400 text-right">
                            {{ $r->created_at->diffForHumans() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection