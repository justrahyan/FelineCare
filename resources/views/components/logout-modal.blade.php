<div id="logoutModal" class="fixed inset-0 z-[100] hidden overflow-y-auto" x-cloak>
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity"></div>

    <div class="relative flex min-h-screen items-center justify-center p-4">
        <div class="relative w-full max-w-md transform overflow-hidden rounded-[2.5rem] bg-white p-8 text-left shadow-2xl transition-all font-['Quicksand']">
            <div class="text-center">
                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-amber-50 text-amber-600 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4m7 14l5-5l-5-5m5 5H9"/>
                        </g>
                    </svg>
                </div>
                
                <h3 class="text-2xl font-black text-slate-800 tracking-tight">Mau Keluar?</h3>
                <p class="mt-3 text-slate-500 font-medium text-sm md:text-base">
                    Sesi Anda akan berakhir. Pastikan semua perubahan data sudah tersimpan sebelum keluar.
                </p>
            </div>

            <div class="mt-8 flex flex-col md:flex-row gap-3">
                <button type="button" onclick="closeLogoutModal()" 
                        class="flex-1 px-6 py-4 rounded-2xl bg-slate-100 text-slate-600 font-bold hover:bg-slate-200 transition cursor-pointer text-sm md:text-base">
                    Batal
                </button>
                <form action="{{ route('logout') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" 
                            class="w-full px-6 py-4 rounded-2xl bg-red-600 text-white font-bold hover:bg-red-700 transition shadow-lg shadow-red-100 cursor-pointer text-sm md:text-base">
                        Ya, Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openLogoutModal() {
        const modal = document.getElementById('logoutModal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeLogoutModal() {
        const modal = document.getElementById('logoutModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Tutup jika klik di luar area modal
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('logoutModal');
        if (event.target == modal) {
            closeLogoutModal();
        }
    });
</script>