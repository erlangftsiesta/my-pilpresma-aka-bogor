<div>
    <div wire:poll.3s="loadData" class="py-12 bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
        <div class="max-w- mx-auto sm:px-6 lg:px-8">
            <!-- Header with animated gradient -->
<div class="mb-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl p-8">
    <h2 class="text-4xl font-bold bg-gradient-to-r from-blue-900 to-blue-950  bg-clip-text text-transparent mb-4">
        Rekapitulasi Real-Time
    </h2>
    <p class="text-gray-600 flex items-center gap-2">
        <span class="inline-block w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
        Live Update setiap 3 detik
    </p>
</div>

            <!-- Stats Cards with gradient and hover effects -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Suara Masuk -->
                <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-blue-100 rounded-xl group-hover:bg-white/20 transition-colors">
                                <svg class="w-6 h-6 text-blue-600 group-hover:from-blue-900 to-blue-950 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-500 group-hover:text-white/80 transition-colors mb-2">
                            Total Suara Masuk
                        </h3>
                        <p class="text-5xl font-bold text-blue-600 group-hover:from-blue-900 to-blue-950 transition-colors">
                            {{ $totalVotes }}
                        </p>
                    </div>
                </div>

                <!-- Total Pemilih -->
                <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500 to-green-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-green-100 rounded-xl group-hover:bg-white/20 transition-colors">
                                <svg class="w-6 h-6 text-green-600 group-hover:from-blue-900 to-blue-950 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-500 group-hover:text-white/80 transition-colors mb-2">
                            Total Pemilih
                        </h3>
                        <p class="text-5xl font-bold text-green-600 group-hover:from-blue-900 to-blue-950 transition-colors">
                            {{ $totalVoters }}
                        </p>
                    </div>
                </div>

                <!-- Partisipasi -->
                <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-purple-100 rounded-xl group-hover:bg-white/20 transition-colors">
                                <svg class="w-6 h-6 text-purple-600 group-hover:from-blue-900 to-blue-950 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-500 group-hover:text-white/80 transition-colors mb-2">
                            Partisipasi
                        </h3>
                        <p class="text-5xl font-bold text-purple-600 group-hover:   transition-colors">
                            {{ $totalVoters > 0 ? number_format(($totalVotes / $totalVoters) * 100, 1) : 0 }}%
                        </p>
                    </div>
                </div>
            </div>

            <!-- Candidates Results with modern design -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-slate-800 to-slate-700 p-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-1">Hasil Per Kandidat</h3>
                            <p class="text-slate-300 text-sm">Peringkat berdasarkan perolehan suara</p>
                        </div>
                        <button wire:click="exportResults"
                            class="bg-green-500 hover:bg-green-600 from-blue-900 to-blue-950 px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Export Hasil
                        </button>
                    </div>
                </div>

                <div class="p-8 space-y-6">
                    @foreach($candidates as $index => $candidate)
                    <div class="group relative">
                        <!-- Ranking Badge -->
                        <div class="absolute -left-3 -top-3 w-10 h-10 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center shadow-lg z-10 group-hover:scale-110 transition-transform">
                            <span class="from-blue-900 to-blue-950 font-bold text-sm">{{ $index + 1 }}</span>
                        </div>

                        <div class="bg-gradient-to-r from-slate-50 to-blue-50 rounded-2xl p-6 border-2 border-transparent hover:border-blue-300 transition-all duration-300 hover:shadow-lg">
                            <div class="flex justify-between items-center mb-4">
                                <div class="flex items-center gap-5">
                                    @if($candidate->path_candidates_photos)
                                    <div class="relative">
                                        <img src="{{ Storage::url($candidate->path_candidates_photos) }}"
                                            alt="{{ $candidate->candidates_name }}" 
                                            class="w-20 h-20 rounded-2xl object-cover ring-4 ring-white shadow-lg group-hover:ring-blue-300 transition-all">
                                        <!-- <div class="absolute -bottom-2 -right-2 bg-blue-600 from-blue-900 to-blue-950 text-xs font-bold px-2 py-1 rounded-lg shadow">
                                            {{ $candidate->votes_count }}
                                        </div> -->
                                    </div>
                                    @endif
                                    <div>
                                        <h4 class="font-bold text-xl text-gray-800 mb-1">{{ $candidate->candidates_name }}</h4>
                                        <p class="text-gray-600 font-medium">{{ $candidate->votes_count }} suara</p>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <p class="text-4xl font-bold bg-clip-text text-transparent">
                                        {{ $totalVotes > 0 ? number_format(($candidate->votes_count / $totalVotes) * 100, 1) : 0 }}%
                                    </p>
                                    <p class="text-sm text-gray-500 mt-1">perolehan</p>
                                </div>
                            </div>

                            <!-- Enhanced Progress Bar -->
                            <div class="relative">
                                <div class="w-full bg-gray-200 rounded-full h-6 shadow-inner overflow-hidden">
                                    <div class="bg-gradient-to-r from-blue-900 to-blue-950 h-6 rounded-full transition-all duration-1000 ease-out flex items-center justify-end pr-3 shadow-lg relative overflow-hidden"
                                        style="width: {{ $totalVotes > 0 ? ($candidate->votes_count / $totalVotes) * 100 : 0 }}%">
                                        <!-- Shimmer effect -->
                                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent animate-shimmer"></div>
                                        @if($totalVotes > 0 && ($candidate->votes_count / $totalVotes) * 100 > 10)
                                        <span class="text-white font-bold text-xs relative z-10">
                                            {{ number_format(($candidate->votes_count / $totalVotes) * 100, 1) }}%
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        .animate-shimmer {
            animation: shimmer 2s infinite;
        }
    </style>
</div>