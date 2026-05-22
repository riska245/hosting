@extends('layouts.main')

@section('content')
<!-- Dashboard Header -->
<div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-4 sm:gap-6 mb-6 sm:mb-8 px-1 sm:px-2 md:px-0 mt-2 sm:mt-4">
    <div>
        <div class="flex flex-wrap items-center gap-2 sm:gap-3 mb-2">
            <h1 class="text-xl sm:text-2xl md:text-4xl font-bold text-black dark:text-white transition-colors">Dashboard Kontrol Utama</h1>
            <span class="px-3 py-1 bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400 text-xs font-bold rounded-full border border-green-200 dark:border-green-500/30 flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                ONLINE
            </span>
        </div>
        <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm md:text-base">ID Perangkat: <span class="font-mono font-medium text-slate-800 dark:text-slate-300">{{ Session::get('incubator_code') ?? '-' }}</span> <span class="hidden sm:inline">|</span> <br class="sm:hidden">Terakhir sinkronisasi: <span class="font-medium text-slate-800 dark:text-slate-300">{{ isset($latestSensor) && $latestSensor ? $latestSensor->created_at->format('d M Y, H:i') . ' WIB' : 'Belum ada data' }}</span></p>
    </div>
    
    <div class="flex items-center gap-2 sm:gap-3 w-full lg:w-auto">
        <button class="flex-1 lg:flex-none px-3 sm:px-4 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors shadow-sm flex justify-center items-center gap-2 active:scale-[0.98]">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            Pengaturan Alat
        </button>
        <button id="toggle-data-table" class="flex-1 lg:flex-none px-3 sm:px-4 py-2.5 bg-blue-600 dark:bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors shadow-sm flex justify-center items-center gap-2 border border-transparent active:scale-[0.98]">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
            <span id="toggle-data-text">Lihat Data</span>
            <svg id="toggle-data-chevron" class="w-3.5 h-3.5 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
        </button>
    </div>
</div>

