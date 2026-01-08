    <x-slot name="header">
        <div class="text-center max-w-4xl mx-auto space-y-6">
            <h2 class="font-['Poppins'] text-5xl font-semibold text-[var(--soft-navy)] tracking-tight">
                Daftar Kandidat
            </h2>
            <p class="text-lg text-[var(--soft-navy)]/70 font-light leading-relaxed">
                Pelajari profil setiap kandidat untuk membuat keputusan yang tepat dan bijaksana
            </p>
        </div>
    </x-slot>

    <div class="py-20">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @forelse($candidates as $candidate)
                    <div class="bg-white/95 backdrop-blur-sm rounded-2xl overflow-hidden border border-[var(--champagne-gold)]/40 hover:border-[var(--champagne-gold)] transition-all duration-500 hover:shadow-2xl group">
                        @if($candidate->path_candidates_photos)
                            <div class="relative overflow-hidden h-80">
                                <img src="{{ Storage::url($candidate->path_candidates_photos) }}" 
                                     alt="{{ $candidate->candidates_name }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                                <div class="absolute inset-0 bg-gradient-to-t from-[var(--soft-navy)]/50 to-transparent"></div>
                            </div>
                        @else
                            <div class="w-full h-80 bg-gradient-to-br from-[var(--light-blue)] to-[var(--pastel-blue)] flex items-center justify-center">
                                <svg class="w-32 h-32 text-[var(--soft-navy)]/20" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-8 space-y-6">
                            <h3 class="font-['Poppins'] text-2xl font-semibold text-[var(--soft-navy)] tracking-tight">
                                {{ $candidate->candidates_name }}
                            </h3>
                            <p class="text-[var(--soft-navy)]/70 leading-relaxed line-clamp-3 font-light">
                                {{ $candidate->description }}
                            </p>
                            
                            <a href="{{ route('candidate.detail', $candidate->id) }}" 
                               class="inline-flex items-center justify-center w-full px-8 py-4 border border-[var(--champagne-gold)] rounded-full text-[var(--soft-navy)] font-['Poppins'] font-medium hover:bg-[var(--champagne-gold)]/10 transition-all duration-300 group/btn space-x-2">
                                <span>Lihat Detail</span>
                                <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3">
                        <div class="bg-white/95 backdrop-blur-sm rounded-3xl p-16 text-center border border-[var(--champagne-gold)]/40 space-y-6">
                            <svg class="w-24 h-24 mx-auto text-[var(--pastel-blue)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                            <h3 class="font-['Poppins'] text-3xl font-semibold text-[var(--soft-navy)]">
                                Belum Ada Kandidat
                            </h3>
                            <p class="text-[var(--soft-navy)]/60 text-lg font-light">
                                Belum ada kandidat tersedia saat ini
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>