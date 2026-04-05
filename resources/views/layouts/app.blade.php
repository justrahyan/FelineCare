<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }} - Sistem Pakar</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900">
    <nav class="bg-white shadow-sm border-b border-slate-200 py-4 mb-8">
        <div class="container mx-auto px-4">
            <span class="text-2xl font-bold text-indigo-600">FelineCare</span>
        </div>
    </nav>

    <main class="container mx-auto px-4">
        @yield('content')
    </main>
</body>
</html>