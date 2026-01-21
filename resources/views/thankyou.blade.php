<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Terima Kasih') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-3xl">
                <div class="p-12 text-center">
                    <!-- Success Icon with Animation -->
                    <div class="mb-8 relative inline-block">
                        <div class="absolute inset-0 bg-green-200 rounded-full animate-ping opacity-75"></div>
                        <div class="relative bg-gradient-to-r from-green-400 to-emerald-500 rounded-full p-6">
                            <center>
                                                            <svg class="w-24 h-24 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            </center>
                        </div>
                    </div>
                    
                    <!-- Main Heading -->
                    <h1 class="text-5xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 bg-clip-text text-transparent mb-4">
                        Terima Kasih!
                    </h1>
                    <p class="text-2xl text-gray-600 mb-4 font-semibold">Suara Anda telah berhasil tercatat</p>
                    
                    <!-- Checkmark Animation -->
                    <div class="flex items-center justify-center gap-2 mb-8 text-green-600">
                        <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="font-semibold">Vote tercatat dengan aman</span>
                    </div>
                    
                    <!-- Info Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8 max-w-3xl mx-auto">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-2 border-blue-200 rounded-2xl p-4 hover:shadow-lg transition-shadow">
                            <div class="bg-blue-500 w-12 h-12 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <p class="font-bold text-gray-800 text-sm">Terenkripsi</p>
                            <p class="text-xs text-gray-600 mt-1">Data aman tersimpan</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-green-50 to-green-100 border-2 border-green-200 rounded-2xl p-4 hover:shadow-lg transition-shadow">
                            <div class="bg-green-500 w-12 h-12 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <p class="font-bold text-gray-800 text-sm">Rahasia</p>
                            <p class="text-xs text-gray-600 mt-1">Suara bersifat anonim</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-200 rounded-2xl p-4 hover:shadow-lg transition-shadow">
                            <div class="bg-purple-500 w-12 h-12 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="font-bold text-gray-800 text-sm">Sah</p>
                            <p class="text-xs text-gray-600 mt-1">Sesuai prosedur</p>
                        </div>
                    </div>
                    
                    <!-- Message Box -->
                    <div class="bg-gradient-to-r from-blue-50 via-purple-50 to-blue-50 border-2 border-blue-200 rounded-2xl p-8 max-w-2xl mx-auto mb-8 shadow-lg">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-blue-500 rounded-xl flex-shrink-0">
                                <svg class="w-6 h-6 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-gray-800 font-semibold text-lg mb-2">Partisipasi Anda Sangat Berarti</p>
                                <p class="text-gray-600 leading-relaxed">
                                    Dengan memberikan suara, Anda telah berkontribusi dalam menentukan pemimpin yang terbaik untuk masa depan yang lebih cerah.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Logout Button -->
                    <div class="mt-8">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 px-10 py-4 rounded-xl font-bold transform hover:scale-105 transition-all duration-200 flex items-center justify-center gap-3 mx-auto text-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>