@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-12 px-4">
    <div class="bg-white p-10 rounded-3xl shadow-xl border border-emerald-100">
        <div class="text-center mb-8">
            <span class="text-4xl">🔐</span>
            <h2 class="text-2xl font-bold text-slate-800 mt-4">Login Admin</h2>
            <p class="text-slate-500 text-sm">Masuk untuk mengelola data FelineCare</p>
        </div>

        @if(session('error'))
            <div class="bg-red-50 text-red-600 p-3 rounded-xl mb-4 text-sm font-bold border border-red-100 text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.auth') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border-2 border-slate-50 focus:border-emerald-500 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border-2 border-slate-50 focus:border-emerald-500 outline-none transition">
            </div>
            <button type="submit" class="w-full bg-emerald-600 text-white py-4 rounded-2xl font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-100">
                Masuk ke Dashboard
            </button>
        </form>
    </div>
</div>
@endsection