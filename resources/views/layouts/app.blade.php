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
    <nav class="bg-white shadow-md border-b border-emerald-100 py-4 mb-8 sticky top-0 z-50">
        <div class="container mx-auto px-24 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-emerald-600 flex items-center gap-2">
                <span>🐾 FelineCare</span>
            </a>
            <div class="hidden md:flex gap-6 font-semibold text-slate-600">
                <a href="/" class="hover:text-emerald-600 transition">Beranda</a>
                <a href="{{ route('diagnosa.index') }}" class="hover:text-emerald-600 transition">Diagnosa</a>
                <a href="#" class="hover:text-emerald-600 transition">Tentang</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 pb-12">
        @yield('content')
    </main>
</body>
</html>