<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Manajemen Kandidat</h3>
                <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Tambah Kandidat
                </button>
            </div>
            
            @if (session()->has('message'))
                <div class="m-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('message') }}
                </div>
            @endif
            
            <!-- Candidates Grid -->
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($candidates as $candidate)
                    <div class="bg-white border rounded-lg shadow-sm overflow-hidden">
                        @if($candidate->path_candidates_photos)
                            <img src="{{ Storage::url($candidate->path_candidates_photos) }}" 
                                 alt="{{ $candidate->candidates_name }}" 
                                 class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No Photo</span>
                            </div>
                        @endif
                        
                        <div class="p-4">
                            <h4 class="font-bold text-lg mb-2">{{ $candidate->candidates_name }}</h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $candidate->description }}</p>
                            
                            <div class="flex gap-2">
                                <button wire:click="edit({{ $candidate->id }})" 
                                        class="flex-1 bg-blue-600 text-white px-3 py-2 rounded text-sm hover:bg-blue-700">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $candidate->id }})" 
                                        onclick="return confirm('Yakin hapus kandidat ini?')"
                                        class="flex-1 bg-red-600 text-white px-3 py-2 rounded text-sm hover:bg-red-700">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 overflow-y-auto">
            <div class="bg-white rounded-lg p-8 max-w-2xl w-full mx-4 my-8">
                <h3 class="text-xl font-bold mb-4">{{ $editMode ? 'Edit Kandidat' : 'Tambah Kandidat' }}</h3>
                
                <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Nama Kandidat</label>
                        <input wire:model="candidates_name" type="text" class="w-full px-4 py-2 border rounded-lg" required>
                        @error('candidates_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Deskripsi</label>
                        <textarea wire:model="description" rows="3" class="w-full px-4 py-2 border rounded-lg"></textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Visi</label>
                        <textarea wire:model="vision" rows="3" class="w-full px-4 py-2 border rounded-lg"></textarea>
                        @error('vision') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Misi</label>
                        <textarea wire:model="mission" rows="4" class="w-full px-4 py-2 border rounded-lg"></textarea>
                        @error('mission') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Foto Kandidat</label>
                        
                        @if($editMode && $existingPhoto && !$photo)
                            <div class="mb-2">
                                <img src="{{ Storage::url($existingPhoto) }}" class="w-32 h-32 object-cover rounded">
                                <p class="text-sm text-gray-600 mt-1">Foto saat ini</p>
                            </div>
                        @endif
                        
                        <input wire:model="photo" type="file" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
                        @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        
                        @if ($photo)
                            <div class="mt-2">
                                <img src="{{ $photo->temporaryUrl() }}" class="w-32 h-32 object-cover rounded">
                                <p class="text-sm text-gray-600 mt-1">Preview foto baru</p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            {{ $editMode ? 'Update' : 'Simpan' }}
                        </button>
                        <button type="button" wire:click="closeModal" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>