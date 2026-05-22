@extends('layouts.main')

@section('content')

<!-- Hero Section -->
<section class="flex flex-col items-center justify-center text-center py-10 sm:py-12 md:py-20 animate-fade-in-up">
    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-100 dark:bg-blue-500/10 border border-blue-200 dark:border-blue-500/20 text-blue-700 dark:text-blue-300 text-xs font-medium mb-6 sm:mb-8 transition-colors">
        <span class="w-2 h-2 rounded-full bg-blue-500 dark:bg-blue-400 animate-pulse"></span>
        Platform Peternakan Masa Depan
    </div>
    
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-extrabold tracking-tight mb-5 sm:mb-6 text-black dark:text-transparent dark:bg-clip-text dark:bg-gradient-to-br dark:from-white dark:via-slate-200 dark:to-slate-500 max-w-4xl px-2 transition-colors">
        Sistem <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-400 dark:from-blue-400 dark:to-blue-200">Penetasan</span> Telur
    </h1>
    
    <p class="text-sm sm:text-base md:text-lg lg:text-xl text-slate-600 dark:text-slate-400 max-w-2xl mb-8 sm:mb-10 leading-relaxed px-4 sm:px-6 transition-colors">
        Tingkatkan rasio keberhasilan penetasan telur Anda dengan sistem IoT terintegrasi. Pantau, kontrol, dan pelajari setiap metrik penting langsung dari genggaman Anda.
    </p>

    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center w-full sm:w-auto px-4 sm:px-6">
        <a href="/monitoring" class="px-6 sm:px-8 py-3.5 rounded-xl sm:rounded-full bg-white dark:bg-blue-600 text-blue-600 dark:text-white font-bold hover:bg-blue-50 dark:hover:bg-blue-500 hover:shadow-[0_0_20px_rgba(37,99,235,0.2)] dark:hover:shadow-[0_0_20px_rgba(59,130,246,0.3)] transition-all transform hover:-translate-y-1 active:scale-[0.98] text-center border border-blue-600 dark:border-transparent text-sm sm:text-base">
            Buka Dashboard
        </a>
        <a href="/about" class="px-6 sm:px-8 py-3.5 rounded-xl sm:rounded-full bg-white dark:bg-slate-800 text-black dark:text-white font-medium border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition-all active:scale-[0.98] text-center text-sm sm:text-base">
            Tentang Kami
        </a>
    </div>
</section>

