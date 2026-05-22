@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto py-8 sm:py-10 md:py-16 animate-fade-in-up px-2 sm:px-4 md:px-0">

    <div class="text-center mb-8 sm:mb-10 md:mb-12">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black dark:text-white mb-3 sm:mb-4 transition-colors">Pusat Bantuan & Kontak</h1>
        <p class="text-slate-600 dark:text-slate-400 text-sm md:text-base max-w-xl mx-auto transition-colors">Butuh bantuan teknis atau informasi spesifikasi perangkat lebih lanjut? Tim kami siap melayani Anda.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        
        <!-- Email Card -->
        <a href="mailto:inkubator@email.com" class="group bg-white dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-slate-700/50 rounded-2xl sm:rounded-3xl p-5 sm:p-6 md:p-8 flex flex-col items-center text-center hover:border-blue-300 dark:hover:border-blue-500/50 shadow-sm transition-all hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(37,99,235,0.05)] dark:hover:shadow-[0_10px_30px_rgba(59,130,246,0.15)] relative overflow-hidden active:scale-[0.98]">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 dark:from-blue-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
            
            <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-blue-50 dark:bg-slate-800 flex items-center justify-center mb-4 md:mb-6 group-hover:bg-blue-100 dark:group-hover:bg-blue-500/20 transition-colors">
                <svg class="w-7 h-7 md:w-8 md:h-8 text-blue-600 dark:text-slate-400 group-hover:text-blue-700 dark:group-hover:text-blue-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            
            <h2 class="text-black dark:text-white font-semibold text-base md:text-lg mb-2 transition-colors">Email Support</h2>
            <p class="text-slate-600 dark:text-slate-400 text-xs md:text-sm mb-4 leading-relaxed transition-colors">Kirimkan pertanyaan detail Anda beserta lampiran kepada tim teknisi kami.</p>
            <span class="text-blue-600 dark:text-blue-400 font-medium text-sm md:text-base transition-colors">smart.egg.incubator1@gmail.com</span>
        </a>

        <!-- WhatsApp Card -->
        <a href="https://wa.me/083838817560" target="_blank" class="group bg-white dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-slate-700/50 rounded-2xl sm:rounded-3xl p-5 sm:p-6 md:p-8 flex flex-col items-center text-center hover:border-green-300 dark:hover:border-green-500/50 shadow-sm transition-all hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(34,197,94,0.05)] dark:hover:shadow-[0_10px_30px_rgba(34,197,94,0.15)] relative overflow-hidden active:scale-[0.98]">
            <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 dark:from-green-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
            
            <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-green-50 dark:bg-slate-800 flex items-center justify-center mb-4 md:mb-6 group-hover:bg-green-100 dark:group-hover:bg-green-500/20 transition-colors">
                <svg class="w-7 h-7 md:w-8 md:h-8 text-green-600 dark:text-slate-400 group-hover:text-green-700 dark:group-hover:text-green-400 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                </svg>
            </div>
            
            <h2 class="text-black dark:text-white font-semibold text-base md:text-lg mb-2 transition-colors">WhatsApp Fast Response</h2>
            <p class="text-slate-600 dark:text-slate-400 text-xs md:text-sm mb-4 leading-relaxed transition-colors">Konsultasi langsung dengan tim lapangan kami untuk penanganan darurat.</p>
            <span class="text-green-600 dark:text-green-400 font-medium text-sm md:text-base transition-colors">+62 838-3881-7560</span>
        </a>

        <!-- Jam Operasional Card -->
        <div class="group bg-white dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-slate-700/50 rounded-2xl sm:rounded-3xl p-5 sm:p-6 md:p-8 flex flex-col items-center text-center hover:border-amber-300 dark:hover:border-amber-500/50 shadow-sm transition-all hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(245,158,11,0.05)] dark:hover:shadow-[0_10px_30px_rgba(245,158,11,0.15)] relative overflow-hidden">

            <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 dark:from-amber-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

            <!-- Icon Jam -->
            <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-amber-50 dark:bg-slate-800 flex items-center justify-center mb-4 md:mb-6 group-hover:bg-amber-100 dark:group-hover:bg-amber-500/20 transition-colors">

                <svg class="w-7 h-7 md:w-8 md:h-8 text-amber-600 dark:text-slate-400 group-hover:text-amber-700 dark:group-hover:text-amber-400 transition-colors"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <h2 class="text-black dark:text-white font-semibold text-base md:text-lg mb-2 transition-colors">
                Jam Operasional
            </h2>

            <p class="text-slate-600 dark:text-slate-400 text-xs md:text-sm mb-4 leading-relaxed text-justify transition-colors">
                Tim kami siap melayani konsultasi, bantuan teknis, dan informasi perangkat selama jam operasional berlangsung agar kebutuhan pelanggan dapat ditangani dengan cepat dan maksimal.
            </p>

            <span class="text-amber-600 dark:text-amber-400 font-medium text-sm md:text-base transition-colors">
                Senin - Sabtu, 08.00 - 16.00 WIB
            </span>
        </div>

        <!-- Telegram for Education Card -->
        <a href="https://t.me/smarteggincubator" target="_blank"
        class="group bg-white dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200 dark:border-slate-700/50 rounded-2xl sm:rounded-3xl p-5 sm:p-6 md:p-8 flex flex-col items-center text-center hover:border-sky-300 dark:hover:border-sky-500/50 shadow-sm transition-all hover:-translate-y-1 sm:hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(14,165,233,0.05)] dark:hover:shadow-[0_10px_30px_rgba(14,165,233,0.15)] relative overflow-hidden active:scale-[0.98]">

            <div class="absolute inset-0 bg-gradient-to-br from-sky-500/5 dark:from-sky-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

            <!-- Icon Telegram -->
            <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-sky-50 dark:bg-slate-800 flex items-center justify-center mb-4 md:mb-6 group-hover:bg-sky-100 dark:group-hover:bg-sky-500/20 transition-colors">

                <svg class="w-7 h-7 md:w-8 md:h-8 text-sky-600 dark:text-slate-400 group-hover:text-sky-700 dark:group-hover:text-sky-400 transition-colors"
                    fill="currentColor"
                    viewBox="0 0 24 24">

                    <path d="M9.993 15.168 9.59 20.84c.577 0 .827-.248 1.127-.546l2.703-2.584 5.604 4.101c1.027.566 1.75.268 2.027-.944l3.676-17.224.001-.001c.325-1.514-.547-2.106-1.548-1.734L1.63 10.13c-1.472.574-1.45 1.394-.251 1.761l5.502 1.717L19.66 5.55c.601-.398 1.148-.177.698.221"/>
                </svg>
            </div>

            <h2 class="text-black dark:text-white font-semibold text-base md:text-lg mb-2 transition-colors">
                Telegram for Education
            </h2>

            <p class="text-slate-600 dark:text-slate-400 text-xs md:text-sm mb-4 leading-relaxed text-justify transition-colors">
                Bergabunglah dengan grup edukasi kami di Telegram untuk mendapatkan panduan penggunaan inkubator, tips perawatan, pembelajaran teknis, serta update terbaru seputar teknologi penetasan.
            </p>

            <span class="text-sky-600 dark:text-sky-400 font-medium text-sm md:text-base transition-colors">
                @smarteggincubator
            </span>
        </a>

        <!-- Tombol Kembali -->
        <div class="sm:col-span-2 mt-2 sm:mt-4 text-center">
            <a href="/"
                class="inline-flex items-center px-5 py-3 rounded-2xl bg-blue-600 text-white hover:bg-blue-700 transition">
                Kembali ke Beranda
            </a>
        </div>

    </div>

    </div>
</div>
@endsection