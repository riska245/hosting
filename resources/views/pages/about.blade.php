@extends('layouts.main')

@section('content')
<style>
    .social-container {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 12px !important;
        margin-top: 20px !important;
    }

    .social-btn {
        width: 40px !important;
        height: 40px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        border-radius: 9999px !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.06) !important;
        text-decoration: none !important;
    }

    .social-btn:hover {
        transform: scale(1.1) !important;
    }

    /* TikTok - Light Mode (Black background, white icon) */
    .social-tiktok {
        background-color: #000000 !important;
        color: #ffffff !important;
        border: 1px solid #000000 !important;
    }
    .social-tiktok:hover {
        background-color: #27272a !important;
        border-color: #27272a !important;
    }
    .social-tiktok svg,
    .social-tiktok svg path {
        fill: #ffffff !important;
        color: #ffffff !important;
    }

    /* TikTok - Dark Mode (White background, black icon) */
    .dark .social-tiktok {
        background-color: #ffffff !important;
        color: #000000 !important;
        border: 1px solid #ffffff !important;
    }
    .dark .social-tiktok:hover {
        background-color: #e4e4e7 !important;
        border-color: #e4e4e7 !important;
    }
    .dark .social-tiktok svg,
    .dark .social-tiktok svg path {
        fill: #000000 !important;
        color: #000000 !important;
    }

    /* Instagram - Light & Dark Mode (Purple background, white icon) */
    .social-instagram {
        background-color: #9333ea !important; /* purple-600 */
        color: #ffffff !important;
        border: 1px solid #9333ea !important;
    }
    .social-instagram:hover {
        background-color: #7e22ce !important; /* purple-700 */
        border-color: #7e22ce !important;
    }
    .social-instagram svg,
    .social-instagram svg path {
        fill: #ffffff !important;
        color: #ffffff !important;
    }

    /* Ensure SVGs inside are sized correctly */
    .social-btn svg {
        width: 20px !important;
        height: 20px !important;
        display: block !important;
    }