<!-- Features Grid Section -->
<section class="py-10 sm:py-12 md:py-16 relative z-10">
    <div class="text-center mb-8 sm:mb-12 px-2">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black dark:text-white mb-3 sm:mb-4 transition-colors">Mengapa Memilih Kami?</h2>
        <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-sm md:text-base transition-colors px-2">Inkubator Pro bukan sekadar alat, melainkan sebuah ekosistem cerdas yang dirancang untuk memastikan telur menetas dengan sempurna.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 max-w-6xl mx-auto px-2 sm:px-4">
        
        <!-- Feature 1 -->
        <div class="group bg-white dark:bg-slate-900/40 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 hover:border-blue-300 dark:hover:border-blue-500/30 transition-all hover:-translate-y-1 sm:hover:-translate-y-2 shadow-sm hover:shadow-[0_10px_30px_rgba(37,99,235,0.05)] dark:hover:shadow-[0_10px_30px_rgba(59,130,246,0.05)]">
            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center border border-blue-100 dark:border-blue-500/20 mb-4 sm:mb-6 group-hover:scale-110 transition-transform group-hover:bg-blue-100 dark:group-hover:bg-blue-500/20">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <h3 class="text-lg sm:text-xl font-semibold text-black dark:text-white mb-2 sm:mb-3 transition-colors">Monitoring 24/7</h3>
            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed transition-colors">
                Pantau suhu dan kelembaban secara real-time kapanpun dan dimanapun. Tidak perlu lagi terbangun di tengah malam untuk sekadar mengecek kondisi alat penetas.
            </p>
        </div>

        <!-- Feature 2 -->
        <div class="group bg-white dark:bg-slate-900/40 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 hover:border-yellow-300 dark:hover:border-blue-500/30 transition-all hover:-translate-y-1 sm:hover:-translate-y-2 shadow-sm hover:shadow-[0_10px_30px_rgba(234,179,8,0.05)] dark:hover:shadow-[0_10px_30px_rgba(59,130,246,0.05)]">
            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-yellow-50 dark:bg-blue-500/10 flex items-center justify-center border border-yellow-100 dark:border-blue-500/20 mb-4 sm:mb-6 group-hover:scale-110 transition-transform group-hover:bg-yellow-100 dark:group-hover:bg-blue-500/20">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-yellow-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <h3 class="text-lg sm:text-xl font-semibold text-black dark:text-white mb-2 sm:mb-3 transition-colors">Otomatisasi Presisi</h3>
            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed transition-colors">
                Sistem pintar yang akan menghidup-matikan lampu pemanas dan memutar rak telur sesuai jadwal presisi yang Anda tentukan, menjamin embrio berkembang sempurna.
            </p>
        </div>

        <!-- Feature 3 -->
        <div class="group bg-white dark:bg-slate-900/40 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 hover:border-blue-300 dark:hover:border-blue-500/30 transition-all hover:-translate-y-1 sm:hover:-translate-y-2 shadow-sm hover:shadow-[0_10px_30px_rgba(37,99,235,0.05)] dark:hover:shadow-[0_10px_30px_rgba(59,130,246,0.05)] sm:col-span-2 md:col-span-1">
            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center border border-blue-100 dark:border-blue-500/20 mb-4 sm:mb-6 group-hover:scale-110 transition-transform group-hover:bg-blue-100 dark:group-hover:bg-blue-500/20">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477-4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <h3 class="text-lg sm:text-xl font-semibold text-black dark:text-white mb-2 sm:mb-3 transition-colors">Pusat Edukasi</h3>
            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed transition-colors">
                Platform kami juga dilengkapi dengan pusat wawasan bagi peternak, membantu Anda memahami rasio kelembaban dan suhu terbaik di tiap tahapan usia telur.
            </p>
        </div>
        
    </div>
</section>

<!-- Call To Action -->
<section class="py-10 sm:py-16 md:py-24 px-2 sm:px-4">
    <div class="max-w-4xl mx-auto bg-blue-50 dark:bg-gradient-to-br dark:from-blue-900/40 dark:to-slate-900/80 border border-blue-100 dark:border-blue-500/20 rounded-2xl sm:rounded-[2rem] p-6 sm:p-8 md:p-16 text-center relative overflow-hidden backdrop-blur-xl transition-colors">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-blue-500/5 dark:from-blue-500/10 via-transparent to-transparent pointer-events-none"></div>
        <div class="relative z-10">
            <h2 class="text-2xl sm:text-3xl md:text-5xl font-bold text-black dark:text-white mb-4 sm:mb-6 transition-colors">Siap Menetaskan Hasil Terbaik?</h2>
            <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base md:text-lg mb-8 sm:mb-10 max-w-2xl mx-auto transition-colors px-2">Gabung dengan ekosistem peternak modern. Kendalikan lingkungan inkubasi dan saksikan keberhasilan secara langsung melalui Dashboard kami.</p>
            <a href="/monitoring" class="inline-flex items-center gap-2 px-6 sm:px-8 py-3.5 sm:py-4 rounded-xl sm:rounded-full bg-white dark:bg-blue-600 text-blue-600 dark:text-white font-bold hover:bg-blue-50 dark:hover:bg-blue-500 hover:shadow-[0_0_30px_rgba(37,99,235,0.2)] dark:hover:shadow-[0_0_30px_rgba(59,130,246,0.4)] transition-all transform hover:-translate-y-1 active:scale-[0.98] border border-blue-600 dark:border-transparent text-sm sm:text-base">
                Akses Dashboard Sekarang
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
        </div>
    </div>
</section>

@endsection