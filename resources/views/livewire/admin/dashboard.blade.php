<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div wire:poll.3s="loadData" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Rekapitulasi Real-Time</h2>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm font-semibold">Total Suara Masuk</h3>
                    <p class="text-4xl font-bold text-blue-600">{{ $totalVotes }}</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm font-semibold">Total Pemilih</h3>
                    <p class="text-4xl font-bold text-green-600">{{ $totalVoters }}</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm font-semibold">Partisipasi</h3>
                    <p class="text-4xl font-bold text-purple-600">
                        {{ $totalVoters > 0 ? number_format(($totalVotes / $totalVoters) * 100, 1) : 0 }}%
                    </p>
                </div>
            </div>

            <!-- Candidates Results -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-6 border-b">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h3 class="text-xl font-bold text-gray-800">Hasil Per Kandidat</h3>
                        <button wire:click="exportResults"
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            Export Hasil
                        </button>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Hasil Per Kandidat</h3>
                </div>

                <div class="p-6 space-y-6">
                    @foreach($candidates as $candidate)
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center gap-4">
                                @if($candidate->path_candidates_photos)
                                <img src="{{ Storage::url($candidate->path_candidates_photos) }}"
                                    alt="{{ $candidate->candidates_name }}" class="w-16 h-16 rounded-full object-cover">
                                @endif
                                <div>
                                    <h4 class="font-bold text-lg">{{ $candidate->candidates_name }}</h4>
                                    <p class="text-gray-600">{{ $candidate->votes_count }} suara</p>
                                </div>
                            </div>

                            <div class="text-right">
                                <p class="text-2xl font-bold text-blue-600">
                                    {{ $totalVotes > 0 ? number_format(($candidate->votes_count / $totalVotes) * 100, 1) : 0 }}%
                                </p>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-blue-600 h-4 rounded-full transition-all duration-500"
                                style="width: {{ $totalVotes > 0 ? ($candidate->votes_count / $totalVotes) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <p class="text-center text-gray-500 mt-4 text-sm">
                🔄 Data diperbarui otomatis setiap 3 detik
            </p>
        </div>
    </div>
</div>