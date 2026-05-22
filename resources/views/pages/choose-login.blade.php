@extends('layouts.main')

@section('content')

<div class="max-w-3xl mx-auto py-24 px-4">

    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-black dark:text-white mb-3">
            Pilih Jenis Login
        </h1>

        <p class="text-slate-600 dark:text-slate-400">
            Silakan pilih login sebagai User atau Admin.
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">

        <!-- LOGIN USER -->
        <a href="/login-user"
           class="bg-white dark:bg-slate-900/60 border border-slate-200 dark:border-slate-700 rounded-3xl p-8 hover:shadow-2xl transition-all">

            <div class="w-16 h-16 rounded-2xl bg-blue-100 dark:bg-blue-500/10 flex items-center justify-center mb-6">
                <span class="text-3xl">🐣</span>
            </div>

            <h2 class="text-2xl font-bold text-black dark:text-white mb-3">
                Login User
            </h2>

            <p class="text-slate-600 dark:text-slate-400">
                Masuk ke dashboard monitoring inkubator.
            </p>

        </a>

        <!-- LOGIN ADMIN -->
        <a href="/login-admin"
           class="bg-white dark:bg-slate-900/60 border border-slate-200 dark:border-slate-700 rounded-3xl p-8 hover:shadow-2xl transition-all">

            <div class="w-16 h-16 rounded-2xl bg-yellow-100 dark:bg-yellow-500/10 flex items-center justify-center mb-6">
                <span class="text-3xl">🛠️</span>
            </div>

            <h2 class="text-2xl font-bold text-black dark:text-white mb-3">
                Login Admin
            </h2>

            <p class="text-slate-600 dark:text-slate-400">
                Masuk ke dashboard administrator sistem.
            </p>

        </a>

    </div>

</div>

@endsection