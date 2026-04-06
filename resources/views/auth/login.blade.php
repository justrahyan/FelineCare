@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-12 px-4">
    <div class="bg-white p-10 rounded-[2.5rem] shadow-xl border border-emerald-100 relative overflow-hidden">
        <div class="text-center mb-8">
            <img src="{{ asset('img/logo/logogram.png') }}" alt="FelineCare Logogram" class="h-16 mx-auto transition hover:scale-110 duration-300">
            <h2 class="text-2xl font-bold text-slate-800 mt-6 tracking-tight">Login Admin</h2>
            <p class="text-slate-500 text-sm font-medium">Masuk untuk mengelola data FelineCare</p>
        </div>

        @if(session('error'))
            <div class="bg-red-50 text-red-600 p-3 rounded-xl mb-6 text-sm font-bold border border-red-100 text-center animate-pulse">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.auth') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Email</label>
                <input type="email" name="email" required placeholder="Masukkan email" 
                       class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200">
            </div>
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Kata Sandi</label>
                <input type="password" name="password" required placeholder="Masukkan kata sandi" 
                       class="w-full px-5 py-4 rounded-2xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200">
            </div>
            <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-2xl font-bold text-sm md:text-lg hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-200 active:scale-[0.98]">
                Masuk ke Dashboard
            </button>
        </form>
    </div>
</div>
@endsection