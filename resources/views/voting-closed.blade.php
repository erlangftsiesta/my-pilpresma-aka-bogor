<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voting Ditutup') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-3xl">
                <div class="p-12 text-center">
                    <!-- Warning Icon with Animation -->
                     <center>
                    <div class="mb-8 relative inline-block">
                        <div class="absolute inset-0 bg-red-200 rounded-full animate-pulse opacity-75"></div>
                        <div class="relative bg-gradient-to-r from-red-500 to-red-600 p-6">
                            <svg class="w-24 h-24 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                     </center>
                    
                    <!-- Main Heading -->
                    <h1 class="text-5xl font-bold bg-gradient-to-r from-red-600 via-orange-600 to-red-600 bg-clip-text text-transparent mb-4">
                        Periode Voting Ditutup
                    </h1>
                    <p class="text-2xl text-gray-600 mb-4 font-semibold">Voting saat ini tidak tersedia</p>
                    
                    <!-- Status Badge -->
                    <div class="flex items-center justify-center gap-2 mb-8">
                        <div class="bg-gradient-to-r from-red-500 to-red-600 px-6 py-2 rounded-xl flex items-center gap-2">
                            <svg class="w-5 h-5 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <span class="font-bold from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600">DITUTUP</span>
                        </div>
                    </div>
                    
                    <!-- Info Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 max-w-2xl mx-auto">
                        <div class="bg-gradient-to-br from-orange-50 to-red-50 border-2 border-orange-200 rounded-2xl p-6 hover:shadow-lg transition-shadow">
                            <div class="bg-orange-500 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-7 h-7 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="font-bold text-gray-800 text-lg mb-2">Periode Berakhir</p>
                            <p class="text-sm text-gray-600">Waktu voting telah habis atau belum dimulai</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-blue-50 to-purple-50 border-2 border-blue-200 rounded-2xl p-6 hover:shadow-lg transition-shadow">
                            <div class="bg-blue-500 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4  ">
                                <svg class="w-7 h-7 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="font-bold text-gray-800 text-lg mb-2">Hubungi Admin</p>
                            <p class="text-sm text-gray-600">Untuk informasi jadwal voting selanjutnya</p>
                        </div>
                    </div>
                    
                    <!-- Warning Message Box -->
                    <div class="bg-gradient-to-r from-yellow-50 via-orange-50 to-yellow-50 border-2 border-yellow-300 rounded-2xl p-8 max-w-2xl mx-auto mb-8 shadow-lg">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-yellow-500 rounded-xl flex-shrink-0">
                                <svg class="w-7 h-7 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-gray-800 font-bold text-xl mb-3">Informasi Penting</p>
                                <p class="text-gray-700 leading-relaxed mb-3">
                                    Saat ini periode voting sudah <span class="font-bold text-red-600">berakhir</span> atau <span class="font-bold text-blue-600">belum dibuka</span>.
                                </p>
                                <p class="text-gray-600 leading-relaxed">
                                    Silakan hubungi administrator untuk informasi lebih lanjut mengenai jadwal periode voting berikutnya.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timeline Illustration -->
                    <div class="bg-gradient-to-r from-slate-50 to-blue-50 rounded-2xl p-6 max-w-2xl mx-auto mb-8 border-2 border-slate-200">
                        <p class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">Status Timeline</p>
                        <div class="flex items-center justify-center gap-4">
                            <div class="text-center flex-1">
                                <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <svg class="w-6 h-6 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <p class="text-xs font-semibold text-gray-600">Belum Dibuka</p>
                            </div>
                            
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                            
                            <div class="text-center flex-1">
                                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-2 shadow-lg ring-4 ring-red-200">
                                    <svg class="w-6 h-6 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                <p class="text-xs font-bold text-red-600">Ditutup</p>
                            </div>
                            
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                            
                            <div class="text-center flex-1">
                                <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <svg class="w-6 h-6 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="text-xs font-semibold text-gray-600">Menunggu Hasil</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Back Button -->
                    <!-- <div class="mt-8">
                        <a href="{{ route('dashboard') }}" 
                            class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-slate-600 to-slate-700 hover:from-slate-700 hover:to-slate-800 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 px-10 py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 text-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Dashboard
                        </a>
                    </div> -->
                    
                    <!-- Footer Note -->
                    <p class="text-sm text-gray-500 mt-8">
                        Pantau terus pengumuman untuk informasi periode voting berikutnya
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>