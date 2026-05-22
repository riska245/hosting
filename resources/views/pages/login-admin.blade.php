@extends('layouts.main')

@section('content')

<div class="max-w-md mx-auto py-12 md:py-24 px-4">

    <div class="bg-white dark:bg-slate-900/60 border border-slate-200 dark:border-slate-700 rounded-[2rem] p-8 md:p-10 shadow-sm">

        <div class="text-center mb-10">

            <div class="text-center mb-10">

                <!-- Tombol kembali -->
                <a href="/login"
                class="inline-flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400 hover:underline mb-5">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Pilihan Login
                </a> 

            </div>

            <div class="w-16 h-16 rounded-full bg-yellow-100 dark:bg-yellow-500/10 flex items-center justify-center mx-auto mb-4">
                <span class="text-3xl">🛠️</span>
            </div>

            <h1 class="text-3xl font-bold text-black dark:text-white mb-2">
                Login Admin
            </h1>

            <p class="text-slate-600 dark:text-slate-400 text-sm">
                Masuk sebagai administrator sistem.
            </p>

        </div>

        @if(session('error'))
            <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login-admin-process" method="POST" class="space-y-6">

            @csrf

            <!-- Username -->
            <div>
                    <label for="username" class="block text-sm font-medium text-black dark:text-slate-300 mb-2 transition-colors">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="text" id="username" name="username" autocomplete="off" required placeholder="Masukkan username" class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl text-black dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 dark:focus:ring-blue-500/50 dark:focus:border-blue-500 transition-all">                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-black dark:text-slate-300 mb-2 transition-colors">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" autocomplete="off" required placeholder="admin@email.com" class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl text-black dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 dark:focus:ring-blue-500/50 dark:focus:border-blue-500 transition-all">
                    </div>
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
                        <input type="password" id="password" name="password" autocomplete="new-password" required placeholder="Masukkan password" class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 rounded-xl text-black dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 dark:focus:ring-blue-500/50 dark:focus:border-blue-500 transition-all">                    </div>
                </div>

            <button type="submit" class="w-full py-3.5 px-4 mt-8 rounded-xl bg-blue-600 dark:bg-blue-600 text-white font-bold hover:bg-blue-700 dark:hover:bg-blue-500 hover:shadow-[0_0_20px_rgba(37,99,235,0.3)] dark:hover:shadow-[0_0_20px_rgba(59,130,246,0.3)] transition-all transform hover:-translate-y-0.5 border border-transparent flex justify-center items-center gap-2">
                Masuk
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>

        </form>

    </div>


</div>

@endsection
