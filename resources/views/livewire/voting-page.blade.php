<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Pilih Kandidat Anda</h2>
        
        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($candidates as $candidate)
                <div wire:click="selectCandidate({{ $candidate->id }})" 
                     class="bg-white rounded-lg shadow-lg overflow-hidden cursor-pointer transition
                            {{ $selectedCandidate == $candidate->id ? 'ring-4 ring-blue-500' : 'hover:shadow-xl' }}">
                    
                    @if($candidate->path_candidates_photos)
                        <img src="{{ Storage::url($candidate->path_candidates_photos) }}" 
                             alt="{{ $candidate->candidates_name }}" 
                             class="w-full h-64 object-cover">
                    @endif
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $candidate->candidates_name }}</h3>
                        <p class="text-gray-600 line-clamp-3">{{ $candidate->description }}</p>
                        
                        @if($selectedCandidate == $candidate->id)
                            <div class="mt-4 bg-blue-100 text-blue-700 px-4 py-2 rounded text-center font-semibold">
                                ✓ Dipilih
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        
        @if($selectedCandidate)
            <div class="text-center">
                <button wire:click="submitVote" 
                        class="bg-green-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-green-700 transition">
                    Konfirmasi & Submit Vote
                </button>
            </div>
        @endif
    </div>
</div>