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
                            <a href="{{ route('admin.penyakit.edit', $p->id_penyakit) }}" 
                            class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition flex items-center justify-center cursor-pointer"
                            title="Edit Penyakit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1"/>
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3"/>
                                    </g>
                                </svg>
                            </a>

                            <button type="button" 
                                    onclick="openDeleteModal('{{ route('admin.penyakit.destroy', $p->id_penyakit) }}', '{{ $p->nama_penyakit }}')"
                                    class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition flex items-center justify-center cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Delete Modal --}}
<div id="deleteModal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity"></div>

    <div class="relative flex min-h-screen items-center justify-center p-4">
        <div class="relative w-full max-w-md transform overflow-hidden rounded-[2.5rem] bg-white p-8 text-left shadow-2xl transition-all">
            <div class="text-center">
                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-red-50 text-red-600 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/>
                    </svg>
                </div>
                
                <h3 class="text-2xl font-bold text-slate-800 tracking-tight">Hapus Data?</h3>
                <p class="mt-3 text-slate-500 font-medium">
                    Apakah Anda yakin ingin menghapus penyakit <span id="deleteItemName" class="text-red-600 font-bold"></span>? Data yang dihapus tidak dapat dikembalikan.
                </p>
            </div>

            <div class="mt-8 flex flex-col md:flex-row gap-3">
                <button type="button" onclick="closeDeleteModal()" 
                        class="flex-1 px-6 py-4 rounded-2xl bg-slate-100 text-slate-600 font-bold hover:bg-slate-200 transition cursor-pointer">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full px-6 py-4 rounded-2xl bg-red-600 text-white font-bold hover:bg-red-700 transition shadow-lg shadow-red-100 cursor-pointer">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(actionUrl, itemName) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const nameSpan = document.getElementById('deleteItemName');
        
        form.action = actionUrl;
        nameSpan.textContent = itemName;
        
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Lock scroll
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Unlock scroll
    }

    // Close on click outside
    window.onclick = function(event) {
        const modal = document.getElementById('deleteModal');
        if (event.target == modal) {
            closeDeleteModal();
        }
    }
</script>
@endsection