<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - {{ config('app.name') }}</title>

  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <style> body { font-family: 'Quicksand', sans-serif; } </style>
  @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="min-h-screen flex flex-col md:flex-row">
        <aside class="w-full md:w-64 bg-white border-r border-slate-200 flex-shrink-0">
            <div class="p-6 border-b border-slate-50">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 transition hover:opacity-80">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="FelineCare Logo" class="h-8 w-auto">
                    <span class="text-[10px] bg-emerald-600 text-white px-2 py-0.5 rounded-full font-bold uppercase tracking-tighter">Admin</span>
                </a>
            </div>
            <nav class="mt-6 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-600' }} transition text-sm">
                    Dashboard
                </a>
                <a href="{{ route('admin.penyakit.index') }}" class="block px-4 py-3 rounded-xl font-bold text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 transition text-sm">
                    Data Penyakit
                </a>
                <a href="{{ route('admin.gejala.index') }}" class="block px-4 py-3 rounded-xl font-bold text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 transition text-sm">
                    Data Gejala
                </a>
                <a href="{{ route('admin.rules.index') }}" class="block px-4 py-3 rounded-xl font-bold text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 transition text-sm">
                    Basis Pengetahuan
                </a>
                <a href="{{ route('admin.riwayat.index') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('admin.riwayat.*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-600' }} transition text-sm cursor-pointer">
                    Riwayat Diagnosa
                </a>
                <div class="pt-8">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 rounded-xl font-bold text-red-500 hover:bg-red-50 transition text-sm">
                            Keluar (Logout)
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <main class="flex-1 p-6 md:p-12 overflow-y-auto bg-slate-50">
            @yield('content')
        </main>
    </div>
</body>
</html>