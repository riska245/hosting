@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto py-6 sm:py-8 md:py-12 animate-fade-in-up px-2 sm:px-4 md:px-0">
    <div class="mb-6">
        <a href="/pemahaman" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Pusat Edukasi
        </a>
    </div>

    <div class="text-center mb-12 md:mb-16">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black dark:text-white mb-3 sm:mb-4 transition-colors">Panduan Penggunaan</h1>
        <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-sm md:text-base transition-colors">Panduan lengkap langkah demi langkah dalam menggunakan mesin inkubator pintar untuk hasil tetas yang maksimal.</p>
    </div>

    <div class="bg-white dark:bg-slate-900/40 border border-slate-200 dark:border-slate-800 rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-8 shadow-sm dark:shadow-none prose prose-slate dark:prose-invert max-w-none transition-colors duration-300 prose-sm sm:prose-base">
        <h3>1. Persiapan Mesin</h3>
        <p>Sebelum memasukkan telur, pastikan mesin sudah dibersihkan dan disinfeksi. Nyalakan mesin dan biarkan berjalan kosong selama 24 jam untuk memastikan suhu dan kelembaban stabil di angka target.</p>

        <h3>2. Memilih Telur Tetas</h3>
        <ul>
            <li>Pilih telur yang bersih, bentuknya normal, dan cangkangnya tidak retak.</li>
            <li>Usia telur sebaiknya tidak lebih dari 7 hari setelah ditelurkan.</li>
            <li>Simpan telur di ruangan sejuk (15-18°C) sebelum dimasukkan ke inkubator.</li>
        </ul>

        <h3>3. Memasukkan Telur (Hari ke-1)</h3>
        <p>Letakkan telur di rak pemutar dengan posisi bagian tumpul menghadap ke atas (karena di sanalah kantong udara berada). Pastikan fitur pemutar otomatis sudah diaktifkan.</p>

        <h3>4. Masa Inkubasi (Hari 1 - 18)</h3>
        <p>Pada fase ini, pantau terus suhu (idealnya 37.5°C - 38.0°C) dan kelembaban (55% - 60%). Mesin akan memutar telur secara otomatis sesuai jadwal yang telah ditentukan. Anda dapat melakukan proses candling (peneropongan) pada hari ke-7 dan ke-14 untuk mengecek perkembangan embrio dan membuang telur yang tidak fertil (kosong/mati).</p>

        <h3>5. Masa Penetasan / Hatching (Hari 19 - 21)</h3>
        <p>Pada hari ke-18, hentikan pemutaran telur (pindahkan ke keranjang tetas jika ada). Naikkan kelembaban menjadi 65% - 70% dan turunkan sedikit suhu (misal 37.2°C). Jangan membuka inkubator terlalu sering agar kelembaban tidak turun drastis. Anak ayam akan mulai mematuk cangkang dan keluar dengan sendirinya.</p>
    </div>
</div>
@endsection
