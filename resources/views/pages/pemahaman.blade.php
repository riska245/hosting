@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto py-6 sm:py-8 md:py-12 animate-fade-in-up px-2 sm:px-4 md:px-0">

    <div class="text-center mb-8 sm:mb-12 md:mb-16">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black dark:text-white mb-3 sm:mb-4 transition-colors">Pusat Edukasi Inkubasi</h1>
        <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-sm md:text-base transition-colors">Memahami prinsip dasar penetasan buatan untuk memaksimalkan rasio keberhasilan (hatchability) secara optimal.</p>
    </div>

    <div class="space-y-3 sm:space-y-4 md:space-y-6">
        
        <!-- Accordion Item 1 -->
        <div class="bg-white dark:bg-slate-900/40 border border-slate-200 dark:border-slate-800 rounded-xl sm:rounded-2xl p-4 sm:p-5 md:p-6 hover:bg-slate-50 dark:hover:bg-slate-800/40 transition-colors shadow-sm dark:shadow-none">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="w-10 h-10 sm:w-12 sm:h-12 shrink-0 rounded-lg sm:rounded-xl bg-orange-50 dark:bg-orange-500/20 text-orange-500 dark:text-orange-400 flex items-center justify-center font-bold text-lg sm:text-xl transition-colors">1</div>
                <div>
                    <h3 class="text-lg md:text-xl font-semibold text-black dark:text-white mb-2 transition-colors">Suhu Optimal (Temperatur)</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm md:text-base transition-colors">
                        Suhu adalah faktor paling krusial dalam keberhasilan penetasan. Suhu yang ideal untuk menetaskan telur ayam adalah berkisar antara <span class="text-orange-600 dark:text-orange-400 font-medium">37.5°C hingga 38.0°C</span>. Fluktuasi suhu yang drastis dapat menyebabkan embrio mati atau lahir cacat. Sistem cerdas kami menjamin suhu akan selalu terjaga ketat di dalam rentang tersebut.
                    </p>
                </div>
            </div>
        </div>

        <!-- Accordion Item 2 -->
        <div class="bg-white dark:bg-slate-900/40 border border-slate-200 dark:border-slate-800 rounded-xl sm:rounded-2xl p-4 sm:p-5 md:p-6 hover:bg-slate-50 dark:hover:bg-slate-800/40 transition-colors shadow-sm dark:shadow-none">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="w-10 h-10 sm:w-12 sm:h-12 shrink-0 rounded-lg sm:rounded-xl bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 flex items-center justify-center font-bold text-lg sm:text-xl transition-colors">2</div>
                <div>
                    <h3 class="text-lg md:text-xl font-semibold text-black dark:text-white mb-2 transition-colors">Kelembaban Udara (Humidity)</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm md:text-base transition-colors">
                        Kelembaban mempengaruhi tingkat penguapan air dari dalam kantong udara telur. Pada 18 hari pertama, kelembaban ideal adalah <span class="text-blue-600 dark:text-blue-400 font-medium">55% - 60%</span>. Pada 3 hari terakhir (masa penetasan / hatching phase), kelembaban harus dinaikkan menjadi <span class="text-blue-600 dark:text-blue-400 font-medium">65% - 70%</span> agar cangkang menjadi lebih rapuh dan anak ayam mudah keluar.
                    </p>
                </div>
            </div>
        </div>

        <!-- Accordion Item 3 -->
        <div class="bg-white dark:bg-slate-900/40 border border-slate-200 dark:border-slate-800 rounded-xl sm:rounded-2xl p-4 sm:p-5 md:p-6 hover:bg-slate-50 dark:hover:bg-slate-800/40 transition-colors shadow-sm dark:shadow-none">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="w-10 h-10 sm:w-12 sm:h-12 shrink-0 rounded-lg sm:rounded-xl bg-purple-50 dark:bg-purple-500/20 text-purple-600 dark:text-purple-400 flex items-center justify-center font-bold text-lg sm:text-xl transition-colors">3</div>
                <div>
                    <h3 class="text-lg md:text-xl font-semibold text-black dark:text-white mb-2 transition-colors">Pemutaran Rak Telur (Turning)</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm md:text-base transition-colors">
                        Embrio sangat berisiko menempel pada selaput cangkang jika telur dibiarkan statis. Secara alami, induk ayam memutar telurnya menggunakan paruh. Di inkubator pintar kami, sistem rak mekanis akan <span class="text-purple-600 dark:text-purple-400 font-medium">memutar telur secara otomatis</span> setiap beberapa jam dengan kemiringan 45 derajat secara konstan hingga usia 18 hari.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- Additional Guides Section -->
    <div class="mt-10 sm:mt-12 md:mt-16 text-center">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-black dark:text-white mb-5 sm:mb-6 transition-colors">Panduan Tambahan</h2>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-3 sm:gap-4">
            <a href="/panduan-penggunaan" class="inline-flex items-center justify-center px-5 sm:px-6 py-3 border border-slate-300 dark:border-slate-700 text-sm sm:text-base font-medium rounded-xl text-slate-700 dark:text-slate-200 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 shadow-sm transition-colors w-full sm:w-auto active:scale-[0.98]">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Panduan Kalibrasi
            </a>
            <a href="/panduan-penggunaan" class="inline-flex items-center justify-center px-5 sm:px-6 py-3 border border-slate-300 dark:border-slate-700 text-sm sm:text-base font-medium rounded-xl text-slate-700 dark:text-slate-200 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 shadow-sm transition-colors w-full sm:w-auto active:scale-[0.98]">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Panduan Penggunaan
            </a>
        </div>
    </div>

</div>
@endsection