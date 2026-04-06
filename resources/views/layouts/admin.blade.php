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
  <style> 
    body { font-family: 'Quicksand', sans-serif; } 
    [x-cloak] { display: none !important; }
  </style>
  @vite('resources/css/app.css')
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-900" x-data="{ sidebarOpen: false }">
    
    <header class="md:hidden bg-white border-b border-slate-200 p-4 sticky top-0 z-40 flex justify-between items-center shadow-sm">
        <div class="flex items-center gap-2">
            <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="h-6 w-auto">
            <span class="text-[8px] bg-emerald-600 text-white px-2 py-0.5 rounded-full font-bold uppercase tracking-tighter">Admin</span>
        </div>
        <button @click="sidebarOpen = true" class="p-2 bg-emerald-50 text-emerald-600 rounded-xl active:scale-95 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </header>

    <div class="min-h-screen flex">
        <div x-show="sidebarOpen" x-cloak class="fixed inset-0 z-[60] md:hidden">
            <div @click="sidebarOpen = false" 
                 x-show="sidebarOpen"
                 x-transition:enter="transition opacity-75 duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition opacity-75 duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
            
            <aside x-show="sidebarOpen" 
                   x-transition:enter="transition ease-out duration-300"
                   x-transition:enter-start="-translate-x-full"
                   x-transition:enter-end="translate-x-0"
                   x-transition:leave="transition ease-in duration-300"
                   x-transition:leave-start="translate-x-0"
                   x-transition:leave-end="-translate-x-full"
                   class="relative w-72 bg-white h-full shadow-2xl flex flex-col p-6 overflow-y-auto">
                
                <div class="flex justify-between items-center mb-8">
                    <img src="{{ asset('img/logo/logo.png') }}" class="h-8 w-auto">
                    <button @click="sidebarOpen = false" class="p-2 bg-slate-100 text-slate-400 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                @include('layouts.partials.admin-nav')
            </aside>
        </div>

        <aside class="hidden md:flex w-64 bg-white border-r border-slate-200 flex-col sticky top-0 h-screen flex-shrink-0">
            <div class="p-6 border-b border-slate-50">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 transition hover:opacity-80">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="h-8 w-auto">
                    <span class="text-[10px] bg-emerald-600 text-white px-2 py-0.5 rounded-full font-bold uppercase tracking-tighter">Admin</span>
                </a>
            </div>
            <div class="flex-1 overflow-y-auto p-4 custom-scrollbar">
                @include('layouts.partials.admin-nav')
            </div>
        </aside>

        <main class="flex-1 min-w-0 bg-slate-50 overflow-x-hidden">
            <div class="p-4 md:p-12">
                @yield('content')
            </div>
        </main>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    </style>
</body>
</html>