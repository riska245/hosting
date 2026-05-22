@extends('layouts.main')

@section('content')
<div class="max-w-md mx-auto py-12 md:py-24 animate-fade-in-up px-4 md:px-0">
    
    <div class="bg-white dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-slate-700/50 rounded-[2rem] p-8 md:p-10 shadow-sm dark:shadow-none relative overflow-hidden">
        <!-- Background decorative glow with gold/amber tone for admin portal -->
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-amber-50 dark:bg-amber-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-yellow-50 dark:bg-yellow-500/10 rounded-full blur-3xl"></div>
        
        @if(session('error'))
            <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl text-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="text-center mb-10">
            <div class="w-16 h-16 rounded-full bg-amber-50 dark:bg-slate-800 flex items-center justify-center border border-amber-100 dark:border-slate-700 mx-auto mb-4">
                <span class="text-3xl">🛠️</span>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-black dark:text-white mb-2 transition-colors">Portal Admin</h1>
            <p class="text-slate-600 dark:text-slate-400 text-sm transition-colors">Masuk sebagai administrator sistem.</p>
        </div>

        <!-- Login Form -->
        <form action="/admin" method="POST" autocomplete="off" class="space-y-6">         
            @csrf
            
            <!-- Username atau Email -->
            <div>
                <label for="username_or_email" class="block text-sm font-medium text-black dark:text-slate-300 mb-2 transition-colors">Username atau Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input type="text" id="username_or_email" name="username_or_email" autocomplete="off" required placeholder="Masukkan username atau email" value="{{ old('username_or_email') }}" class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl text-black dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 dark:focus:ring-amber-500/50 dark:focus:border-amber-500 transition-all">
                </div>
                @error('username_or_email')
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
                    <input type="password" id="password" name="password" autocomplete="new-password" required placeholder="Masukkan password" class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl text-black dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 dark:focus:ring-amber-500/50 dark:focus:border-amber-500 transition-all">
                </div>
                @error('password')
                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full py-3.5 px-4 mt-8 rounded-xl bg-amber-600 dark:bg-amber-600 text-white font-bold hover:bg-amber-700 dark:hover:bg-amber-500 hover:shadow-[0_0_20px_rgba(217,119,6,0.3)] dark:hover:shadow-[0_0_20px_rgba(245,158,11,0.3)] transition-all transform hover:-translate-y-0.5 border border-transparent flex justify-center items-center gap-2">
                Masuk Admin
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </form>
    </div>
</div>
@endsection
