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
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black dark:text-white mb-3 sm:mb-4 transition-colors">Panduan Kalibrasi</h1>
        <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-sm md:text-base transition-colors">Langkah-langkah untuk melakukan kalibrasi sensor pada mesin inkubator Anda agar pembacaan suhu dan kelembaban selalu akurat.</p>
    </div>

    <div class="bg-white dark:bg-slate-900/40 border border-slate-200 dark:border-slate-800 rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-8 shadow-sm dark:shadow-none prose prose-slate dark:prose-invert max-w-none transition-colors duration-300 prose-sm sm:prose-base">
        <h3>Mengapa Kalibrasi Penting?</h3>
        <p>Seiring waktu, sensor suhu dan kelembaban dapat mengalami pergeseran pembacaan (drift). Kalibrasi rutin memastikan bahwa mesin tetas Anda memberikan kondisi yang sesuai dengan yang Anda atur.</p>

        <h3>Langkah Kalibrasi Sensor Suhu</h3>
        <ol>
            <li>Siapkan termometer presisi tinggi (referensi) yang sudah dikalibrasi.</li>
            <li>Letakkan termometer referensi di dekat sensor suhu mesin tetas.</li>
            <li>Biarkan mesin beroperasi selama minimal 30 menit agar suhu stabil.</li>
            <li>Bandingkan nilai pada termometer referensi dengan nilai yang tampil pada layar monitor mesin.</li>
            <li>Jika terdapat selisih, masuk ke menu <strong>Pengaturan Alat</strong> dan sesuaikan offset suhu pada mesin Anda.</li>
        </ol>

        <h3>Langkah Kalibrasi Sensor Kelembaban</h3>
        <ol>
            <li>Gunakan higrometer referensi yang akurat.</li>
            <li>Letakkan higrometer di dekat sensor mesin tetas.</li>
            <li>Tunggu beberapa saat hingga pembacaan stabil.</li>
            <li>Sesuaikan nilai offset kelembaban pada menu pengaturan jika terdapat perbedaan pembacaan.</li>
        </ol>

        <div class="mt-8 p-4 bg-orange-50 dark:bg-orange-500/10 border border-orange-200 dark:border-orange-500/20 rounded-xl">
            <p class="text-sm text-orange-800 dark:text-orange-300 m-0"><strong>Catatan:</strong> Disarankan untuk melakukan kalibrasi setidaknya setiap 6 bulan sekali atau sebelum memulai siklus penetasan baru.</p>
        </div>
    </div>
</div>
@endsection
