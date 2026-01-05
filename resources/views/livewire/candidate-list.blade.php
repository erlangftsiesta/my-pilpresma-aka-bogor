<x-app-layout>
    <x-slot name="header">
        <div class="max-w-4xl">
            <div class="inline-flex items-center space-x-3 mb-3">
                <div class="w-12 h-12 bg-gradient-to-br from-[var(--warm-gold)] to-amber-500 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                </div>
                <h2 class="font-extrabold text-4xl text-[var(--navy-blue)]">
                    Daftar Kandidat
                </h2>
            </div>
            <p class="text-base text-[var(--navy-blue)]/80 font-medium leading-relaxed">
                Kenali kandidat kami dan temukan pilihan terbaik untuk masa depan yang lebih cerah
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Friendly CTA Banner -->
            <div class="bg-gradient-to-r from-[var(--sky-blue)] to-blue-500 rounded-3xl p-8 mb-10 shadow-xl hover:shadow-2xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center space-x-3 mb-2">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-white font-bold text-xl">Selamat Datang!</h3>
                        </div>
                        <p class="text-white/95 text-sm font-medium leading-relaxed">
                            Klik pada setiap kartu kandidat untuk melihat profil lengkap dan informasi detail mereka
                        </p>
                    </div>
                    <div class="hidden md:block ml-6">
                        <div class="w-24 h-24 bg-white/20 rounded-3xl flex items-center justify-center backdrop-blur-sm transform hover:scale-110 transition-transform duration-300">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Friendly Card Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($candidates as $candidate)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 group">
                        @if($candidate->path_candidates_photos)
                            <div class="relative overflow-hidden h-72 bg-gradient-to-br from-blue-100 to-blue-50">
                                <img src="{{ Storage::url($candidate->path_candidates_photos) }}" 
                                     alt="{{ $candidate->candidates_name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute top-4 right-4 bg-gradient-to-r from-[var(--warm-gold)] to-amber-500 rounded-full px-4 py-2 shadow-lg">
                                    <span class="text-white text-xs font-bold flex items-center space-x-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span>Resmi</span>
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="w-full h-72 bg-gradient-to-br from-blue-100 via-sky-50 to-blue-100 flex items-center justify-center">
                                <svg class="w-28 h-28 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-6 space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-1 h-16 bg-gradient-to-b from-[var(--warm-gold)] to-amber-500 rounded-full"></div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-2xl text-[var(--navy-blue)] leading-tight group-hover:text-[var(--sky-blue)] transition-colors duration-300">
                                        {{ $candidate->candidates_name }}
                                    </h3>
                                </div>
                            </div>
                            
                            <p class="text-[var(--navy-blue)]/70 leading-relaxed line-clamp-3 text-sm">
                                {{ $candidate->description }}
                            </p>
                            
                            <a href="{{ route('candidate.detail', $candidate->id) }}" 
                               class="inline-flex items-center justify-center w-full px-6 py-3.5 bg-gradient-to-r from-[var(--sky-blue)] to-blue-500 text-white font-bold text-sm rounded-2xl hover:from-[var(--warm-gold)] hover:to-amber-500 transition-all duration-300 space-x-2 shadow-md hover:shadow-xl transform hover:scale-105">
                                <span>Lihat Profil Lengkap</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3">
                        <div class="bg-white rounded-3xl p-16 text-center shadow-lg">
                            <div class="w-32 h-32 bg-gradient-to-br from-blue-100 to-sky-100 rounded-full mx-auto flex items-center justify-center mb-6 shadow-inner">
                                <svg class="w-16 h-16 text-[var(--sky-blue)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-3xl text-[var(--navy-blue)] mb-3">
                                Belum Ada Kandidat
                            </h3>
                            <p class="text-[var(--navy-blue)]/70 font-medium text-base">
                                Kandidat akan muncul di sini setelah terdaftar dalam sistem
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
