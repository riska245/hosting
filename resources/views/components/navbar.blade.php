@php
    $currentRoute = request()->path();
@endphp

<header class="fixed top-0 left-0 right-0 z-50 flex justify-center pt-3 sm:pt-4 px-3 sm:px-4 pointer-events-none">
    <div class="app-navbar pointer-events-auto w-full max-w-5xl border rounded-2xl lg:rounded-full transition-colors duration-300 overflow-visible">
        
        <div class="flex items-center justify-between px-4 sm:px-5 lg:px-6 xl:px-8 py-2.5">
            <!-- Left: Logo & Nav -->
            <div class="flex items-center gap-3 lg:gap-4 xl:gap-8">
                <a href="/" class="flex items-center gap-2 group shrink-0">
                    <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-500/10 flex items-center justify-center border border-blue-200 dark:border-blue-500/20 group-hover:scale-110 transition-transform">
                        <span class="text-xl">🐣</span>
                    </div>
                    <span class="text-black dark:text-white font-semibold tracking-wide bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-400 dark:from-white dark:to-slate-400 group-hover:from-blue-500 group-hover:to-blue-300 dark:group-hover:from-blue-400 dark:group-hover:to-blue-300 transition-all duration-300">
                        Inkubator
                    </span>
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden lg:flex items-center gap-0.5 lg:gap-1 xl:gap-2">
                    <a href="/" class="px-2.5 lg:px-3 xl:px-4 py-1.5 rounded-full text-xs xl:text-sm font-medium transition-colors {{ $currentRoute == '/' ? 'bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400' : 'text-black dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-50 dark:hover:bg-blue-500/5' }}">
                        Beranda
                    </a>
                    <a href="/monitoring" class="px-2.5 lg:px-3 xl:px-4 py-1.5 rounded-full text-xs xl:text-sm font-medium transition-colors {{ $currentRoute == 'monitoring' ? 'bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400' : 'text-black dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-50 dark:hover:bg-blue-500/5' }}">
                        Monitoring
                    </a>
                    <a href="/pemahaman" class="px-2.5 lg:px-3 xl:px-4 py-1.5 rounded-full text-xs xl:text-sm font-medium transition-colors {{ $currentRoute == 'pemahaman' ? 'bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400' : 'text-black dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-50 dark:hover:bg-blue-500/5' }}">
                        Edukasi
                    </a>
                    <a href="/about" class="px-2.5 lg:px-3 xl:px-4 py-1.5 rounded-full text-xs xl:text-sm font-medium transition-colors {{ $currentRoute == 'about' ? 'bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400' : 'text-black dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-50 dark:hover:bg-blue-500/5' }}">
                        Tentang
                    </a>
                    <a href="/kontak" class="px-2.5 lg:px-3 xl:px-4 py-1.5 rounded-full text-xs xl:text-sm font-medium transition-colors {{ $currentRoute == 'kontak' ? 'bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400' : 'text-black dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-50 dark:hover:bg-blue-500/5' }}">
                        Kontak
                    </a>
                </nav>
            </div>

            <!-- Right: Actions & Mobile Toggle -->
            <div class="flex items-center gap-2 sm:gap-3 lg:gap-2 xl:gap-4">
                
                <!-- Search -->
                <div class="relative hidden sm:block group shrink-0">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-slate-500 group-focus-within:text-blue-600 dark:text-slate-400 dark:group-focus-within:text-blue-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" id="searchInput" autocomplete="off" placeholder="Cari data..." class="app-input w-28 sm:w-32 lg:w-28 xl:w-44 pl-9 pr-4 py-1.5 border rounded-full text-xs xl:text-sm placeholder-slate-500 dark:placeholder-slate-400 focus:outline-none transition-all focus:w-36 sm:focus:w-40 lg:focus:w-36 xl:focus:w-52">
                    
                    <!-- Search Results Dropdown -->
                    <div id="searchResults" class="app-popover absolute top-full right-0 mt-2 w-80 sm:w-96 border rounded-2xl overflow-hidden hidden max-h-96 flex-col z-[100] shadow-xl">
                        <div id="searchItems" class="overflow-y-auto custom-scrollbar"></div>
                        <a href="#" id="searchSeeMore" class="hidden text-center text-sm text-blue-600 dark:text-blue-400 font-medium py-3 border-t border-slate-100 dark:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            Lihat Lebih Lengkap (<span id="searchHiddenCount"></span>)
                        </a>
                        <div id="searchEmpty" class="hidden p-4 text-center text-sm text-slate-500 dark:text-slate-400">
                            Tidak ada data yang cocok.
                        </div>
                    </div>
                </div>

                <!-- Theme Toggle Button -->
                <button id="theme-toggle" type="button" class="p-2 rounded-full text-slate-700 dark:text-slate-300 hover:bg-blue-50 dark:hover:bg-white/10 hover:text-blue-700 dark:hover:text-white transition-colors focus:outline-none" title="Toggle Theme">
                    <!-- Sun icon -->
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 4.22a1 1 0 011.415 0l.708.708a1 1 0 01-1.414 1.414l-.708-.708a1 1 0 010-1.414zM16 10a1 1 0 011 1h1a1 1 0 110-2h-1a1 1 0 01-1 1zm-4.22 4.22a1 1 0 010 1.415l-.708.708a1 1 0 01-1.414-1.414l.708-.708a1 1 0 011.414 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-4.22a1 1 0 010-1.415l-.708.708a1 1 0 01-1.414 1.414l.708.708a1 1 0 011.414 0zM4 10a1 1 0 01-1-1H2a1 1 0 110 2h1a1 1 0 011-1zm4.22-4.22a1 1 0 01-1.415 0l-.708.708a1 1 0 011.414-1.414l.708.708a1 1 0 010 1.414zM10 5a5 5 0 100 10 5 5 0 000-10z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    <!-- Moon icon -->
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                </button>
                
                @if(Session::get('login'))
                <div class="relative z-[999] shrink-0" id="profile-dropdown">
                    <button
                        type="button"
                        class="app-primary-button px-4 lg:px-5 py-1.5 text-xs lg:text-sm font-medium rounded-full focus:outline-none transition-all"
                        id="profile-btn"
                        aria-expanded="false"
                        aria-controls="profile-menu"
                    >
                        Profil
                    </button>

                    <div
                        id="profile-menu"
                        class="app-menu hidden absolute right-0 mt-2 w-64 isolate border rounded-2xl z-50 overflow-hidden"
                    >
                        <!-- Header Profil -->
                        <div class="px-5 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-sm font-semibold text-black dark:text-white">
                                Profil Pengguna
                            </h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                                Informasi akun yang sedang login
                            </p>
                        </div>

                        <!-- Isi Profil -->
                        <div class="p-5 text-sm text-gray-700 dark:text-gray-300 space-y-3">
                            <div>
                                <p class="text-xs text-slate-400 dark:text-slate-500">
                                    Username
                                </p>
                                <p class="font-medium text-black dark:text-white">
                                    {{ Session::get('username') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400 dark:text-slate-500">
                                    Role
                                </p>
                                <p class="font-medium text-black dark:text-white capitalize">
                                    {{ Session::get('role') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400 dark:text-slate-500">
                                    Email
                                </p>
                                <p class="font-medium text-black dark:text-white break-all">
                                    {{ Session::get('email') }}
                                </p>
                            </div>
                        </div>

                        <!-- Logout -->
                        <form method="POST" action="/logout" class="border-t border-gray-200 dark:border-gray-700">
                            @csrf
                            <button
                                type="submit"
                                class="w-full px-5 py-3 text-left text-sm font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors"
                            >
                                Keluar Akun
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="hidden lg:flex items-center gap-1.5 xl:gap-2.5 shrink-0">
                    <a href="/login" class="app-secondary-button px-3 lg:px-3.5 xl:px-5 py-1.5 text-xs xl:text-sm font-medium rounded-full hover:bg-blue-50 dark:hover:bg-white/10 transition-all transform hover:-translate-y-0.5 active:translate-y-0 text-center">
                        Masuk
                    </a>
                    <a href="/register" class="app-primary-button px-3 lg:px-3.5 xl:px-5 py-1.5 text-xs xl:text-sm font-medium rounded-full transition-all transform hover:-translate-y-0.5 active:translate-y-0 text-center">
                        Daftar
                    </a>
                </div>
                @endif

                <!-- Mobile Hamburger Button -->
                <button id="mobile-menu-btn" class="lg:hidden p-2.5 rounded-xl text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-white/5 focus:outline-none transition-colors active:scale-95">
                    <svg id="hamburger-icon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="app-mobile-menu hidden lg:hidden border-t backdrop-blur-xl pb-5 transition-colors duration-300 rounded-b-2xl">
            
            <!-- Mobile Search -->
            <div class="px-4 pt-4 pb-2 sm:hidden relative">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" id="mobileSearchInput" autocomplete="off" placeholder="Cari halaman atau fitur..." class="app-input w-full pl-10 pr-4 py-3 border rounded-xl text-sm placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none transition-all">
                </div>
                <!-- Mobile Search Results Dropdown -->
                <div id="mobileSearchResults" class="app-popover absolute top-full left-4 right-4 mt-1 border rounded-xl overflow-hidden hidden max-h-80 flex-col z-[100] shadow-lg">
                    <div id="mobileSearchItems" class="overflow-y-auto custom-scrollbar"></div>
                    <a href="#" id="mobileSearchSeeMore" class="hidden text-center text-xs text-blue-600 dark:text-blue-400 font-medium py-2.5 border-t border-slate-100 dark:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        Lihat Lebih Lengkap (<span id="mobileSearchHiddenCount"></span>)
                    </a>
                    <div id="mobileSearchEmpty" class="hidden p-3 text-center text-xs text-slate-500 dark:text-slate-400">
                        Tidak ada data yang cocok.
                    </div>
                </div>
            </div>
            
            <nav class="flex flex-col px-3 sm:px-4 pt-2 space-y-1">
                <a href="/" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-base font-medium transition-all active:scale-[0.98] {{ $currentRoute == '/' ? 'bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-blue-600 dark:hover:text-blue-400' }}">
                    <svg class="w-5 h-5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    Beranda
                </a>
                <a href="/monitoring" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-base font-medium transition-all active:scale-[0.98] {{ $currentRoute == 'monitoring' ? 'bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-blue-600 dark:hover:text-blue-400' }}">
                    <svg class="w-5 h-5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                    Dashboard Monitoring
                </a>
                <a href="/pemahaman" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-base font-medium transition-all active:scale-[0.98] {{ $currentRoute == 'pemahaman' ? 'bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-blue-600 dark:hover:text-blue-400' }}">
                    <svg class="w-5 h-5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    Pusat Edukasi
                </a>
                <a href="/about" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-base font-medium transition-all active:scale-[0.98] {{ $currentRoute == 'about' ? 'bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-blue-600 dark:hover:text-blue-400' }}">
                    <svg class="w-5 h-5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    Tentang Kami
                </a>
                <a href="/kontak" class="flex items-center gap-3 px-4 py-3.5 rounded-xl text-base font-medium transition-all active:scale-[0.98] {{ $currentRoute == 'kontak' ? 'bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-blue-600 dark:hover:text-blue-400' }}">
                    <svg class="w-5 h-5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    Hubungi Kami
                </a>
                
                <div class="pt-3 px-1">
                    @if(Session::get('login'))
                    <div class="flex justify-center mt-3">
                        <form method="POST" action="/logout" class="w-full">
                            @csrf
                            <button type="submit" class="flex items-center justify-center gap-2 w-full px-5 py-3.5 text-base font-semibold text-white bg-red-600 rounded-xl hover:bg-red-700 active:scale-[0.98] transition-all text-center">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                                Keluar Akun
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="flex flex-col gap-2 w-full mt-3">
                        <a href="/login" class="flex items-center justify-center gap-2 w-full px-5 py-3.5 text-base font-semibold text-slate-900 dark:text-blue-400 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700/50 active:scale-[0.98] transition-all text-center">
                            Masuk Akun
                        </a>
                        <a href="/register" class="flex items-center justify-center gap-2 w-full px-5 py-3.5 text-base font-semibold text-white bg-blue-600 rounded-xl hover:bg-blue-700 active:scale-[0.98] transition-all text-center">
                            Daftar Baru
                        </a>
                    </div>
                    @endif
                </div>
            </nav>
        </div>

    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // ---- THEME TOGGLE LOGIC ----
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    const themeToggleBtn = document.getElementById('theme-toggle');

    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    themeToggleBtn.addEventListener('click', function() {
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');
        if (localStorage.getItem('theme')) {
            if (localStorage.getItem('theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    });

    // ---- MOBILE MENU TOGGLE WITH ICON SWAP ----
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');

    if(mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            hamburgerIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    }

    // ---- PROFILE DROPDOWN TOGGLE ----
    const profileDropdown = document.getElementById('profile-dropdown');
    const profileBtn = document.getElementById('profile-btn');
    const profileMenu = document.getElementById('profile-menu');

    if (profileDropdown && profileBtn && profileMenu) {
        const closeProfileMenu = () => {
            profileMenu.classList.add('hidden');
            profileBtn.setAttribute('aria-expanded', 'false');
        };

        const toggleProfileMenu = () => {
            const isOpen = !profileMenu.classList.contains('hidden');
            profileMenu.classList.toggle('hidden', isOpen);
            profileBtn.setAttribute('aria-expanded', String(!isOpen));
        };

        profileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleProfileMenu();
        });

        document.addEventListener('click', (e) => {
            if (!profileDropdown.contains(e.target)) {
                closeProfileMenu();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeProfileMenu();
            }
        });
    }

    // ---- SEARCH LOGIC ----
    const searchData = [
        { title: 'Suhu Optimal (Temperatur)', desc: 'Suhu ideal penetasan 37.5°C - 38.0°C', url: '/pemahaman' },
        { title: 'Kelembaban Udara (Humidity)', desc: 'Kelembaban ideal 55% - 60%', url: '/pemahaman' },
        { title: 'Pemutaran Rak Telur (Turning)', desc: 'Pemutaran otomatis setiap beberapa jam', url: '/pemahaman' },
        { title: 'Live Monitoring', desc: 'Pantau suhu & kelembaban real-time', url: '/monitoring' },
        { title: 'Visi & Misi', desc: 'Solusi teknologi menjembatani peternakan', url: '/about' },
        { title: 'Teknologi Modern', desc: 'Mikrokontroler canggih untuk fluktuasi iklim', url: '/about' },
        { title: 'Presisi Tinggi', desc: 'Toleransi kesalahan suhu kurang dari 0.1°C', url: '/about' },
        { title: 'Otomatisasi Penuh', desc: 'Rotasi perlahan tanpa getaran', url: '/about' },
        { title: 'Email Support', desc: 'smart.egg.incubator@gmail.com', url: '/kontak' },
        { title: 'WhatsApp Response', desc: '+62 838-3881-7560', url: '/kontak' }
    ];

    function setupSearch(inputId, resultsId, itemsId, seeMoreId, hiddenCountId, emptyId) {
        const input = document.getElementById(inputId);
        const results = document.getElementById(resultsId);
        const items = document.getElementById(itemsId);
        const seeMore = document.getElementById(seeMoreId);
        const hiddenCount = document.getElementById(hiddenCountId);
        const empty = document.getElementById(emptyId);

        if (!input || !results) return;

        let isShowingAll = false;
        let currentMatches = [];

        function renderResults(matches, showAll = false) {
            items.innerHTML = '';
            const limit = showAll ? matches.length : Math.min(5, matches.length);
            
            for (let i = 0; i < limit; i++) {
                const item = matches[i];
                const a = document.createElement('a');
                a.href = item.url;
                a.className = 'block px-4 py-3 border-b border-slate-100 dark:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors last:border-0';
                a.innerHTML = `
                    <div class="text-sm font-medium text-black dark:text-slate-200">${item.title}</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">${item.desc}</div>
                `;
                items.appendChild(a);
            }

            if (matches.length > 5 && !showAll) {
                seeMore.classList.remove('hidden');
                hiddenCount.textContent = matches.length - 5;
            } else {
                seeMore.classList.add('hidden');
            }

            if (matches.length === 0) {
                empty.classList.remove('hidden');
            } else {
                empty.classList.add('hidden');
            }
        }

        input.addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase().trim();
            isShowingAll = false;
            
            if (query.length === 0) {
                results.classList.add('hidden');
                results.classList.remove('flex');
                return;
            }

            currentMatches = searchData.filter(item => 
                item.title.toLowerCase().includes(query) || 
                item.desc.toLowerCase().includes(query)
            );

            renderResults(currentMatches, false);
            results.classList.remove('hidden');
            results.classList.add('flex');
        });

        if (seeMore) {
            seeMore.addEventListener('click', function(e) {
                e.preventDefault();
                isShowingAll = true;
                renderResults(currentMatches, true);
            });
        }

        document.addEventListener('click', function(e) {
            if (!input.contains(e.target) && !results.contains(e.target)) {
                results.classList.add('hidden');
                results.classList.remove('flex');
            }
        });
        
        input.addEventListener('focus', function(e) {
            if (e.target.value.trim().length > 0) {
                results.classList.remove('hidden');
                results.classList.add('flex');
            }
        });
    }

    setupSearch('searchInput', 'searchResults', 'searchItems', 'searchSeeMore', 'searchHiddenCount', 'searchEmpty');
    setupSearch('mobileSearchInput', 'mobileSearchResults', 'mobileSearchItems', 'mobileSearchSeeMore', 'mobileSearchHiddenCount', 'mobileSearchEmpty');
});
</script>
