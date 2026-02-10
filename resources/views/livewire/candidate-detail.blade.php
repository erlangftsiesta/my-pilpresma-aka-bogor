<div class="py-12 bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Hero Image Section -->
            <div class="relative">
                @if($candidate->path_candidates_photos)
                <img src="{{ Storage::url($candidate->path_candidates_photos) }}" 
                     alt="{{ $candidate->candidates_name }}" 
                     class="w-full h-96 object-cover">
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                
                <!-- Floating Badge -->
                <div class="absolute top-6 right-6 bg-white/95 backdrop-blur-sm px-4 py-2 rounded-xl shadow-lg">
                    <span class="text-sm font-bold text-blue-600 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>  
                        KANDIDAT
                    </span>
                </div>
                
                <!-- Name Overlay at Bottom -->
                <div class="absolute bottom-0 left-0 right-0 p-8">
                    <h1 class="text-5xl font-bold text-white mb-2 drop-shadow-lg">{{ $candidate->candidates_name }}</h1>
                    <!-- <div class="flex items-center gap-2 from-blue-900 to-blue-950/90">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-semibold">Calon Pemimpin</span>
                    </div> -->
                </div>
                @else
                <div class="w-full h-96 bg-gradient-to-br from-slate-200 to-blue-200 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-24 h-24 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <h1 class="text-4xl font-bold text-slate-600">{{ $candidate->candidates_name }}</h1>
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Content Section -->
            <div class="p-8 space-y-8">
                <!-- Deskripsi -->
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border-2 border-blue-100">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-blue-500 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Deskripsi</h2>
                    </div>
                    <p class="text-gray-700 leading-relaxed text-lg">{{ $candidate->description }}</p>
                </div>
                
                <!-- Visi -->
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-6 border-2 border-green-100">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-green-500 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Visi</h2>
                    </div>
                    <p class="text-gray-700 leading-relaxed text-lg">{{ $candidate->vision }}</p>
                </div>
                
                <!-- Misi -->
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl p-6 border-2 border-purple-100">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-purple-500 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Misi</h2>
                    </div>
                    <p class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">{{ $candidate->mission }}</p>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t-2 border-gray-100">
                    <a href="{{ route('voting.page') }}" 
                       class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 from-blue-900 to-blue-950 px-8 py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center justify-center gap-3 text-lg relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-900 to-blue-950 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <svg class="w-6 h-6 relative z-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="relative z-10 text-white">Voting</span>
                    </a>
                    <a href="{{ route('candidates') }}" 
                       class="flex-1 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 from-blue-900 to-blue-950 px-8 py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center justify-center gap-3 text-lg text-white">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Quick Info Cards Below -->
        <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <div class="bg-white rounded-xl p-4 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center gap-3">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-semibold">Profil</p>
                        <p class="font-bold text-gray-800">Lengkap</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-4 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center gap-3">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-semibold">Status</p>
                        <p class="font-bold text-gray-800">Aktif</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-4 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center gap-3">
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-semibold">Program</p>
                        <p class="font-bold text-gray-800">Siap Dipilih</p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>