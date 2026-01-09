<div class="py-12 bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <!-- <div class="inline-flex items-center gap-3 bg-white px-6 py-3 rounded-full shadow-lg mb-4">
                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-sm font-bold text-gray-700">VOTING AKTIF</span>
            </div> -->
            <h2 class="text-5xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 bg-clip-text text-transparent mb-3">
                Pilih Kandidat Anda
            </h2>
            <p class="text-xl text-gray-600">Gunakan hak suara Anda dengan bijak</p>
        </div>
        
        @if (session()->has('error'))
        <div class="max-w-2xl mx-auto mb-8 bg-gradient-to-r from-red-50 to-red-100 border-2 border-red-300 text-red-800 px-6 py-4 rounded-xl flex items-center gap-3 shadow-lg">
            <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="font-semibold">{{ session('error') }}</span>
        </div>
        @endif  
        
        <!-- Candidates Grid -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($candidates as $candidate)
            <div wire:click="selectCandidate({{ $candidate->id }})" 
                 class="group bg-white rounded-2xl shadow-xl overflow-hidden cursor-pointer transition-all duration-300 transform hover:-translate-y-2
                        {{ $selectedCandidate == $candidate->id ? 'ring-4 ring-blue-500 scale-105' : 'hover:shadow-2xl' }}">
                    
                <!-- Image Section -->
                <div class="relative overflow-hidden">
                    @if($candidate->path_candidates_photos)
                    <img src="{{ Storage::url($candidate->path_candidates_photos) }}" 
                         alt="{{ $candidate->candidates_name }}" 
                         class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                    <div class="w-full h-72 bg-gradient-to-br from-slate-200 to-blue-200 flex items-center justify-center">
                        <svg class="w-20 h-20 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    @endif
                    
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Selected Badge -->
                    @if($selectedCandidate == $candidate->id)
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-blue-500 to-blue-600 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 px-4 py-2 rounded-xl shadow-lg flex items-center gap-2 animate-bounce">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="font-bold">DIPILIH</span>
                    </div>
                    @endif
                    
                    <!-- Candidate Badge -->
                    <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-lg shadow-lg">
                        <span class="text-xs font-bold text-blue-600">KANDIDAT</span>
                    </div>
                </div>
                
                <!-- Content Section -->
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors">
                        {{ $candidate->candidates_name }}
                    </h3>
                    <p class="text-gray-600 line-clamp-3 leading-relaxed mb-4">
                        {{ $candidate->description ?: 'Tidak ada deskripsi' }}
                    </p>
                    
                    <!-- View Detail Link -->
                    <a href="{{ route('candidate.detail', $candidate->id) }}" 
                       onclick="event.stopPropagation()"
                       class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-semibold text-sm group/link">
                        <span>Lihat Detail</span>
                        <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    
                    @if($selectedCandidate == $candidate->id)
                    <div class="mt-4 bg-gradient-to-r from-blue-500 to-blue-600 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 px-4 py-3 rounded-xl text-center font-bold shadow-lg flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Kandidat Dipilih
                    </div>
                    @else
                    <div class="mt-4 bg-gradient-to-r from-gray-100 to-blue-100 text-gray-700 px-4 py-3 rounded-xl text-center font-semibold border-2 border-gray-200 group-hover:border-blue-300 transition-colors">
                        Klik untuk Memilih
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Submit Button -->
        @if($selectedCandidate)
        <div class="mt-8 text-center animate-fadeIn">
            <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-2xl mx-auto mb-6">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-800">Pilihan Anda Sudah Siap</h3>
                </div>
                <p class="text-gray-600 mb-6">
                    Pastikan pilihan Anda sudah benar sebelum mengkonfirmasi. 
                    <span class="font-bold text-red-600">Suara tidak dapat diubah</span> setelah dikonfirmasi.
                </p>
                
<button
    style="background: red;"
    type="button"
    wire:click="submitVote"
    wire:loading.attr="disabled"
    wire:target="submitVote"
    class="
        flex items-center justify-center
        w-full
        px-6 py-4
        bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600
        text-white font-bold text-base
        rounded-xl
        shadow-lg
        hover:from-purple-600 hover:to-blue-600
        transition-all duration-300
        disabled:opacity-50 disabled:cursor-not-allowed
    "
>
    <span wire:loading.remove>Konfirmasi & Submit Vote</span>
    <span wire:loading class="animate-pulse">Memproses...</span>
</button>


            </div>
            
            <!-- Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-3xl mx-auto">
                <div class="bg-white rounded-xl p-4 shadow-lg">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-xs text-gray-500 font-semibold">Aman</p>
                            <p class="text-sm font-bold text-gray-800">Terenkripsi</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl p-4 shadow-lg">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-xs text-gray-500 font-semibold">Rahasia</p>
                            <p class="text-sm font-bold text-gray-800">Anonim</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl p-4 shadow-lg">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-xs text-gray-500 font-semibold">Cepat</p>
                            <p class="text-sm font-bold text-gray-800">Real-time</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="text-center">
            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border-2 border-yellow-300 rounded-2xl p-8 max-w-2xl mx-auto shadow-lg">
                <svg class="w-16 h-16 text-yellow-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Pilih Kandidat</h3>
                <p class="text-gray-600">Klik pada salah satu kandidat di atas untuk memulai voting</p>
            </div>
        </div>
        @endif
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</div>