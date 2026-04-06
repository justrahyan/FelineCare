@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-black text-slate-800 tracking-tight">Riwayat Konsultasi</h1>
        <p class="text-slate-500 text-xs md:text-sm mt-1">Daftar semua hasil diagnosa yang dilakukan oleh pengguna.</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 text-emerald-700 p-4 rounded-xl mb-6 font-bold border border-emerald-100 text-xs md:text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-[1.5rem] md:rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[700px]">
                <thead>
                    <tr class="text-[10px] uppercase text-slate-400 font-black tracking-widest bg-slate-50/50">
                        <th class="p-5 md:p-6 text-center">No</th>
                        <th class="p-5 md:p-6">Tanggal & Waktu</th>
                        <th class="p-5 md:p-6">Pemilik & Kucing</th>
                        <th class="p-5 md:p-6">Hasil Diagnosa</th>
                        <th class="p-5 md:p-6 text-center">Nilai CF</th>
                        <th class="p-5 md:p-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 font-medium">
                    @forelse($riwayats as $index => $r)
                    <tr class="border-t border-slate-50 hover:bg-slate-50 transition">
                        <td class="p-5 md:p-6 text-center text-xs font-bold text-slate-400">
                            {{ $riwayats->firstItem() + $index }}
                        </td>
                        <td class="p-5 md:p-6 text-xs md:text-sm">
                            <span class="block font-bold text-slate-800">{{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}</span>
                            <span class="text-[10px] text-slate-400 font-black uppercase">{{ \Carbon\Carbon::parse($r->tanggal)->format('H:i') }} WIB</span>
                        </td>
                        <td class="p-5 md:p-6">
                            <span class="block font-bold text-slate-800 text-sm md:text-base">{{ $r->nama_pemilik }}</span>
                            <span class="text-xs text-emerald-600 font-bold uppercase tracking-tighter">Anabul: {{ $r->nama_kucing }}</span>
                        </td>
                        <td class="p-5 md:p-6">
                            <span class="font-bold text-slate-700 text-sm md:text-base">{{ $r->hasil_diagnosa }}</span>
                        </td>
                        <td class="p-5 md:p-6 text-center">
                            <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-[10px] md:text-xs font-black">
                                {{ number_format($r->nilai_cf, 2) }}%
                            </span>
                        </td>
                        <td class="p-5 md:p-6 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.riwayat.show', $r->id_konsultasi) }}" 
                                   class="p-2.5 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-100 transition flex items-center justify-center cursor-pointer"
                                   title="Lihat Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0-4 0"/>
                                            <path d="M21 12q-3.6 6-9 6t-9-6q3.6-6 9-6t9 6"/>
                                        </g>
                                    </svg>
                                </a>
                                <button type="button" onclick="openDeleteModal('{{ route('admin.riwayat.destroy', $r->id_konsultasi) }}', 'Konsultasi {{ $r->nama_pemilik }}')"
                                        class="p-2.5 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition flex items-center justify-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-12 text-center text-slate-400 font-bold italic text-sm">
                            Belum ada data konsultasi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6 custom-pagination">
        {{ $riwayats->links() }}
    </div>
</div>

<style>
    .custom-pagination nav > div:last-child,
    .custom-pagination nav > div {
        background-color: transparent !important;
    }

    .custom-pagination [aria-current="page"] > span,
    .custom-pagination span[aria-current="page"] span {
        background-color: #059669 !important;
        border-color: #059669 !important;
        color: #ffffff !important;
    }

    .custom-pagination a[rel],
    .custom-pagination nav a {
        background-color: #ffffff !important;
        border-color: #e2e8f0 !important;
        color: #374151 !important;
    }

    .custom-pagination nav a:hover {
        background-color: #d1fae5 !important;
        color: #059669 !important;
    }

    .custom-pagination nav span {
        background-color: #ffffff !important;
        color: #9ca3af !important;
    }
</style>

@include('components.delete-modal')
@endsection