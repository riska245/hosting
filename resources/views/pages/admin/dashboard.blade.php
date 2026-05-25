@extends('layouts.main')

@section('content')
@if(session('success'))
    <div class="mb-6 bg-emerald-100 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-800 dark:text-emerald-400 px-4 py-3 rounded-xl text-sm flex items-center gap-2">
        <svg class="w-5 h-5 shrink-0 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="mb-6 bg-red-100 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 text-red-800 dark:text-red-400 px-4 py-3 rounded-xl text-sm flex items-center gap-2">
        <svg class="w-5 h-5 shrink-0 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        <span>{{ session('error') }}</span>
    </div>
@endif

<!-- Admin Header -->
<div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-4 sm:gap-6 mb-6 sm:mb-8 px-1 sm:px-2 md:px-0 mt-2 sm:mt-4">
    <div>
        <div class="flex flex-wrap items-center gap-2 sm:gap-3 mb-2">
            <h1 class="text-xl sm:text-2xl md:text-4xl font-bold text-black dark:text-white transition-colors">Admin Control Panel</h1>
            <span class="px-3 py-1 bg-purple-100 dark:bg-purple-500/20 text-purple-700 dark:text-purple-400 text-xs font-bold rounded-full border border-purple-200 dark:border-purple-500/30 flex items-center gap-1.5">
                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                ADMIN
            </span>
        </div>
        <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm md:text-base">Selamat datang, <span class="font-semibold text-slate-800 dark:text-slate-200">{{ Session::get('username') }}</span> | Terakhir diakses: <span class="font-medium text-slate-800 dark:text-slate-300">{{ now()->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB</span></p>
    </div>
</div>

<!-- Statistik Cards -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-6 px-1 sm:px-2 md:px-0 mb-6 sm:mb-8">
    <!-- Total Users -->
    <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 relative overflow-hidden group hover:border-blue-300 dark:hover:border-blue-500/30 transition-all">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 dark:bg-blue-500/10 rounded-full blur-2xl"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="p-2 bg-blue-100 dark:bg-blue-500/20 rounded-lg">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
            <h3 class="text-2xl sm:text-3xl font-bold text-black dark:text-white">{{ $totalUsers }}</h3>
            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1">Total Pengguna</p>
        </div>
    </div>
    <!-- Login Hari Ini -->
    <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 relative overflow-hidden group hover:border-green-300 dark:hover:border-green-500/30 transition-all">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-green-50 dark:bg-green-500/10 rounded-full blur-2xl"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="p-2 bg-green-100 dark:bg-green-500/20 rounded-lg">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                </div>
            </div>
            <h3 class="text-2xl sm:text-3xl font-bold text-black dark:text-white">{{ $todayLogins }}</h3>
            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1">Login Hari Ini</p>
        </div>
    </div>
    <!-- Total Inkubator -->
    <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 relative overflow-hidden group hover:border-orange-300 dark:hover:border-orange-500/30 transition-all">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-orange-50 dark:bg-orange-500/10 rounded-full blur-2xl"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="p-2 bg-orange-100 dark:bg-orange-500/20 rounded-lg">
                    <svg class="w-5 h-5 text-orange-600 dark:text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                </div>
            </div>
            <h3 class="text-2xl sm:text-3xl font-bold text-black dark:text-white">{{ $totalIncubators }}</h3>
            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1">Inkubator Aktif</p>
        </div>
    </div>
    <!-- Login Bulan Ini -->
    <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 relative overflow-hidden group hover:border-purple-300 dark:hover:border-purple-500/30 transition-all">
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-purple-50 dark:bg-purple-500/10 rounded-full blur-2xl"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-3">
                <div class="p-2 bg-purple-100 dark:bg-purple-500/20 rounded-lg">
                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <h3 class="text-2xl sm:text-3xl font-bold text-black dark:text-white">{{ $monthLogins }}</h3>
            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1">Login Bulan Ini</p>
        </div>
    </div>
