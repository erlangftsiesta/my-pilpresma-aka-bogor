<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Daftar Kandidat</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($candidates as $candidate)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                    @if($candidate->path_candidates_photos)
                        <img src="{{ Storage::url($candidate->path_candidates_photos) }}" 
                             alt="{{ $candidate->candidates_name }}" 
                             class="w-full h-64 object-cover">
                    @else
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No Photo</span>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $candidate->candidates_name }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $candidate->description }}</p>
                        
                        <a href="{{ route('candidate.detail', $candidate->id) }}" 
                           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">Belum ada kandidat tersedia</p>
                </div>
            @endforelse
        </div>
    </div>
</div>