<div class="py-12 bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-slate-800 to-slate-700 p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h3
                            class="text-2xl font-bold text-white font-bold from-blue-900 to-blue-950 mb-1">
                            Manajemen Kandidat</h3>
                        <p class="text-slate-300 text-sm">Kelola data kandidat pemilihan</p>
                    </div>
                    <button wire:click="create"
                        class="bg-blue-500 hover:bg-blue-600 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950 px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Kandidat
                    </button>
                </div>
            </div>

            @if (session()->has('message'))
            <div
                class="m-6 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-300 text-green-800 px-5 py-4 rounded-xl flex items-center gap-3 shadow-md">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-semibold">{{ session('message') }}</span>
            </div>
            @endif

            <!-- Candidates Grid -->
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($candidates as $candidate)
                <div
                    class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-transparent hover:border-blue-300 transform hover:-translate-y-2">
                    <!-- Photo Section -->
                    <div class="relative overflow-hidden">
                        @if($candidate->path_candidates_photos)
                        <img src="{{ Storage::url($candidate->path_candidates_photos) }}"
                            alt="{{ $candidate->candidates_name }}"
                            class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                        <div
                            class="w-full h-56 bg-gradient-to-br from-slate-200 to-blue-200 flex flex-col items-center justify-center">
                            <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="text-slate-400 font-medium mt-2">No Photo</span>
                        </div>
                        @endif

                        <!-- Gradient Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>

                        <!-- Floating Badge -->
                        <div
                            class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-lg shadow-lg">
                            <span class="text-xs font-bold text-blue-600">KANDIDAT</span>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="p-5">
                        <h4 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-blue-600 transition-colors">
                            {{ $candidate->candidates_name }}
                        </h4>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                            {{ $candidate->description ?: 'Tidak ada deskripsi' }}
                        </p>

                        <!-- Action Buttons -->
                        <div class="flex gap-2 mt-4">
                            <button wire:click="edit({{ $candidate->id }})"
                                class="flex-1 bg-blue-500 hover:bg-blue-600 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950 px-4 py-2.5 rounded-xl text-sm font-semibold shadow hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </button>
                            <button wire:click="delete({{ $candidate->id }})"
                                onclick="return confirm('Yakin hapus kandidat ini?')"
                                class="flex-1 bg-red-500 hover:bg-red-600 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950 px-4 py-2.5 rounded-xl text-sm font-semibold shadow hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
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
    <div
        class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4 overflow-y-auto animate-fadeIn">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full my-8 transform animate-slideUp">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-slate-800 to-slate-700 p-6 rounded-t-2xl">
                <h3
                    class="text-2xl font-bold font-bold text-white flex items-center gap-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    {{ $editMode ? 'Edit Kandidat' : 'Tambah Kandidat Baru' }}
                </h3>
            </div>

            <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}" enctype="multipart/form-data"
                class="p-6 space-y-5 max-h-[calc(100vh-200px)] overflow-y-auto">
                <!-- Nama Kandidat -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Nama Kandidat
                    </label>
                    <input wire:model="candidates_name" type="text"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all"
                        placeholder="Masukkan nama kandidat" required>
                    @error('candidates_name')
                    <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                        Deskripsi
                    </label>
                    <textarea wire:model="description" rows="3"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all resize-none"
                        placeholder="Masukkan deskripsi singkat kandidat"></textarea>
                    @error('description')
                    <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Visi -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Visi
                    </label>
                    <textarea wire:model="vision" rows="3"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all resize-none"
                        placeholder="Masukkan visi kandidat"></textarea>
                    @error('vision')
                    <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Misi -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Misi
                    </label>
                    <textarea wire:model="mission" rows="4"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all resize-none"
                        placeholder="Masukkan misi kandidat"></textarea>
                    @error('mission')
                    <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Foto Kandidat -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Foto Kandidat
                    </label>

                    @if($editMode && $existingPhoto && !$photo)
                    <div class="mb-3 relative inline-block">
                        <img src="{{ Storage::url($existingPhoto) }}"
                            class="w-40 h-40 object-cover rounded-xl shadow-lg border-4 border-white">
                        <div
                            class="absolute -bottom-2 -right-2 bg-blue-500 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950 text-xs font-bold px-3 py-1 rounded-lg shadow">
                            Foto Saat Ini
                        </div>
                    </div>
                    @endif

                    <div class="relative">
                        <input wire:model="photo" type="file" accept="image/*"
                            class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-900 file:from-blue-500 to-blue-600 font-bold from-blue-900 to-blue-950 file:font-semibold hover:file:bg-blue-600 file:cursor-pointer cursor-pointer text-white">
                    </div>

                    @error('photo')
                    <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span>
                    @enderror

                    @if ($photo)
                    <div class="mt-4 relative inline-block">
                        <img src="{{ $photo->temporaryUrl() }}"
                            class="w-40 h-40 object-cover rounded-xl shadow-lg border-4 border-white">
                        <div
                            class="absolute -bottom-2 -right-2 bg-green-500 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950 text-xs font-bold px-3 py-1 rounded-lg shadow flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Preview Foto Baru
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 pt-4 border-t">
                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950 px-6 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center justify-center gap-2 text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ $editMode ? 'Update' : 'Simpan' }}
                    </button>
                    <button type="button" wire:click="closeModal"
                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-xl font-bold shadow hover:shadow-md transition-all duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.3s ease-out;
    }

    .animate-slideUp {
        animation: slideUp 0.3s ease-out;
    }
    </style>
    @endif
</div>