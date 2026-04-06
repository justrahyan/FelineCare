@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-4 md:mt-10 px-4">
    <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-xl border border-emerald-100 relative overflow-hidden">
        <div class="text-center mb-6">
            <img src="{{ asset('img/logo/logogram.png') }}" alt="FelineCare Logogram" class="h-12 mx-auto transition hover:scale-110 duration-300">
            <h2 class="text-xl font-bold text-slate-800 mt-3 tracking-tight">Login Admin</h2>
            <p class="text-slate-500 text-xs font-medium">Masuk untuk mengelola data FelineCare</p>
        </div>

        @if(session('error'))
            <div class="bg-red-50 text-red-600 p-2 rounded-xl mb-4 text-[10px] font-bold border border-red-100 text-center animate-pulse">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.auth') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Email</label>
                <input type="email" name="email" required placeholder="Masukkan email" 
                       class="w-full px-4 py-3 rounded-xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200 text-sm">
            </div>
            
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Kata Sandi</label>
                <div class="relative group">
                    <input type="password" id="password" name="password" required placeholder="Masukkan kata sandi" 
                           class="w-full px-4 py-3 rounded-xl border-2 border-slate-50 focus:border-emerald-500 focus:bg-white bg-slate-50 outline-none transition duration-200 pr-12 text-sm">
                    
                    <button type="button" id="togglePassword" class="absolute right-0 top-0 h-full px-4 flex items-center justify-center text-slate-300 hover:text-emerald-600 transition focus:outline-none">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0-4 0"/>
                                <path d="M21 12q-3.6 6-9 6t-9-6q3.6-6 9-6t9 6"/>
                            </g>
                        </svg>
                        <svg id="eyeClosedIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="hidden">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 9q-3.6 4-9 4T3 9m0 6l2.5-3.8M21 14.976L18.508 11.2M9 17l.5-4m5.5 4l-.5-4"/>
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full mt-2 bg-emerald-600 text-white py-3.5 rounded-xl font-bold text-sm hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-100 active:scale-[0.98]">
                Masuk ke Dashboard
            </button>
        </form>
    </div>
</div>

<script>
    // Script tetap sama
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const eyeIcon = document.querySelector('#eyeIcon');
    const eyeClosedIcon = document.querySelector('#eyeClosedIcon');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        eyeIcon.classList.toggle('hidden');
        eyeClosedIcon.classList.toggle('hidden');
    });
</script>
@endsection