</style>
<div class="max-w-6xl mx-auto py-6 sm:py-8 md:py-12 animate-fade-in-up px-2 sm:px-4 md:px-0">

    <!-- Judul Tentang Inkubator -->
    <div class="mb-6 text-left">
        <h1 class="text-2xl sm:text-3xl md:text-5xl font-bold text-black dark:text-white mb-3 sm:mb-4 transition-colors">
            Tentang Inkubator
        </h1>
        <div class="h-1 w-20 bg-gradient-to-r from-blue-500 dark:from-slate-400 to-transparent rounded-full"></div>
    </div>

    <!-- Main About Box - Inkubator -->
    <div class="bg-white/80 dark:bg-slate-900/50 backdrop-blur-lg border border-slate-200 dark:border-slate-800 rounded-2xl sm:rounded-[2rem] p-5 sm:p-6 md:p-8 relative overflow-hidden mb-10 sm:mb-14 shadow-sm transition-colors">

        <!-- Dekorasi -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-blue-500/10 dark:bg-slate-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10">

            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-blue-50 dark:bg-slate-800 flex items-center justify-center border border-blue-100 dark:border-slate-700 transition-colors">
                    <span class="text-2xl">🥚</span>
                </div>

                <h2 class="text-xl md:text-2xl font-semibold text-black dark:text-white transition-colors">
                    Visi & Misi Kami
                </h2>
            </div>

            <p class="text-slate-600 dark:text-slate-300 text-base md:text-lg leading-relaxed mb-6 transition-colors">
                Inkubator telur ayam kami adalah solusi teknologi yang menjembatani peternakan tradisional dengan era digital cerdas. Kami merancang alat penetas telur dengan kendali suhu dan kelembaban tingkat presisi tinggi untuk meminimalisir angka kegagalan penetasan yang sering dialami oleh peternak konvensional.
            </p>

            <!-- Box Teknologi -->
            <div class="p-5 md:p-6 rounded-2xl bg-blue-50/50 dark:bg-slate-800/40 border border-blue-100 dark:border-slate-700/50 mb-8 border-l-4 border-l-blue-500 dark:border-l-slate-400 transition-colors">

                <h3 class="text-black dark:text-white font-medium mb-2 transition-colors">
                    Teknologi Modern Di Balik Layar
                </h3>

                <p class="text-sm md:text-base text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                    Inkubator pintar kami menggunakan mikrokontroler canggih untuk memantau fluktuasi iklim mikro secara presisi. Sistem pemanas proporsional dan sirkulasi udara terkontrol memastikan setiap telur menerima kondisi lingkungan yang persis seragam.
                </p>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 md:gap-6">

                <div class="bg-white dark:bg-slate-800/50 rounded-2xl p-6 border border-slate-200 dark:border-slate-700/50 hover:border-blue-300 dark:hover:border-slate-500 hover:shadow-md dark:hover:bg-slate-800 transition-all">

                    <h3 class="text-blue-600 dark:text-white font-medium mb-2 text-lg transition-colors">
                        Sistem Presisi
                    </h3>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Sensor canggih memantau perubahan lingkungan mikro dengan toleransi kesalahan suhu kurang dari 0.1°C dan kelembaban 1%.
                    </p>
                </div>

                <div class="bg-white dark:bg-slate-800/50 rounded-2xl p-6 border border-slate-200 dark:border-slate-700/50 hover:border-yellow-300 dark:hover:border-slate-500 hover:shadow-md dark:hover:bg-slate-800 transition-all">

                    <h3 class="text-yellow-600 dark:text-white font-medium mb-2 text-lg transition-colors">
                        Sistem Otomatisasi
                    </h3>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Motor pemutar rak terkalibrasi melakukan rotasi secara perlahan tanpa getaran berarti.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- Judul Tentang Kami -->
    <div class="mt-16 mb-6 text-left">
        <h1 class="text-2xl sm:text-3xl md:text-5xl font-bold text-black dark:text-white mb-3 sm:mb-4 transition-colors">
            Tentang Kami
        </h1>

        <div class="h-1 w-20 bg-gradient-to-r from-blue-500 dark:from-slate-400 to-transparent rounded-full"></div>
    </div>

    <!-- Main About Box - Tim Modul dan Maket -->
    <div class="bg-white/80 dark:bg-slate-900/50 backdrop-blur-lg border border-slate-200 dark:border-slate-800 rounded-2xl sm:rounded-[2rem] p-5 sm:p-6 md:p-8 relative overflow-hidden mb-10 sm:mb-12 shadow-sm transition-colors">

        <!-- Dekorasi -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-blue-500/10 dark:bg-slate-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10">

            <div class="mb-10 text-center">
                <h2 class="text-3xl font-bold text-black dark:text-white mb-3 transition-colors">
                    Tim Modul dan Maket
                </h2>

                <p class="text-slate-600 dark:text-slate-400 transition-colors">
                    Pengadaan dan perancang produk sistem inkubator 
                </p>
            </div>

            <!-- GRID PROFIL-->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">

                <!-- Profil 1 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-2xl p-5 sm:p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Naya.jpeg') }}" 
                        alt="Profile"
                        class="w-24 h-24 sm:w-28 sm:h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Inaya Nazmin Hendrawati
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        laporan dan memoles maket
                    </p>

                    <div class="social-container">
                        <!-- TikTok -->
                        <a href="https://tiktok.com/@nmnay44"
                           target="_blank"
                           class="social-btn social-tiktok"
                           title="TikTok">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.68h-3.227v12.93a2.896 2.896 0 1 1-2.896-2.896c.298 0 .586.045.857.127V8.9a6.122 6.122 0 0 0-.857-.061A6.123 6.123 0 1 0 15.82 14.96V8.356a8.018 8.018 0 0 0 4.68 1.49V6.686h-.911z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com/dnayanaz"
                           target="_blank"
                           class="social-btn social-instagram"
                           title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5A1.25 1.25 0 0 0 16.5 5zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6a3 3 0 0 1 0-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Profil 2 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-2xl p-5 sm:p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Wyldan.png') }}" 
                        alt="Profile"
                        class="w-24 h-24 sm:w-28 sm:h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Mochammad Wyldan Dafriansyah
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Pembuatan maket dan perakitan alat
                    </p>

                    <div class="social-container">
                        <!-- TikTok -->
                        <a href="https://tiktok.com/@mh18047"
                           target="_blank"
                           class="social-btn social-tiktok"
                           title="TikTok">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.68h-3.227v12.93a2.896 2.896 0 1 1-2.896-2.896c.298 0 .586.045.857.127V8.9a6.122 6.122 0 0 0-.857-.061A6.123 6.123 0 1 0 15.82 14.96V8.356a8.018 8.018 0 0 0 4.68 1.49V6.686h-.911z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com/wildanfriansyah"
                           target="_blank"
                           class="social-btn social-instagram"
                           title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5A1.25 1.25 0 0 0 16.5 5zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6a3 3 0 0 1 0-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Profil 3 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-2xl p-5 sm:p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Yuna.png') }}" 
                        alt="Profile"
                        class="w-24 h-24 sm:w-28 sm:h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Naila Yuna Ramadhani
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Pengadaan alat dan laporan 
                    </p>

                    <div class="social-container">
                        <!-- TikTok -->
                        <a href="https://tiktok.com/@you.na15"
                           target="_blank"
                           class="social-btn social-tiktok"
                           title="TikTok">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.68h-3.227v12.93a2.896 2.896 0 1 1-2.896-2.896c.298 0 .586.045.857.127V8.9a6.122 6.122 0 0 0-.857-.061A6.123 6.123 0 1 0 15.82 14.96V8.356a8.018 8.018 0 0 0 4.68 1.49V6.686h-.911z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com/you_na.189."
                           target="_blank"
                           class="social-btn social-instagram"
                           title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5A1.25 1.25 0 0 0 16.5 5zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6a3 3 0 0 1 0-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Profil 4 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-2xl p-5 sm:p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Rena.png') }}" 
                        alt="Profile"
                        class="w-24 h-24 sm:w-28 sm:h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Rena Msilikha Putri
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Projek manager dan perakitan alat
                    </p>

                    <div class="social-container">
                        <!-- TikTok -->
                        <a href="https://tiktok.com/@zooternana"
                           target="_blank"
                           class="social-btn social-tiktok"
                           title="TikTok">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.68h-3.227v12.93a2.896 2.896 0 1 1-2.896-2.896c.298 0 .586.045.857.127V8.9a6.122 6.122 0 0 0-.857-.061A6.123 6.123 0 1 0 15.82 14.96V8.356a8.018 8.018 0 0 0 4.68 1.49V6.686h-.911z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com/rna_naptr"
                           target="_blank"
                           class="social-btn social-instagram"
                           title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5A1.25 1.25 0 0 0 16.5 5zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6a3 3 0 0 1 0-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Profil 5 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-2xl p-5 sm:p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Saida.png') }}" 
                        alt="Profile"
                        class="w-24 h-24 sm:w-28 sm:h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Saidatul Kholidiya
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        IoT dan perakitan alat 
                    </p>

                    <div class="social-container">
                        <!-- TikTok -->
                        <a href="https://tiktok.com/@sweetchoco02_"
                           target="_blank"
                           class="social-btn social-tiktok"
                           title="TikTok">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.68h-3.227v12.93a2.896 2.896 0 1 1-2.896-2.896c.298 0 .586.045.857.127V8.9a6.122 6.122 0 0 0-.857-.061A6.123 6.123 0 1 0 15.82 14.96V8.356a8.018 8.018 0 0 0 4.68 1.49V6.686h-.911z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com/saidaaa.k"
                           target="_blank"
                           class="social-btn social-instagram"
                           title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5A1.25 1.25 0 0 0 16.5 5zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6a3 3 0 0 1 0-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Profil 5 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-2xl p-5 sm:p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Seves.png') }}" 
                        alt="Profile"
                        class="w-24 h-24 sm:w-28 sm:h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Seves One Mahatma Phutra
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Pengadaan alat dan laporan
                    </p>

                    <div class="social-container">
                        <!-- TikTok -->
                        <a href="https://tiktok.com/@pepe_sipepe"
                           target="_blank"
                           class="social-btn social-tiktok"
                           title="TikTok">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.68h-3.227v12.93a2.896 2.896 0 1 1-2.896-2.896c.298 0 .586.045.857.127V8.9a6.122 6.122 0 0 0-.857-.061A6.123 6.123 0 1 0 15.82 14.96V8.356a8.018 8.018 0 0 0 4.68 1.49V6.686h-.911z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com/phutraseves"
                           target="_blank"
                           class="social-btn social-instagram"
                           title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5A1.25 1.25 0 0 0 16.5 5zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6a3 3 0 0 1 0-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Dekorasi -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-blue-500/10 dark:bg-slate-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10">

            <div class="mt-4 mb-10 text-center">
                <h2 class="text-3xl font-bold text-black dark:text-white mb-3 transition-colors">
                    Tim Website
                </h2>

                <p class="text-slate-600 dark:text-slate-400 transition-colors">
                    Developer dan perancang sistem inkubator telur otomatis
                </p>
            </div>

            <!-- GRID PROFIL -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">

                <!-- Profil 1 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-2xl p-5 sm:p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Mufida.jpeg') }}" 
                        alt="Profile"
                        class="w-24 h-24 sm:w-28 sm:h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Mufida Lailatul Adkha
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Fullstack Developer
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Web dan promosi
                    </p>

                    <div class="social-container">
                        <!-- TikTok -->
                        <a href="https://instagram.com/moe_phi"
