<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="antialiased bg-[#fdfdfd] text-slate-900">
    <div class="relative flex flex-col items-center justify-center min-h-screen p-6 overflow-hidden">
        
        <h1 class="text-[12rem] md:text-[20rem] font-extrabold text-slate-100 leading-none select-none tracking-tighter">
            @yield('code')
        </h1>
        
        <div class="absolute flex flex-col items-center text-center">
            <h2 class="text-2xl md:text-4xl font-bold text-slate-800 mb-2">
                @yield('title')
            </h2>
            
            <p class="text-slate-500 font-medium text-sm md:text-base max-w-sm">
                @yield('message')
            </p>

            <button onclick="window.history.back()" class="mt-10 group flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white font-semibold rounded-2xl transition-all hover:bg-emerald-700 hover:-translate-y-0.5 active:scale-95 shadow-xl shadow-emerald-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:-translate-x-1 transition-transform"><path d="m15 18-6-6 6-6"/></svg>
                <span>Kembali ke halaman sebelumnya</span>
            </button>
        </div>

        <div class="absolute top-[-10%] left-[-5%] w-64 h-64 bg-emerald-50 rounded-full blur-3xl opacity-60"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-96 h-96 bg-slate-100 rounded-full blur-3xl opacity-60"></div>
    </div>
</body>
</html>