</div>

<!-- Database Pengguna (Ringkasan) -->
<div class="px-1 sm:px-2 md:px-0 mb-6 sm:mb-8">
    <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-4 sm:p-6 transition-all duration-300">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
            <div>
                <h3 class="font-semibold text-black dark:text-white transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                    User Terdaftar
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Ringkasan data per pengguna terdaftar dan kondisi inkubator terbaru</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <span class="inline-flex items-center gap-1.5 text-xs text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7"/></svg>
                    {{ $totalUsers }} pengguna
                </span>
                <span class="inline-flex items-center gap-1.5 text-xs text-blue-600 dark:text-blue-300 bg-blue-50 dark:bg-blue-500/10 px-3 py-1.5 rounded-lg border border-blue-100 dark:border-blue-500/20">
                    Suhu & kelembapan: 3 menit
                </span>
                <span class="inline-flex items-center gap-1.5 text-xs text-amber-600 dark:text-amber-300 bg-amber-50 dark:bg-amber-500/10 px-3 py-1.5 rounded-lg border border-amber-100 dark:border-amber-500/20">
                    Pemutaran: 4 jam
                </span>
            </div>
        </div>

        <div class="overflow-x-auto -mx-4 sm:-mx-6 px-4 sm:px-6 custom-scrollbar">
            <table class="w-full min-w-[1000px]">
                <thead>
                    <tr class="border-b border-slate-200 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/30">
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider rounded-l-xl">No</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Username</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Email</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Kode Inkubator</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Suhu</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Kelembapan</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Pemutaran</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Update Sensor</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Total Login</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Login Terakhir</th>
                        <th class="text-center py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider rounded-r-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60">
                    @forelse($userSummary as $index => $user)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-3.5 px-4 text-sm text-slate-500 dark:text-slate-400 font-mono">{{ $index + 1 }}</td>
                        <td class="py-3.5 px-4">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white text-xs font-bold shrink-0">{{ strtoupper(substr($user->username, 0, 1)) }}</div>
                                <span class="text-sm font-semibold text-black dark:text-white">{{ $user->username }}</span>
                            </div>
                        </td>
                        <td class="py-3.5 px-4 text-sm text-slate-600 dark:text-slate-300">{{ $user->email ?? '-' }}</td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-mono font-medium bg-orange-100 dark:bg-orange-500/15 text-orange-700 dark:text-orange-300 border border-orange-200 dark:border-orange-500/20">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                                {{ $user->incubator_code ?? '-' }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4">
                            @if(!is_null($user->temperature))
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-semibold bg-orange-100 dark:bg-orange-500/15 text-orange-700 dark:text-orange-300 border border-orange-200 dark:border-orange-500/20">
                                    {{ number_format((float) $user->temperature, 1) }}&deg;C
                                </span>
                            @else
                                <span class="text-sm text-slate-400">Belum ada data</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4">
                            @if(!is_null($user->humidity))
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-100 dark:bg-blue-500/15 text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-500/20">
                                    {{ number_format((float) $user->humidity, 1) }}%
                                </span>
                            @else
                                <span class="text-sm text-slate-400">Belum ada data</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4">
                            @if($user->next_turn_at)
                                <div class="space-y-1">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium {{ $user->turning_is_due ? 'bg-red-100 dark:bg-red-500/15 text-red-700 dark:text-red-300 border border-red-200 dark:border-red-500/20' : 'bg-emerald-100 dark:bg-emerald-500/15 text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-500/20' }}">
                                        {{ $user->turning_is_due ? 'Perlu diputar' : ucfirst($user->turning_status) }}
                                    </span>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400">
                                        Berikutnya: {{ $user->next_turn_at->setTimezone('Asia/Jakarta')->format('H:i') }} WIB
                                    </p>
                                </div>
                            @else
                                <span class="text-sm text-slate-400">Belum ada data</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4">
                            @if($user->sensor_updated_at)
                                <div class="space-y-1">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium {{ $user->sensor_is_fresh ? 'bg-green-100 dark:bg-green-500/15 text-green-700 dark:text-green-300 border border-green-200 dark:border-green-500/20' : 'bg-yellow-100 dark:bg-yellow-500/15 text-yellow-700 dark:text-yellow-300 border border-yellow-200 dark:border-yellow-500/20' }}">
                                        {{ $user->sensor_is_fresh ? 'Terbaru 3 menit' : 'Lebih dari 3 menit' }}
                                    </span>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400">
                                        {{ $user->sensor_updated_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB
                                    </p>
                                </div>
                            @else
                                <span class="text-sm text-slate-400">Belum ada data</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-500/15 text-blue-700 dark:text-blue-300">{{ $user->total_login }}x</span>
                        </td>
                        <td class="py-3.5 px-4 text-sm text-slate-600 dark:text-slate-300">
                            @if($user->last_login)
                                {{ \Carbon\Carbon::parse($user->last_login)->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB
                            @else
                                -
                            @endif
                        </td>
                        <td class="py-3.5 px-4 text-sm text-center">
                            <form action="{{ url('/admin/delete-user/' . $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user {{ $user->username }} secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg text-xs font-semibold bg-red-100 hover:bg-red-200 dark:bg-red-500/10 dark:hover:bg-red-500/20 text-red-600 dark:text-red-400 transition-all active:scale-95">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" class="py-8 text-center text-sm text-slate-400 dark:text-slate-500">Belum ada pengguna yang terdaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Riwayat Login User -->
<div class="px-1 sm:px-2 md:px-0 mb-6 sm:mb-8">
    <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-4 sm:p-6 transition-all duration-300">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
            <div>
                <h3 class="font-semibold text-black dark:text-white transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Riwayat Login Pengguna
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Catatan setiap kali pengguna masuk ke sistem</p>
            </div>
            <span class="inline-flex items-center gap-1.5 text-xs text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                {{ $userLogins instanceof \Illuminate\Pagination\LengthAwarePaginator ? $userLogins->total() : $userLogins->count() }} catatan
            </span>
        </div>

        <div class="overflow-x-auto -mx-4 sm:-mx-6 px-4 sm:px-6 custom-scrollbar">
            <table class="w-full min-w-[720px]">
                <thead>
                    <tr class="border-b border-slate-200 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/30">
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider rounded-l-xl">No</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Username</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Kode Inkubator</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Waktu Masuk</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">IP Address</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider rounded-r-xl">Device</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60">
                    @forelse($userLogins as $index => $log)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-3.5 px-4 text-sm text-slate-500 dark:text-slate-400 font-mono">
                            {{ $userLogins instanceof \Illuminate\Pagination\LengthAwarePaginator ? ($userLogins->currentPage() - 1) * $userLogins->perPage() + $index + 1 : $index + 1 }}
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="text-sm font-semibold text-black dark:text-white">{{ $log->username }}</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-mono font-medium bg-orange-100 dark:bg-orange-500/15 text-orange-700 dark:text-orange-300 border border-orange-200 dark:border-orange-500/20">{{ $log->incubator_code ?? '-' }}</span>
                        </td>
                        <td class="py-3.5 px-4">
                            @if($log->login_at)
                            <div class="text-sm font-medium text-black dark:text-white">{{ \Carbon\Carbon::parse($log->login_at)->setTimezone('Asia/Jakarta')->format('d M Y') }}</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">{{ \Carbon\Carbon::parse($log->login_at)->setTimezone('Asia/Jakarta')->format('H:i:s') }} WIB</div>
                            @else
                            <span class="text-sm text-slate-400">-</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="text-xs font-mono text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">{{ $log->ip_address ?? '-' }}</span>
                        </td>
                        <td class="py-3.5 px-4">
                            @php
                                $ua = $log->user_agent ?? '';
                                if (str_contains($ua, 'Mobile')) $device = '📱 Mobile';
                                elseif (str_contains($ua, 'Windows')) $device = '💻 Windows';
                                elseif (str_contains($ua, 'Mac')) $device = '🖥️ Mac';
                                elseif (str_contains($ua, 'Linux')) $device = '🐧 Linux';
                                else $device = '🌐 Unknown';
                            @endphp
                            <span class="text-xs text-slate-600 dark:text-slate-400">{{ $device }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-sm text-slate-400 dark:text-slate-500">
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-10 h-10 text-slate-300 dark:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                Belum ada riwayat login pengguna.
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Controls -->
        @if($userLogins instanceof \Illuminate\Pagination\LengthAwarePaginator && $userLogins->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-6 pt-4 border-t border-slate-100 dark:border-slate-800/80">
                <!-- Info text -->
                <div class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 font-medium text-center sm:text-left">
                    Menampilkan <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $userLogins->firstItem() }}</span> 
                    sampai <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $userLogins->lastItem() }}</span> 
                    dari <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $userLogins->total() }}</span> catatan login
                </div>

                <!-- Navigation buttons -->
                <nav class="flex flex-wrap items-center justify-center sm:justify-start gap-1.5" aria-label="Pagination Navigasi">
                    <!-- Previous Button -->
                    @if($userLogins->onFirstPage())
                        <span class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-slate-400 dark:text-slate-600 bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-800 rounded-xl cursor-not-allowed select-none">
                            <svg class="w-4 h-4 mr-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            Sebelumnya
                        </span>
                    @else
                        <a href="{{ $userLogins->previousPageUrl() }}" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-200 active:scale-[0.97]">
                            <svg class="w-4 h-4 mr-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            Sebelumnya
                        </a>
                    @endif

                    <!-- Page Number Links -->
                    @php
                        $currentPage = $userLogins->currentPage();
                        $lastPage = $userLogins->lastPage();
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($lastPage, $currentPage + 2);
                    @endphp

                    @if($startPage > 1)
                        <a href="{{ $userLogins->url(1) }}" class="inline-flex items-center justify-center w-8 h-8 text-xs font-semibold text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 active:scale-[0.95]">1</a>
                        @if($startPage > 2)
                            <span class="px-1 text-xs text-slate-400 dark:text-slate-600 select-none">...</span>
                        @endif
                    @endif

                    @for($page = $startPage; $page <= $endPage; $page++)
                        @if($page == $currentPage)
                            <span class="inline-flex items-center justify-center w-8 h-8 text-xs font-bold text-white bg-blue-600 rounded-xl shadow-[0_4px_12px_rgba(37,99,235,0.25)] border border-blue-600 select-none">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $userLogins->url($page) }}" class="inline-flex items-center justify-center w-8 h-8 text-xs font-semibold text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 hover:border-slate-300 dark:hover:border-slate-700 transition-all duration-200 active:scale-[0.95]">
                                {{ $page }}
                            </a>
                        @endif
                    @endfor

                    @if($endPage < $lastPage)
                        @if($endPage < $lastPage - 1)
                            <span class="px-1 text-xs text-slate-400 dark:text-slate-600 select-none">...</span>
                        @endif
                        <a href="{{ $userLogins->url($lastPage) }}" class="inline-flex items-center justify-center w-8 h-8 text-xs font-semibold text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 active:scale-[0.95]">{{ $lastPage }}</a>
                    @endif

                    <!-- Next Button -->
                    @if($userLogins->hasMorePages())
                        <a href="{{ $userLogins->nextPageUrl() }}" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-200 active:scale-[0.97]">
                            Berikutnya
                            <svg class="w-4 h-4 ml-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    @else
                        <span class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-slate-400 dark:text-slate-600 bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-800 rounded-xl cursor-not-allowed select-none">
                            Berikutnya
                            <svg class="w-4 h-4 ml-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </span>
                    @endif
                </nav>
            </div>
        @endif
    </div>
</div>

<!-- Riwayat Aktivitas Admin -->
<div class="px-1 sm:px-2 md:px-0 mb-6 sm:mb-8">
    <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-4 sm:p-6 transition-all duration-300">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
            <div>
                <h3 class="font-semibold text-black dark:text-white transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    Riwayat Aktivitas Admin
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Catatan riwayat tindakan yang dilakukan oleh admin</p>
            </div>
            <span class="inline-flex items-center gap-1.5 text-xs text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                {{ $adminActivities instanceof \Illuminate\Pagination\LengthAwarePaginator ? $adminActivities->total() : $adminActivities->count() }} catatan
            </span>
        </div>

        <div class="overflow-x-auto -mx-4 sm:-mx-6 px-4 sm:px-6 custom-scrollbar">
            <table class="w-full min-w-[720px]">
                <thead>
                    <tr class="border-b border-slate-200 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/30">
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider rounded-l-xl">No</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Admin</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Aktivitas</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Detail</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Waktu</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">IP Address</th>
                        <th class="text-left py-3 px-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider rounded-r-xl">Device</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60">
                    @forelse($adminActivities as $index => $act)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="py-3.5 px-4 text-sm text-slate-500 dark:text-slate-400 font-mono">
                            {{ $adminActivities instanceof \Illuminate\Pagination\LengthAwarePaginator ? ($adminActivities->currentPage() - 1) * $adminActivities->perPage() + $index + 1 : $index + 1 }}
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="text-sm font-semibold text-black dark:text-white">{{ $act->username }}</span>
                        </td>
                        <td class="py-3.5 px-4">
                            @php
                                $badgeClass = 'bg-slate-100 dark:bg-slate-500/15 text-slate-700 dark:text-slate-300';
                                $actLabel = $act->activity;
                                if ($act->activity === 'login') {
                                    $badgeClass = 'bg-blue-100 dark:bg-blue-500/15 text-blue-700 dark:text-blue-300';
                                    $actLabel = '🔑 Login';
                                } elseif ($act->activity === 'logout') {
                                    $badgeClass = 'bg-slate-100 dark:bg-slate-500/15 text-slate-700 dark:text-slate-300';
                                    $actLabel = '🚪 Logout';
                                } elseif ($act->activity === 'delete_user') {
                                    $badgeClass = 'bg-red-100 dark:bg-red-500/15 text-red-700 dark:text-red-300';
                                    $actLabel = '🗑️ Hapus User';
                                }
                            @endphp
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-semibold {{ $badgeClass }}">
                                {{ $actLabel }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4 text-sm text-slate-600 dark:text-slate-300">
                            {{ $act->description }}
                        </td>
                        <td class="py-3.5 px-4">
                            @if($act->created_at)
                            <div class="text-sm font-medium text-black dark:text-white">{{ \Carbon\Carbon::parse($act->created_at)->setTimezone('Asia/Jakarta')->format('d M Y') }}</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">{{ \Carbon\Carbon::parse($act->created_at)->setTimezone('Asia/Jakarta')->format('H:i:s') }} WIB</div>
                            @else
                            <span class="text-sm text-slate-400">-</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="text-xs font-mono text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">{{ $act->ip_address ?? '-' }}</span>
                        </td>
                        <td class="py-3.5 px-4">
                            @php
                                $actUa = $act->user_agent ?? '';
                                if (str_contains($actUa, 'Mobile')) $actDevice = '📱 Mobile';
                                elseif (str_contains($actUa, 'Windows')) $actDevice = '💻 Windows';
                                elseif (str_contains($actUa, 'Mac')) $actDevice = '🖥️ Mac';
                                elseif (str_contains($actUa, 'Linux')) $actDevice = '🐧 Linux';
                                else $actDevice = '🌐 Unknown';
                            @endphp
                            <span class="text-xs text-slate-600 dark:text-slate-400">{{ $actDevice }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-8 text-center text-sm text-slate-400 dark:text-slate-500">
                            <div class="flex flex-col items-center gap-2">
                                <svg class="w-10 h-10 text-slate-300 dark:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                Belum ada riwayat aktivitas admin.
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Controls -->
        @if($adminActivities instanceof \Illuminate\Pagination\LengthAwarePaginator && $adminActivities->hasPages())
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-6 pt-4 border-t border-slate-100 dark:border-slate-800/80">
                <!-- Info text -->
                <div class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 font-medium text-center sm:text-left">
                    Menampilkan <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $adminActivities->firstItem() }}</span> 
                    sampai <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $adminActivities->lastItem() }}</span> 
                    dari <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $adminActivities->total() }}</span> catatan aktivitas
                </div>

                <!-- Navigation buttons -->
                <nav class="flex flex-wrap items-center justify-center sm:justify-start gap-1.5" aria-label="Pagination Navigasi Admin">
                    <!-- Previous Button -->
                    @if($adminActivities->onFirstPage())
                        <span class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-slate-400 dark:text-slate-600 bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-800 rounded-xl cursor-not-allowed select-none">
                            <svg class="w-4 h-4 mr-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            Sebelumnya
                        </span>
                    @else
                        <a href="{{ $adminActivities->previousPageUrl() }}" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-200 active:scale-[0.97]">
                            <svg class="w-4 h-4 mr-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            Sebelumnya
                        </a>
                    @endif

                    <!-- Page Number Links -->
                    @php
                        $actCurrentPage = $adminActivities->currentPage();
                        $actLastPage = $adminActivities->lastPage();
                        $actStartPage = max(1, $actCurrentPage - 2);
                        $actEndPage = min($actLastPage, $actCurrentPage + 2);
                    @endphp

                    @if($actStartPage > 1)
                        <a href="{{ $adminActivities->url(1) }}" class="inline-flex items-center justify-center w-8 h-8 text-xs font-semibold text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 active:scale-[0.95]">1</a>
                        @if($actStartPage > 2)
                            <span class="px-1 text-xs text-slate-400 dark:text-slate-600 select-none">...</span>
                        @endif
                    @endif

                    @for($page = $actStartPage; $page <= $actEndPage; $page++)
                        @if($page == $actCurrentPage)
                            <span class="inline-flex items-center justify-center w-8 h-8 text-xs font-bold text-white bg-blue-600 rounded-xl shadow-[0_4px_12px_rgba(37,99,235,0.25)] border border-blue-600 select-none">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $adminActivities->url($page) }}" class="inline-flex items-center justify-center w-8 h-8 text-xs font-semibold text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 hover:border-slate-300 dark:hover:border-slate-700 transition-all duration-200 active:scale-[0.95]">
                                {{ $page }}
                            </a>
                        @endif
                    @endfor

                    @if($actEndPage < $actLastPage)
                        @if($actEndPage < $actLastPage - 1)
                            <span class="px-1 text-xs text-slate-400 dark:text-slate-600 select-none">...</span>
                        @endif
                        <a href="{{ $adminActivities->url($actLastPage) }}" class="inline-flex items-center justify-center w-8 h-8 text-xs font-semibold text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 active:scale-[0.95]">{{ $actLastPage }}</a>
                    @endif

                    <!-- Next Button -->
                    @if($adminActivities->hasMorePages())
                        <a href="{{ $adminActivities->nextPageUrl() }}" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-200 active:scale-[0.97]">
                            Berikutnya
                            <svg class="w-4 h-4 ml-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    @else
                        <span class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-slate-400 dark:text-slate-600 bg-slate-50 dark:bg-slate-900/40 border border-slate-200 dark:border-slate-800 rounded-xl cursor-not-allowed select-none">
                            Berikutnya
                            <svg class="w-4 h-4 ml-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </span>
                    @endif
                </nav>
            </div>
        @endif
    </div>
</div>
@endsection
