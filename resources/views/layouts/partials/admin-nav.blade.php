<nav class="space-y-2">
    <a href="{{ route('admin.dashboard') }}" 
       class="block px-4 py-3 rounded-xl font-bold transition text-sm cursor-pointer {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-600' }}">
        Dashboard
    </a>

    <a href="{{ route('admin.penyakit.index') }}" 
       class="block px-4 py-3 rounded-xl font-bold transition text-sm cursor-pointer {{ request()->routeIs('admin.penyakit.*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-600' }}">
        Data Penyakit
    </a>

    <a href="{{ route('admin.gejala.index') }}" 
       class="block px-4 py-3 rounded-xl font-bold transition text-sm cursor-pointer {{ request()->routeIs('admin.gejala.*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-600' }}">
        Data Gejala
    </a>

    <a href="{{ route('admin.rules.index') }}" 
       class="block px-4 py-3 rounded-xl font-bold transition text-sm cursor-pointer {{ request()->routeIs('admin.rules.*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-600' }}">
        Basis Pengetahuan
    </a>

    <a href="{{ route('admin.riwayat.index') }}" 
       class="block px-4 py-3 rounded-xl font-bold transition text-sm cursor-pointer {{ request()->routeIs('admin.riwayat.*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-600' }}">
        Riwayat Diagnosa
    </a>

    <div class="pt-8 border-t border-slate-50 mt-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 rounded-xl font-bold text-red-500 hover:bg-red-50 transition text-sm cursor-pointer">
                Keluar (Logout)
            </button>
        </form>
    </div>
</nav>