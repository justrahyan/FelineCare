<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }} - Sahabat Kucing Anda</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <style>
      body { font-family: 'Quicksand', sans-serif; }
  </style>
  @vite('resources/css/app.css')
</head>
<body class="bg-emerald-50 text-slate-900">
    <nav class="bg-white/80 backdrop-blur-md shadow-sm border-b border-emerald-100 py-4 sticky top-0 z-50">
        <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
            <a href="/" class="text-xl md:text-2xl font-bold text-emerald-600 flex items-center gap-2">
                <span>🐾 FelineCare</span>
            </a>
            
            <div class="hidden md:flex gap-8 font-bold text-slate-600">
                <a href="/" class="hover:text-emerald-600 transition">Beranda</a>
                <a href="{{ route('diagnosa.index') }}" class="hover:text-emerald-600 transition">Diagnosa</a>
            </div>

            <button id="menu-btn" class="md:hidden text-emerald-600 p-2 rounded-xl hover:bg-emerald-50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden absolute top-full left-0 w-full bg-white/95 backdrop-blur-lg border-b border-emerald-100 shadow-xl z-40 overflow-hidden">
            <div class="flex flex-col p-6 space-y-4 font-bold text-slate-700">
                <a href="/" class="px-4 py-3 rounded-xl hover:bg-emerald-50 hover:text-emerald-600 transition">Beranda</a>
                <a href="{{ route('diagnosa.index') }}" class="px-4 py-3 rounded-xl hover:bg-emerald-50 hover:text-emerald-600 transition">Diagnosa</a>
                <a href="#" class="px-4 py-3 rounded-xl hover:bg-emerald-50 hover:text-emerald-600 transition">Tentang</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 pb-12">
        @yield('content')
    </main>
    
    <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');

        btn.addEventListener('click', () => {
            const isHidden = menu.classList.contains('hidden');
            
            if(isHidden) {
                menu.classList.remove('hidden');
                // Ganti icon ke 'X' saat terbuka (opsional tapi bagus)
                icon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
            } else {
                menu.classList.add('hidden');
                // Balikkan icon ke hamburger
                icon.setAttribute('d', 'M4 6h16M4 12h16m-7 6h7');
            }
        });

        // Close menu saat klik di luar (biar makin pro)
        window.addEventListener('click', (e) => {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
                icon.setAttribute('d', 'M4 6h16M4 12h16m-7 6h7');
            }
        });
    </script>
</body>
</html>