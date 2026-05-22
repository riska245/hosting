@extends('layouts.main')

@section('content')
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
                    Developer dan perancang sistem inkubator telur otomatis
                </p>
            </div>

            <!-- GRID PROFIL-->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4 md:gap-6">

                <!-- Profil 1 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-3xl p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Naya.jpeg') }}" 
                        alt="Profile"
                        class="w-28 h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Inaya Nazmin Hendrawati
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Berfokus pada pengembangan website, dashboard monitoring, dan integrasi IoT untuk sistem inkubator pintar.
                    </p>

                    <a href="https://tiktok.com/@"
                        target="_blank"
                        class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-full bg-pink-500 hover:bg-pink-600 text-white text-sm transition">
                        Tiktok
                    </a>
                </div>

                <!-- Profil 2 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-3xl p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Wyldan.png') }}" 
                        alt="Profile"
                        class="w-28 h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Mochammad Wyldan
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Berfokus pada pengembangan website, dashboard monitoring, dan integrasi IoT untuk sistem inkubator pintar.
                    </p>

                    <a href="https://tiktok.com/@"
                        target="_blank"
                        class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-full bg-pink-500 hover:bg-pink-600 text-white text-sm transition">
                        Tiktok
                    </a>
                </div>

                <!-- Profil 3 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-3xl p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Yuna.png') }}" 
                        alt="Profile"
                        class="w-28 h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Naila Yuna Ramadhani
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Berfokus pada pengembangan website, dashboard monitoring, dan integrasi IoT untuk sistem inkubator pintar.
                    </p>

                    <a href="https://tiktok.com/@"
                        target="_blank"
                        class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-full bg-pink-500 hover:bg-pink-600 text-white text-sm transition">
                        Tiktok
                    </a>
                </div>

                <!-- Profil 4 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-3xl p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Rena.png') }}" 
                        alt="Profile"
                        class="w-28 h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Rena Msilikha Putri
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Berfokus pada pengembangan website, dashboard monitoring, dan integrasi IoT untuk sistem inkubator pintar.
                    </p>

                    <a href="https://tiktok.com/@"
                        target="_blank"
                        class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-full bg-pink-500 hover:bg-pink-600 text-white text-sm transition">
                        Tiktok
                    </a>
                </div>

                <!-- Profil 5 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-3xl p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Saida.png') }}" 
                        alt="Profile"
                        class="w-28 h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Saidatul Kholidiya
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Berfokus pada pengembangan website, dashboard monitoring, dan integrasi IoT untuk sistem inkubator pintar.
                    </p>

                    <a href="https://tiktok.com/@"
                        target="_blank"
                        class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-full bg-pink-500 hover:bg-pink-600 text-white text-sm transition">
                        Tiktok
                    </a>
                </div>

                <!-- Profil 5 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-3xl p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Seves.png') }}" 
                        alt="Profile"
                        class="w-28 h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Seves One Mahatma Phutra
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Maket dan Modul
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Berfokus pada pengembangan website, dashboard monitoring, dan integrasi IoT untuk sistem inkubator pintar.
                    </p>

                    <a href="https://tiktok.com/@"
                        target="_blank"
                        class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-full bg-pink-500 hover:bg-pink-600 text-white text-sm transition">
                        Tiktok
                    </a>
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
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4 md:gap-6">

                <!-- Profil 1 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-3xl p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Mufida.jpeg') }}" 
                        alt="Profile"
                        class="w-28 h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Mufida Lailatul Adkha
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Fullstack Developer
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Berfokus pada pengembangan website, dashboard monitoring, dan integrasi IoT untuk sistem inkubator pintar.
                    </p>

                    <a href="https://tiktok.com/@"
                        target="_blank"
                        class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-full bg-pink-500 hover:bg-pink-600 text-white text-sm transition">
                        Tiktok
                    </a>
                </div>

                <!-- Profil 5 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-3xl p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Olivia.jpeg') }}" 
                        alt="Profile"
                        class="w-28 h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Olivia Rista
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Fullstack Developer
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Berfokus pada pengembangan website, dashboard monitoring, dan integrasi IoT untuk sistem inkubator pintar.
                    </p>

                    <a href="https://tiktok.com/@"
                        target="_blank"
                        class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-full bg-pink-500 hover:bg-pink-600 text-white text-sm transition">
                        Tiktok
                    </a>
                </div>

                <!-- Profil 5 -->
                <div class="bg-white dark:bg-slate-800/50 rounded-3xl p-6 border border-slate-200 dark:border-slate-700/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 text-center">

                    <img 
                        src="{{ asset('images/Riska.jpeg') }}" 
                        alt="Profile"
                        class="w-28 h-28 mx-auto rounded-3xl object-cover shadow-lg mb-5"
                    >

                    <h3 class="text-xl font-bold text-black dark:text-white mt-3 mb-1 transition-colors">
                        Riska Ayu Wulandari
                    </h3>

                    <p class="text-blue-600 dark:text-slate-300 text-sm mb-4 transition-colors">
                        Fullstack Developer
                    </p>

                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed transition-colors">
                        Berfokus pada pengembangan website, dashboard monitoring, dan integrasi IoT untuk sistem inkubator pintar.
                    </p>

                    <a href="https://tiktok.com/@rae_ccccchc"
                        target="_blank"
                        class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-full bg-pink-500 hover:bg-pink-600 text-white text-sm transition">
                        Tiktok
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection