<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($candidate->path_candidates_photos)
                <img src="{{ Storage::url($candidate->path_candidates_photos) }}" 
                     alt="{{ $candidate->candidates_name }}" 
                     class="w-full h-96 object-cover">
            @endif
            
            <div class="p-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $candidate->candidates_name }}</h1>
                
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-2">Deskripsi</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $candidate->description }}</p>
                </div>
                
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-2">Visi</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $candidate->vision }}</p>
                </div>
                
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-2">Misi</h2>
                    <p class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $candidate->mission }}</p>
                </div>
                
                <div class="flex gap-4">
                    <a href="{{ route('candidates') }}" 
                       class="bg-gray-600 text-white px-6 py-3 rounded hover:bg-gray-700 transition">
                        Kembali
                    </a>
                    <a href="{{ route('voting.page') }}" 
                       class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
                        Pilih Kandidat
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>