<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkubator Telur Ayam</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (via Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="antialiased relative min-h-screen flex flex-col selection:bg-blue-500/30 selection:text-blue-900 dark:selection:bg-blue-500/30 dark:selection:text-blue-100 transition-colors duration-300 overflow-x-hidden">

    <!-- Background Effects -->
    <div class="fixed inset-0 z-[-3] app-page-wash pointer-events-none transition-colors duration-300"></div>
    <div class="fixed inset-0 z-[-2] app-grid-pattern opacity-80 pointer-events-none transition-colors duration-300"></div>

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main class="flex-grow container mx-auto px-4 py-6 sm:px-6 lg:px-8 mt-16 sm:mt-20 md:mt-24 min-h-[70vh]">
        @yield('content')
    </main>

    <!-- Mega Footer -->
    <footer class="app-footer border-t backdrop-blur-xl mt-12 sm:mt-16 pt-10 sm:pt-16 pb-6 sm:pb-8 transition-colors duration-300 relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-blue-500/50 dark:via-blue-400/50 to-transparent"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-10 lg:gap-12 mb-8 sm:mb-12">
                <!-- Kolom 1: Info Perusahaan -->
                <div class="sm:col-span-2 lg:col-span-1 space-y-4">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-slate-800 flex items-center justify-center border border-blue-200 dark:border-slate-700">
                            <span class="text-2xl">🐣</span>
                        </div>
                        <span class="text-xl text-slate-900 dark:text-white font-bold tracking-wide">Inkubator<span class="text-blue-600 dark:text-slate-400">Pro</span></span>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                        Sistem inkubasi cerdas terpadu untuk memaksimalkan rasio penetasan Anda melalui teknologi monitoring presisi tinggi dan otomatisasi 24/7.
                    </p>
                    <div class="flex gap-4 pt-2">
                        <a href="https://www.tiktok.com/@smarteggincubator?is_from_webapp=1&sender_device=pc" target="_blank" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-900 flex items-center justify-center text-slate-500 hover:bg-blue-100 hover:text-blue-600 dark:hover:bg-slate-800 dark:hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                        </a>
                        <a href="https://www.instagram.com/smarteggincubator/" target="_blank" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-900 flex items-center justify-center text-slate-500 hover:bg-blue-100 hover:text-blue-600 dark:hover:bg-slate-800 dark:hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="https://www.youtube.com/@smarteggincubator" target="_blank" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-900 flex items-center justify-center text-slate-500 hover:bg-blue-100 hover:text-blue-600 dark:hover:bg-slate-800 dark:hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        </a>
                        <a href="https://t.me/smarteggincubator" target="_blank" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-900 flex items-center justify-center text-slate-500 hover:bg-blue-100 hover:text-blue-600 dark:hover:bg-slate-800 dark:hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9.993 15.33l-.394 4.797c.563 0 .807-.242 1.1-.533l2.64-2.527 5.47 4.004c1.003.553 1.716.262 1.987-.93l3.604-16.89c.32-1.497-.54-2.083-1.52-1.713L1.21 9.37c-1.45.56-1.43 1.37-.247 1.73l5.86 1.83 13.61-8.58c.64-.39 1.22-.174.74.216"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Kolom 2: Tautan Cepat -->
                <div>
                    <h3 class="text-slate-900 dark:text-white font-semibold mb-5 text-sm uppercase tracking-wider">Navigasi</h3>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-white transition-colors text-sm">Beranda</a></li>
                        <li><a href="/monitoring" class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-white transition-colors text-sm">Dashboard Monitoring</a></li>
                        <li><a href="/pemahaman" class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-white transition-colors text-sm">Pusat Edukasi</a></li>
                        <li><a href="/about" class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-white transition-colors text-sm">Tentang</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Layanan -->
                <div>
                    <h3 class="text-slate-900 dark:text-white font-semibold mb-5 text-sm uppercase tracking-wider">Layanan</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-white transition-colors text-sm">Dukungan Teknis</a></li>
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-white transition-colors text-sm">Panduan Penggunaan </a></li>
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-white transition-colors text-sm">Panduan Kalibrasi</a></li>
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-white transition-colors text-sm">Konsultasi Penetasan</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Kontak -->
                <div>
                    <h3 class="text-slate-900 dark:text-white font-semibold mb-5 text-sm uppercase tracking-wider">Hubungi Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-600 dark:text-slate-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">Jl. Ki Ageng Gribig No. 28, Kelurahan Madyopuro, Kecamatan Kedungkandang<br>Kota Malang, Jawa Timur, Indonesia</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-blue-600 dark:text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">smart.egg.incubator1@gmail.com</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-blue-600 dark:text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">+62 896-9954-6195</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-200 dark:border-slate-800/60 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 text-sm text-center md:text-left">
                    &copy; {{ date('Y') }} Inkubator. All rights reserved.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="text-slate-500 hover:text-blue-600 dark:hover:text-white text-sm transition-colors">Syarat & Ketentuan</a>
                    <a href="#" class="text-slate-500 hover:text-blue-600 dark:hover:text-white text-sm transition-colors">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile menu script is in navbar component -->
    @yield('scripts')
</body>
</html>
