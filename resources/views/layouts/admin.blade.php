<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - {{ config('app.name') }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <style> body { font-family: 'Quicksand', sans-serif; } </style>
  @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="min-h-screen flex flex-col md:flex-row">
        <aside class="w-full md:w-64 bg-white border-r border-slate-200 flex-shrink-0">
            <div class="p-6">
                <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-emerald-600">
                    🐾 FelineCare <span class="text-xs bg-emerald-100 px-2 py-1 rounded text-emerald-700 ml-1">Admin</span>
                </a>
            </div>
            <nav class="mt-4 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-xl font-bold {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-600' }} transition">
                    Dashboard
                </a>
                <a href="#" class="block px-4 py-3 rounded-xl font-bold text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 transition">
                    Data Penyakit
                </a>
                <a href="#" class="block px-4 py-3 rounded-xl font-bold text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 transition">
                    Data Gejala
                </a>
                <a href="#" class="block px-4 py-3 rounded-xl font-bold text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 transition">
                    Basis Pengetahuan
                </a>
                <div class="pt-8">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 rounded-xl font-bold text-red-500 hover:bg-red-50 transition">
                            Keluar (Logout)
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <main class="flex-1 p-6 md:p-12 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>