<!-- Grid Layout Utama -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 px-1 sm:px-2 md:px-0">
    
    <!-- Kolom Kiri: Metrik Real-time (Lebar 2/3 di Desktop) -->
    <div class="lg:col-span-2 flex flex-col gap-6 md:gap-8">
        
        <!-- Top Metrics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 md:gap-6">
            <!-- Suhu Akurat Card -->
            <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 relative overflow-hidden group hover:border-orange-300 dark:hover:border-orange-500/30 transition-all">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-orange-50 dark:bg-orange-500/10 rounded-full blur-2xl"></div>
                
                <div class="flex justify-between items-start mb-4 relative z-10">
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Temperatur Aktual</p>
                        <div class="flex items-baseline gap-2 mt-1">
                            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-black dark:text-white tracking-tight">{{ isset($latestSensor) && $latestSensor ? number_format((float) $latestSensor->temperature, 1) : '--' }}<span class="text-xl sm:text-2xl text-slate-400">&deg;C</span></h2>
                        </div>
                    </div>
                    <div class="p-2 bg-orange-100 dark:bg-orange-500/20 rounded-lg">
                        <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                </div>
                
                <div class="relative z-10 flex items-center justify-between text-sm">
                    @php
                        $tempTarget = 38.0;
                        $currentTemp = isset($latestSensor) ? (float)$latestSensor->temperature : null;
                        $tempDiff = $currentTemp !== null ? $currentTemp - $tempTarget : null;
                    @endphp
                    <span class="text-slate-600 dark:text-slate-400">Target: <span class="font-medium text-black dark:text-slate-200">{{ number_format($tempTarget, 1) }}°C</span></span>
                    @if($tempDiff !== null)
                        @php $absTempDiff = abs($tempDiff); @endphp
                        <span class="flex items-center {{ $absTempDiff <= 0.5 ? 'text-green-600 dark:text-green-400' : 'text-red-500' }} font-medium">
                            @if($tempDiff >= 0)
                                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                            @else
                                <svg class="w-4 h-4 mr-1 transform rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                            @endif
                            {{ number_format($absTempDiff, 2) }}°C
                        </span>
                    @else
                        <span class="text-slate-400">--</span>
                    @endif
                </div>
            </div>

            <!-- Kelembaban Akurat Card -->
            <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 relative overflow-hidden group hover:border-blue-300 dark:hover:border-blue-500/30 transition-all">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 dark:bg-blue-500/10 rounded-full blur-2xl"></div>
                
                <div class="flex justify-between items-start mb-4 relative z-10">
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Kelembaban Aktual</p>
                        <div class="flex items-baseline gap-2 mt-1">
                            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-black dark:text-white tracking-tight">{{ isset($latestSensor) && $latestSensor ? number_format((float) $latestSensor->humidity, 1) : '--' }}<span class="text-xl sm:text-2xl text-slate-400">%</span></h2>
                        </div>
                    </div>
                    <div class="p-2 bg-blue-100 dark:bg-blue-500/20 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" /></svg>
                    </div>
                </div>
                
                <div class="relative z-10 flex items-center justify-between text-sm">
                    @php
                        $humTarget = 60;
                        $currentHum = isset($latestSensor) ? (float)$latestSensor->humidity : null;
                        $humDiff = $currentHum !== null ? $currentHum - $humTarget : null;
                    @endphp
                    <span class="text-slate-600 dark:text-slate-400">Target: <span class="font-medium text-black dark:text-slate-200">{{ $humTarget }}%</span></span>
                    @if($humDiff !== null)
                        @php $absHumDiff = abs($humDiff); @endphp
                        <span class="flex items-center {{ $absHumDiff <= 5 ? 'text-green-600 dark:text-green-400' : 'text-red-500' }} font-medium">
                            @if($humDiff >= 0)
                                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                            @else
                                <svg class="w-4 h-4 mr-1 transform rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                            @endif
                            {{ number_format($absHumDiff, 1) }}%
                        </span>
                    @else
                        <span class="text-slate-400">--</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Grafik Historis -->
        <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 transition-all duration-300">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-semibold text-black dark:text-white transition-colors">Grafik Fluktuasi (24 Jam Terakhir)</h3>
                <select id="chart-filter" class="bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm rounded-lg px-3 py-1.5 text-slate-700 dark:text-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all cursor-pointer">
                    <option value="all">Suhu & Kelembaban</option>
                    <option value="suhu">Suhu Saja</option>
                    <option value="kelembaban">Kelembaban Saja</option>
                </select>
            </div>
            
            <div class="h-64 w-full relative border-b border-l border-slate-200 dark:border-slate-700 pt-4 pr-2 pb-2 pl-4">
                <div class="absolute inset-0 flex flex-col justify-between pl-4 pt-4 pb-2 border-transparent">
                    <div class="w-full h-px bg-slate-100 dark:bg-slate-800/50"></div>
                    <div class="w-full h-px bg-slate-100 dark:bg-slate-800/50"></div>
                    <div class="w-full h-px bg-slate-100 dark:bg-slate-800/50"></div>
                    <div class="w-full h-px bg-slate-100 dark:bg-slate-800/50"></div>
                </div>
                
                <div class="absolute left-0 top-0 bottom-0 flex flex-col justify-between text-[10px] text-slate-400 py-2 -ml-6">
                    <span>40°C</span>
                    <span>38°C</span>
                    <span>36°C</span>
                    <span>34°C</span>
                </div>
                
                <div class="w-full h-full relative z-10">
                    <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                        <linearGradient id="suhuGradient" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#f97316" stop-opacity="0.2"/>
                            <stop offset="100%" stop-color="#f97316" stop-opacity="0"/>
                        </linearGradient>
                        <path id="chart-area-suhu" d="M0,50 Q10,48 20,45 T40,50 T60,42 T80,48 T100,45 L100,100 L0,100 Z" fill="url(#suhuGradient)" style="transition: opacity 0.3s;" />
                        <path id="chart-line-suhu" d="M0,50 Q10,48 20,45 T40,50 T60,42 T80,48 T100,45" fill="none" stroke="#f97316" stroke-width="2" vector-effect="non-scaling-stroke" style="transition: opacity 0.3s;" />
                        <path id="chart-line-kelembaban" d="M0,70 Q15,75 30,65 T60,68 T85,60 T100,65" fill="none" stroke="#3b82f6" stroke-width="2" stroke-dasharray="4,4" vector-effect="non-scaling-stroke" style="transition: opacity 0.3s;" />
                    </svg>
                </div>
                
                <div class="absolute -bottom-6 left-4 right-0 flex justify-between text-[10px] text-slate-400">
                    <span>00:00</span>
                    <span>06:00</span>
                    <span>12:00</span>
                    <span>18:00</span>
                    <span>Sekarang</span>
                </div>
            </div>
            
            <div class="flex items-center justify-center gap-6 mt-8 text-xs">
                <div id="legend-suhu" class="flex items-center gap-2" style="transition: opacity 0.3s;">
                    <span class="w-3 h-3 rounded-full bg-orange-500"></span>
                    <span class="text-slate-600 dark:text-slate-400">Suhu (°C)</span>
                </div>
                <div id="legend-kelembaban" class="flex items-center gap-2" style="transition: opacity 0.3s;">
                    <span class="w-3 h-0.5 bg-blue-500 rounded-full border-t border-dashed border-blue-500"></span>
                    <span class="text-slate-600 dark:text-slate-400">Kelembaban (%)</span>
                </div>
            </div>
        </div>

    </div>
        
    <!-- Kolom Kanan: Info & Log Sistem -->
    <div class="flex flex-col gap-6 md:gap-8">
        
        <!-- Info Pemutaran Telur -->
        <div class="bg-gradient-to-br from-white via-amber-50/40 to-orange-50/60 dark:from-slate-900 dark:via-slate-900 dark:to-amber-950/30 backdrop-blur-md border border-amber-200/70 dark:border-amber-900/40 rounded-2xl p-5 sm:p-6 relative overflow-hidden group hover:border-amber-300 dark:hover:border-amber-600/50 transition-all shadow-sm">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-200/60 dark:bg-amber-500/10 rounded-full blur-2xl"></div>
            
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-semibold text-lg text-slate-950 dark:text-white">Pemutaran Rak Telur</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5">Otomatis (Tiap 4 Jam)</p>
                    </div>

                    @php
                        $turningStatus = isset($latestSensor) ? strtolower($latestSensor->turning_status) : 'menunggu';
                        $isRotating = in_array($turningStatus, ['berputar', 'rotating'], true);
                    @endphp
                    <div class="p-2 bg-amber-100 dark:bg-amber-500/15 rounded-lg ring-1 ring-amber-200/70 dark:ring-amber-400/20">
                        <svg class="w-6 h-6 text-amber-600 dark:text-amber-300 {{ $isRotating ? 'animate-spin' : '' }}" style="animation-duration: 8s;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                </div>
                
                <div class="space-y-4 mt-6">
                    <!-- Terakhir Diputar -->
                    <div class="flex items-center justify-between p-3 bg-white/75 dark:bg-slate-800/60 rounded-xl border border-slate-200/80 dark:border-slate-700/60">
                        <div>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Pemutaran Terakhir</p>
                            <p class="font-medium text-slate-950 dark:text-white mt-0.5">
                                {{ isset($latestSensor) && $latestSensor->turned_at ? $latestSensor->turned_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') . ' WIB' : 'Belum ada data' }}
                            </p>
                        </div>

                        @php
                            $statusLabel = 'Menunggu';
                            $badgeClass = 'bg-amber-100 dark:bg-amber-500/15 text-amber-700 dark:text-amber-300 ring-amber-200/70 dark:ring-amber-400/20';
                            
                            if ($isRotating) {
                                $statusLabel = 'Berputar';
                                $badgeClass = 'bg-blue-100 dark:bg-blue-500/15 text-blue-700 dark:text-blue-300 ring-blue-200/70 dark:ring-blue-400/20';
                            } elseif (in_array($turningStatus, ['selesai', 'completed', 'done', 'turned'], true)) {
                                $statusLabel = 'Selesai';
                                $badgeClass = 'bg-emerald-100 dark:bg-emerald-500/15 text-emerald-700 dark:text-emerald-300 ring-emerald-200/70 dark:ring-emerald-400/20';
                            }
                        @endphp
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium {{ $badgeClass }} ring-1">
                            <span class="w-1.5 h-1.5 rounded-full {{ $turningStatus === 'berputar' || $turningStatus === 'rotating' ? 'bg-blue-500 animate-ping' : ($turningStatus === 'selesai' || $turningStatus === 'completed' || $turningStatus === 'done' || $turningStatus === 'turned' ? 'bg-emerald-500' : 'bg-amber-500') }}"></span>
                            {{ $statusLabel }}
                        </span>
                    </div>
                    
                    <!-- Selanjutnya -->
                    @php
                        $nextTurn = isset($latestSensor) ? $latestSensor->next_turn_at : null;
                        $diffInMinutes = $nextTurn ? now()->diffInMinutes($nextTurn, false) : 0;
                        if ($diffInMinutes > 0) {
                            $hours = floor($diffInMinutes / 60);
                            $mins = $diffInMinutes % 60;
                            $dueLabel = $hours > 0 ? "± {$hours} Jam {$mins} Menit lagi" : "± {$mins} Menit lagi";
                            $progressPct = max(0, min(100, 100 - ($diffInMinutes / 240) * 100));
                        } else {
                            $dueLabel = $nextTurn ? 'Jadwal pemutaran tiba' : 'Belum dijadwalkan';
                            $progressPct = 100;
                        }
                    @endphp
                    <div class="flex flex-col p-3 bg-amber-100/75 dark:bg-amber-950/35 rounded-xl border border-amber-200 dark:border-amber-800/50">
                        <div class="flex justify-between items-center mb-2">
                            <p class="text-xs font-medium text-amber-800 dark:text-amber-200">Pemutaran Selanjutnya</p>
                            <span class="text-[10px] font-medium text-orange-600 dark:text-orange-300">{{ $dueLabel }}</span>
                        </div>

                        <p class="text-xl font-bold text-amber-950 dark:text-amber-50">
                            {{ $nextTurn ? $nextTurn->setTimezone('Asia/Jakarta')->format('H:i') : '--:--' }} <span class="text-sm font-normal text-amber-700 dark:text-amber-300">WIB</span>
                        </p>
                        
                        <div class="mt-3 w-full bg-amber-200 dark:bg-amber-900/60 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-gradient-to-r from-amber-500 to-orange-500 dark:from-amber-300 dark:to-orange-400 h-1.5 rounded-full relative" style="width: {{ $progressPct }}%">
                                <div class="absolute inset-0 bg-white/25 animate-pulse"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Log Sistem Terbaru -->
        <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 flex-grow transition-all duration-300">
            <div class="flex justify-between items-center mb-5">
                <h3 class="font-semibold text-black dark:text-white transition-colors">Log Sistem (Terbaru)</h3>
                <a href="#" class="text-xs font-medium text-blue-600 dark:text-blue-400 hover:underline transition-colors">Lihat Semua</a>
            </div>
            
            <div class="space-y-4">
                @forelse ($sensorHistory->take(4) as $log)
                    @php
                        $logTime = $log->created_at->setTimezone('Asia/Jakarta');
                        $logTimeFormatted = $logTime->isToday() 
                            ? 'Hari ini, ' . $logTime->format('H:i') . ' WIB' 
                            : ($logTime->isYesterday() ? 'Kemarin, ' . $logTime->format('H:i') . ' WIB' : $logTime->format('d M Y, H:i') . ' WIB');
                        
                        $logIcon = 'info';
                        $logBg = 'bg-blue-50 dark:bg-blue-500/10';
                        $logColor = 'text-blue-600 dark:text-blue-400';
                        
                        $temp = (float)$log->temperature;
                        $hum = (float)$log->humidity;
                        $turning = strtolower($log->turning_status);
                        $lamp = strtolower($log->lamp_status);

                        if ($temp > 38.5) {
                            $logIcon = 'warning';
                            $logBg = 'bg-orange-50 dark:bg-orange-500/10';
                            $logColor = 'text-orange-600 dark:text-orange-400';
                            $logMessage = "Peringatan: Suhu terdeteksi terlalu tinggi ({$temp}°C)";
                        } elseif ($temp < 37.0) {
                            $logIcon = 'warning';
                            $logBg = 'bg-red-50 dark:bg-red-500/10';
                            $logColor = 'text-red-600 dark:text-red-400';
                            $logMessage = "Peringatan: Suhu terdeteksi terlalu rendah ({$temp}°C)";
                        } elseif ($turning === 'berputar' || $turning === 'rotating') {
                            $logIcon = 'spin';
                            $logBg = 'bg-amber-50 dark:bg-amber-500/10';
                            $logColor = 'text-amber-600 dark:text-amber-400';
                            $logMessage = "Rak telur sedang diputar otomatis";
                        } elseif ($turning === 'selesai' || $turning === 'completed' || $turning === 'done' || $turning === 'turned') {
                            $logIcon = 'check';
                            $logBg = 'bg-green-50 dark:bg-green-500/10';
                            $logColor = 'text-green-600 dark:text-green-400';
                            $logMessage = "Rak telur berhasil diputar";
                        } elseif ($lamp === 'menyala' || $lamp === 'on') {
                            $logIcon = 'lamp';
                            $logBg = 'bg-orange-50 dark:bg-orange-500/10';
                            $logColor = 'text-orange-600 dark:text-orange-400';
                            $logMessage = "Pemanas (Lampu) diaktifkan otomatis";
                        } elseif ($lamp === 'mati' || $lamp === 'off') {
                            $logIcon = 'lamp-off';
                            $logBg = 'bg-slate-50 dark:bg-slate-500/10';
                            $logColor = 'text-slate-600 dark:text-slate-400';
                            $logMessage = "Pemanas (Lampu) dinonaktifkan otomatis";
                        } elseif ($hum > 65.0) {
                            $logIcon = 'warning';
                            $logBg = 'bg-blue-50 dark:bg-blue-500/10';
                            $logColor = 'text-blue-600 dark:text-blue-400';
                            $logMessage = "Peringatan: Kelembapan terdeteksi terlalu tinggi ({$hum}%)";
                        } elseif ($hum < 50.0) {
                            $logIcon = 'warning';
                            $logBg = 'bg-blue-50 dark:bg-blue-500/10';
                            $logColor = 'text-blue-600 dark:text-blue-400';
                            $logMessage = "Peringatan: Kelembapan terdeteksi terlalu rendah ({$hum}%)";
                        } else {
                            $logMessage = "Kondisi sistem stabil dan optimal.";
                        }
                    @endphp

                    <div class="flex gap-3">
                        <div class="w-8 h-8 rounded-full {{ $logBg }} flex items-center justify-center shrink-0 mt-0.5">
                            @if($logIcon === 'warning')
                                <svg class="w-4 h-4 {{ $logColor }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                            @elseif($logIcon === 'spin')
                                <svg class="w-4 h-4 {{ $logColor }} animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                            @elseif($logIcon === 'check')
                                <svg class="w-4 h-4 {{ $logColor }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            @elseif($logIcon === 'lamp' || $logIcon === 'lamp-off')
                                <svg class="w-4 h-4 {{ $logColor }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>
                            @else
                                <svg class="w-4 h-4 {{ $logColor }}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            @endif
                        </div>
                        <div>
                            <p class="text-sm font-medium text-black dark:text-slate-200">{{ $logMessage }}</p>
                            <p class="text-xs text-slate-500 mt-0.5">{{ $logTimeFormatted }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-slate-500 dark:text-slate-400 text-center py-4">Belum ada riwayat aktivitas sistem.</p>
                @endforelse
            </div>
        </div>
    </div>
        
</div>

<!-- Tabel Data Sensor -->
<div id="data-table-panel" class="hidden mt-6 sm:mt-8 px-1 sm:px-2 md:px-0 animate-fade-in-up">
    <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 transition-all duration-300">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
            <div>
                <h3 class="font-semibold text-black dark:text-white transition-colors">Riwayat Data Sensor</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">10 pembacaan terakhir dari perangkat</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 text-xs text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    Auto-refresh 30 detik
                </span>
            </div>
        </div>

        <div class="overflow-x-auto -mx-5 sm:-mx-6 px-5 sm:px-6">
            <table class="w-full min-w-[600px]">
                <thead>
                    <tr class="border-b border-slate-200 dark:border-slate-700/60">
                        <th class="text-left py-3 px-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">No</th>
                        <th class="text-left py-3 px-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Waktu</th>
                        <th class="text-left py-3 px-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Suhu</th>
                        <th class="text-left py-3 px-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Kelembapan</th>
                        <th class="text-left py-3 px-3 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60">
                    @forelse ($sensorHistory as $index => $history)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-3.5 px-3 text-sm text-slate-500 dark:text-slate-400 font-mono">{{ $index + 1 }}</td>
                        <td class="py-3.5 px-3">
                            @php
                                $histTime = $history->created_at->setTimezone('Asia/Jakarta');
                            @endphp
                            <div class="text-sm font-medium text-black dark:text-white">{{ $histTime->format('d M Y') }}</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">{{ $histTime->format('H:i') }} WIB</div>
                        </td>
                        <td class="py-3.5 px-3">
                            <span class="text-sm font-semibold text-black dark:text-white">{{ number_format($history->temperature, 2) }}°C</span>
                        </td>
                        <td class="py-3.5 px-3">
                            <span class="text-sm font-semibold text-black dark:text-white">{{ number_format($history->humidity, 1) }}%</span>
                        </td>
                        <td class="py-3.5 px-3">
                            @php
                                $temp = (float)$history->temperature;
                                $hum = (float)$history->humidity;
                                if ($temp > 38.5) {
                                    $statusClass = 'bg-red-600';
                                    $statusText = 'Terlalu Panas';
                                } elseif ($temp < 37.0) {
                                    $statusClass = 'bg-red-600';
                                    $statusText = 'Kurang Panas';
                                } elseif ($hum > 65.0) {
                                    $statusClass = 'bg-blue-600';
                                    $statusText = 'Terlalu Lembap';
                                } elseif ($hum < 50.0) {
                                    $statusClass = 'bg-blue-600';
                                    $statusText = 'Kurang Lembap';
                                } else {
                                    $statusClass = 'bg-green-600';
                                    $statusText = 'Optimal';
                                }
                            @endphp
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium {{ $statusClass }} text-white border border-transparent shadow-sm transition-transform duration-200 hover:scale-105">
                                <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                                {{ $statusText }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-sm text-slate-500 dark:text-slate-400">
                            Belum ada riwayat data sensor untuk perangkat ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 mt-5 pt-4 border-t border-slate-200 dark:border-slate-800/60">
            <p class="text-xs text-slate-500 dark:text-slate-400">Menampilkan <span class="font-medium text-black dark:text-white">{{ $sensorHistory->count() }}</span> data terbaru dari total <span class="font-medium text-black dark:text-white">{{ number_format($sensorCount) }}</span> catatan</p>
            <div class="flex items-center gap-1.5">
                <button class="px-3 py-1.5 text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">Sebelumnya</button>
                <button class="px-3 py-1.5 text-xs font-medium text-white bg-slate-900 dark:bg-white dark:text-slate-900 rounded-lg border border-transparent transition-colors">1</button>
                <button class="px-3 py-1.5 text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">2</button>
                <button class="px-3 py-1.5 text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">3</button>
                <button class="px-3 py-1.5 text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">Selanjutnya</button>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    const sensorDataHistory = @json($sensorHistory->reverse()->values()->map(function($item) {
        return [
            'time' => $item->created_at->setTimezone('Asia/Jakarta')->format('H:i'),
            'temp' => (float)$item->temperature,
            'hum' => (float)$item->humidity
        ];
    }));
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('toggle-data-table');
    const panel = document.getElementById('data-table-panel');
    const text = document.getElementById('toggle-data-text');
    const chevron = document.getElementById('toggle-data-chevron');

    if (btn && panel) {
        btn.addEventListener('click', () => {
            const isHidden = panel.classList.contains('hidden');
            panel.classList.toggle('hidden');
            text.textContent = isHidden ? 'Tutup Data' : 'Lihat Data';
            chevron.style.transform = isHidden ? 'rotate(180deg)' : '';
            if (isHidden) {
                panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    }

    // Render Dynamic SVG Chart
    const totalPoints = sensorDataHistory.length;
    const areaSuhu = document.getElementById('chart-area-suhu');
    const lineSuhu = document.getElementById('chart-line-suhu');
    const lineKelembaban = document.getElementById('chart-line-kelembaban');

    if (totalPoints > 1 && areaSuhu && lineSuhu && lineKelembaban) {
        const minTemp = 34;
        const maxTemp = 40;
        const minHum = 40;
        const maxHum = 80;

        let lineTempPoints = [];
        let areaTempPoints = [];
        let lineHumPoints = [];

        sensorDataHistory.forEach((point, i) => {
            const x = (i / (totalPoints - 1)) * 100;
            
            let tVal = point.temp;
            if (tVal < minTemp) tVal = minTemp;
            if (tVal > maxTemp) tVal = maxTemp;
            const yTemp = 100 - ((tVal - minTemp) / (maxTemp - minTemp)) * 100;
            lineTempPoints.push(`${x.toFixed(1)},${yTemp.toFixed(1)}`);
            areaTempPoints.push(`${x.toFixed(1)},${yTemp.toFixed(1)}`);

            let hVal = point.hum;
            if (hVal < minHum) hVal = minHum;
            if (hVal > maxHum) hVal = maxHum;
            const yHum = 100 - ((hVal - minHum) / (maxHum - minHum)) * 100;
            lineHumPoints.push(`${x.toFixed(1)},${yHum.toFixed(1)}`);
        });

        const pathLineTemp = "M" + lineTempPoints.join(" L");
        const pathAreaTemp = pathLineTemp + " L100,100 L0,100 Z";
        const pathLineHum = "M" + lineHumPoints.join(" L");

        lineSuhu.setAttribute('d', pathLineTemp);
        areaSuhu.setAttribute('d', pathAreaTemp);
        lineKelembaban.setAttribute('d', pathLineHum);

        const xLabelsContainer = document.querySelector('.absolute.-bottom-6.left-4.right-0');
        if (xLabelsContainer) {
            const labelIndexes = [
                0, 
                Math.floor(totalPoints * 0.25), 
                Math.floor(totalPoints * 0.5), 
                Math.floor(totalPoints * 0.75), 
                totalPoints - 1
            ];
            const labelHtml = labelIndexes.map(idx => `<span>${sensorDataHistory[idx] ? sensorDataHistory[idx].time : ''}</span>`).join('');
            xLabelsContainer.innerHTML = labelHtml;
        }
    } else if (totalPoints === 1 && areaSuhu && lineSuhu && lineKelembaban) {
        lineSuhu.setAttribute('d', 'M0,50 L100,50');
        areaSuhu.setAttribute('d', 'M0,50 L100,50 L100,100 L0,100 Z');
        lineKelembaban.setAttribute('d', 'M0,70 L100,70');
    } else if (areaSuhu && lineSuhu && lineKelembaban) {
        lineSuhu.setAttribute('d', '');
        areaSuhu.setAttribute('d', '');
        lineKelembaban.setAttribute('d', '');
    }

    const chartFilter = document.getElementById('chart-filter');
    const legendSuhu = document.getElementById('legend-suhu');
    const legendKelembaban = document.getElementById('legend-kelembaban');

    if (chartFilter && areaSuhu && lineSuhu && lineKelembaban) {
        chartFilter.addEventListener('change', (e) => {
            const val = e.target.value;
            if (val === 'all') {
                areaSuhu.style.opacity = '1';
                lineSuhu.style.opacity = '1';
                lineKelembaban.style.opacity = '1';
                if (legendSuhu) legendSuhu.style.opacity = '1';
                if (legendKelembaban) legendKelembaban.style.opacity = '1';
            } else if (val === 'suhu') {
                areaSuhu.style.opacity = '1';
                lineSuhu.style.opacity = '1';
                lineKelembaban.style.opacity = '0';
                if (legendSuhu) legendSuhu.style.opacity = '1';
                if (legendKelembaban) legendKelembaban.style.opacity = '0.3';
            } else if (val === 'kelembaban') {
                areaSuhu.style.opacity = '0';
                lineSuhu.style.opacity = '0';
                lineKelembaban.style.opacity = '1';
                if (legendSuhu) legendSuhu.style.opacity = '0.3';
                if (legendKelembaban) legendKelembaban.style.opacity = '1';
            }
        });
    }
});
</script>
@endsection