"
                           target="_blank"
                           class="social-btn social-instagram"
                           title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5A1.25 1.25 0 0 0 16.5 5zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6a3 3 0 0 1 0-6z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com/seutaslarik_"
                           target="_blank"
                           class="social-btn social-instagram"
                           title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5A1.25 1.25 0 0 0 16.5 5zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6a3 3 0 0 1 0-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Profil 5 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-2xl p-5 sm:p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Olivia.jpeg') }}" 
                        alt="Profile"
                        class="w-24 h-24 sm:w-28 sm:h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Olivia Rista
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Fullstack Developer
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Bendahara dan web
                    </p>

                    <div class="social-container">
                        <!-- TikTok -->
                        <a href="https://tiktok.com/@livlouf"
                           target="_blank"
                           class="social-btn social-tiktok"
                           title="TikTok">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.68h-3.227v12.93a2.896 2.896 0 1 1-2.896-2.896c.298 0 .586.045.857.127V8.9a6.122 6.122 0 0 0-.857-.061A6.123 6.123 0 1 0 15.82 14.96V8.356a8.018 8.018 0 0 0 4.68 1.49V6.686h-.911z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com/oliviaaa.r_"
                           target="_blank"
                           class="social-btn social-instagram"
                           title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5A1.25 1.25 0 0 0 16.5 5zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6a3 3 0 0 1 0-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Profil 5 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-2xl p-5 sm:p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Riska.jpeg') }}" 
                        alt="Profile"
                        class="w-24 h-24 sm:w-28 sm:h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Riska Ayu Wulandari
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Fullstack Developer
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Web dan promosi
                    </p>

                    <div class="social-container">
                        <!-- TikTok -->
                        <a href="https://tiktok.com/@rae_ccccchc"
                           target="_blank"
                           class="social-btn social-tiktok"
                           title="TikTok">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.68h-3.227v12.93a2.896 2.896 0 1 1-2.896-2.896c.298 0 .586.045.857.127V8.9a6.122 6.122 0 0 0-.857-.061A6.123 6.123 0 1 0 15.82 14.96V8.356a8.018 8.018 0 0 0 4.68 1.49V6.686h-.911z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com/"
                           target="_blank"
                           class="social-btn social-instagram"
                           title="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5A1.25 1.25 0 0 0 16.5 5zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6a3 3 0 0 1 0-6z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection