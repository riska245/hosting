@extends('layouts.main')

@section('content')
<div class="max-w-md mx-auto py-12 md:py-24 animate-fade-in-up px-4 md:px-0">
    
    <div class="bg-white dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-slate-700/50 rounded-[2rem] p-8 md:p-10 shadow-sm dark:shadow-none relative overflow-hidden">
        <!-- Background decorative glow -->
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-50 dark:bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-yellow-50 dark:bg-blue-500/10 rounded-full blur-3xl"></div>
        
        @if(session('error'))
            <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl text-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="text-center mb-10">
            <div class="w-16 h-16 rounded-full bg-blue-50 dark:bg-slate-800 flex items-center justify-center border border-blue-100 dark:border-slate-700 mx-auto mb-4">
                <span class="text-3xl">📝</span>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-black dark:text-white mb-2 transition-colors">Daftar Akun Baru</h1>
            <p class="text-slate-600 dark:text-slate-400 text-sm transition-colors">Buat akun untuk mulai memantau inkubator Anda.</p>
        </div>

        <!-- Registration Form -->
        <form action="/register" method="POST" autocomplete="off" class="space-y-6">         
            @csrf
            
            <!-- Nama / Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-black dark:text-slate-300 mb-2 transition-colors">Nama / Username</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input type="text" id="username" name="username" autocomplete="off" required placeholder="Masukkan nama atau username" value="{{ old('username') }}" class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl text-black dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 dark:focus:ring-blue-500/50 dark:focus:border-blue-500 transition-all">
                </div>
                @error('username')
                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-black dark:text-slate-300 mb-2 transition-colors">Email Pengguna</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <input type="email" id="email" name="email" autocomplete="off" required placeholder="contoh@gmail.com" value="{{ old('email') }}" class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl text-black dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 dark:focus:ring-blue-500/50 dark:focus:border-blue-500 transition-all">
                </div>
                @error('email')
                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nomor Inkubator -->
            <div>
                <label for="incubator_code" class="block text-sm font-medium text-black dark:text-slate-300 mb-2 transition-colors">Nomor Inkubator</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <input type="text" id="incubator_code" name="incubator_code" autocomplete="off" required placeholder="Contoh: INC-001X" value="{{ old('incubator_code') }}" class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl text-black dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 dark:focus:ring-blue-500/50 dark:focus:border-blue-500 transition-all">
                </div>
                @error('incubator_code')
                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-black dark:text-slate-300 mb-2 transition-colors">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input type="password" id="password" name="password" autocomplete="new-password" required placeholder="Masukkan password" class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl text-black dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 dark:focus:ring-blue-500/50 dark:focus:border-blue-500 transition-all">
                </div>
                @error('password')
                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full py-3.5 px-4 mt-8 rounded-xl bg-blue-600 dark:bg-blue-600 text-white font-bold hover:bg-blue-700 dark:hover:bg-blue-500 hover:shadow-[0_0_20px_rgba(37,99,235,0.3)] dark:hover:shadow-[0_0_20px_rgba(59,130,246,0.3)] transition-all transform hover:-translate-y-0.5 border border-transparent flex justify-center items-center gap-2">
                Daftar Sekarang
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </button>
        </form>
    </div>
    
    <div class="text-center mt-8">
        <p class="text-slate-500 dark:text-slate-400 text-sm">
            Sudah memiliki akun? <br class="md:hidden">
            <a href="/login" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline">Masuk Di Sini</a>
        </p>
    </div>
</div>
@endsection
