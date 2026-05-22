@extends('layouts.main')

@section('content')
<div class="max-w-6xl mx-auto py-6 sm:py-10 animate-fade-in-up">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6 sm:mb-10 px-1 sm:px-2 md:px-0">
        <div>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black dark:text-white mb-2 transition-colors">Example of Direct Monitoring</h1>
            <p class="text-slate-600 dark:text-slate-400 text-sm md:text-base transition-colors">Pantau kondisi inkubator Anda secara real-time dari mana saja.</p>
        </div>
        <div class="flex items-center self-start md:self-auto gap-2 bg-blue-50 dark:bg-blue-500/10 border border-blue-200 dark:border-blue-500/20 px-4 py-2 rounded-full transition-colors">
            <span class="relative flex h-3 w-3">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 dark:bg-blue-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500 dark:bg-blue-500"></span>
            </span>
            <span class="text-blue-700 dark:text-blue-400 text-xs md:text-sm font-medium">Terhubung via IoT</span>
        </div>
    </div>

    <!-- Main Dashboard Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
        
        <!-- Suhu (Besar, Kolom 1-2 di desktop) -->
        <div class="lg:col-span-2 bg-white dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-slate-700/50 rounded-2xl sm:rounded-3xl p-5 sm:p-6 md:p-8 relative overflow-hidden flex flex-col justify-between group hover:border-orange-300 dark:hover:border-orange-500/30 shadow-sm hover:shadow-[0_10px_30px_rgba(249,115,22,0.05)] dark:hover:shadow-none transition-all duration-300">
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-orange-50 dark:bg-orange-500/10 rounded-full blur-3xl group-hover:bg-orange-100 dark:group-hover:bg-orange-500/20 transition-all duration-700"></div>
            
            <div class="flex justify-between items-start mb-8 sm:mb-12 relative z-10">
                <div>
                    <h2 class="text-base md:text-lg text-black dark:text-slate-300 font-medium mb-1 transition-colors">Temperatur Inkubator</h2>
                    <p class="text-xs md:text-sm text-slate-500 transition-colors">Target optimal: 37.5°C - 38.0°C</p>
                </div>
                <div class="p-3 bg-orange-50 dark:bg-orange-500/10 rounded-2xl border border-orange-100 dark:border-orange-500/20 transition-colors">
                    <svg class="w-6 h-6 md:w-8 md:h-8 text-orange-500 dark:text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>

            <div class="relative z-10">
                <div class="flex items-baseline gap-2 mb-4">
                    <span class="text-5xl sm:text-6xl md:text-8xl font-bold text-black dark:text-white tracking-tighter transition-colors">37.8</span>
                    <span class="text-2xl md:text-4xl font-medium text-slate-500 dark:text-slate-500 transition-colors">°C</span>
                </div>
                
                <!-- Grafik mock -->
                <div class="h-20 md:h-24 w-full mt-6 flex items-end gap-1 opacity-80">
                    @for($i = 0; $i < 30; $i++)
                        @php $height = rand(60, 95); @endphp
                        <div class="flex-1 bg-gradient-to-t from-orange-600/50 to-orange-400 rounded-t-sm hover:opacity-100 transition-opacity" style="height: {{ $height }}%"></div>
                    @endfor
                </div>
                <div class="flex justify-between text-xs text-slate-500 mt-2">
                    <span>1 Jam lalu</span>
                    <span>Sekarang</span>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan (Desktop) / Kolom Bawah (Mobile) -->
        <div class="flex flex-col gap-4 sm:gap-6 md:gap-8">
            
            <!-- Kelembaban -->
            <div class="flex-1 bg-white dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-slate-700/50 rounded-2xl sm:rounded-3xl p-5 sm:p-6 relative overflow-hidden group hover:border-blue-300 dark:hover:border-blue-500/30 shadow-sm hover:shadow-[0_10px_30px_rgba(59,130,246,0.05)] dark:hover:shadow-none transition-all duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 dark:bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-100 dark:group-hover:bg-blue-500/20 transition-all duration-700"></div>
                
                <div class="flex items-center gap-3 mb-4 relative z-10">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-500/20 flex items-center justify-center border border-transparent dark:border-blue-500/20 transition-colors">
                        <svg class="w-5 h-5 text-blue-500 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-black dark:text-slate-300 font-medium transition-colors">Kelembaban</h2>
                        <p class="text-xs text-slate-500 transition-colors">Target: 55% - 60%</p>
                    </div>
                </div>
                
                <div class="relative z-10 mt-6">
                    <div class="flex items-baseline gap-1">
                        <span class="text-5xl md:text-6xl font-bold text-black dark:text-white tracking-tight transition-colors">62</span>
                        <span class="text-xl text-slate-500 transition-colors">%</span>
                    </div>
                    <div class="mt-4 w-full bg-slate-800 h-2 rounded-full overflow-hidden">
                        <div class="bg-blue-500 h-full rounded-full relative" style="width: 62%">
                            <div class="absolute right-0 top-0 bottom-0 w-2 bg-white/50 blur-[2px]"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Pemutar & Ringkasan -->
            <div class="flex-1 bg-white dark:bg-gradient-to-br dark:from-blue-900/40 dark:to-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-blue-500/20 rounded-2xl sm:rounded-3xl p-5 sm:p-6 group hover:border-slate-300 dark:hover:border-blue-500/40 shadow-sm transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-black dark:text-slate-300 font-medium transition-colors">Sistem Pemutar Telur</h2>
                    <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-500/10 px-2 py-1 rounded-md transition-colors">Aktif Otomatis</span>
                </div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-full border-[3px] border-slate-200 dark:border-blue-500/30 border-t-blue-500 dark:border-t-blue-400 animate-spin transition-colors"></div>
                    <div>
                        <p class="text-black dark:text-white font-bold text-lg transition-colors">Berputar</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 transition-colors">Interval: Setiap 3 Jam</p>
                    </div>
                </div>

                <div class="border-t border-slate-100 dark:border-slate-700/50 pt-4 mt-2 transition-colors">
                    <ul class="space-y-3">
                        <li class="flex justify-between items-center">
                            <span class="text-sm text-slate-600 dark:text-slate-400 transition-colors">Pemanas (Lampu)</span>
                            <span class="text-xs font-medium text-orange-600 dark:text-orange-400 bg-orange-50 dark:bg-orange-400/10 px-2 py-1 rounded transition-colors">Menyala</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span class="text-sm text-slate-600 dark:text-slate-400 transition-colors">Usia Inkubasi</span>
                            <span class="text-xs font-medium text-black dark:text-white bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded transition-colors">Hari ke-12 / 21</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection