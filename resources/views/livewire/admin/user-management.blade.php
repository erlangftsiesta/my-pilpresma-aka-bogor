<div class="py-12 bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-slate-800 to-slate-700 p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 mb-1">Manajemen User</h3>
                        <p class="text-slate-300 text-sm">Kelola data pengguna sistem voting</p>
                    </div>
                    <div class="flex gap-3">
                        <button wire:click="export" 
                            class="bg-green-500 hover:bg-green-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 px-10 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Export Excel
                        </button>
                        <button wire:click="create" 
                            class="bg-blue-500 hover:bg-blue-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 px-10 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah User
                        </button>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="p-6 bg-gradient-to-r from-slate-50 to-blue-50">
                <div class="relative">
                    <!-- <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div> -->
                    <input wire:model.live="search" type="text" placeholder="Cari username atau nama lengkap..."
                        class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 shadow-sm">
                </div>
            </div>

            @if (session()->has('message'))
            <div class="mx-6 mt-6 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-300 text-green-800 px-5 py-4 rounded-xl flex items-center gap-3 shadow-md">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-semibold">{{ session('message') }}</span>
            </div>
            @endif

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-slate-100 to-blue-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Username
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Password
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                    </svg>
                                    Nama Lengkap
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    Kelas
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Role
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($users as $user)
                        <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-slate-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 font-bold shadow-md">
                                        {{ strtoupper(substr($user->username, 0, 1)) }}
                                    </div>
                                    <span class="font-semibold text-gray-800">{{ $user->username }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-mono text-sm bg-gray-100 px-3 py-1 rounded-lg">{{ $user->first_password }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $user->nama_lengkap }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-gradient-to-r from-slate-100 to-blue-100 text-slate-700 px-3 py-1 rounded-lg font-medium text-sm">
                                    {{ $user->class_relation->class_name ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1.5 text-xs font-bold rounded-lg shadow-sm
                                    {{ $user->role == 'admin' 
                                        ? 'bg-gradient-to-r from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600' 
                                        : 'bg-gradient-to-r from-blue-500 to-blue-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600' }}">
                                    {{ strtoupper($user->role) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex gap-2">
                                    <button wire:click="edit({{ $user->id }})"
                                        class="bg-blue-500 hover:bg-blue-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 px-4 py-2 rounded-lg font-semibold shadow hover:shadow-md transition-all duration-200 flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $user->id }})"
                                        onclick="return confirm('Yakin hapus user ini?')"
                                        class="bg-red-500 hover:bg-red-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 px-4 py-2 rounded-lg font-semibold shadow hover:shadow-md transition-all duration-200 flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-6 bg-gradient-to-r from-slate-50 to-blue-50 border-t">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if($showModal)
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4 animate-fadeIn">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform animate-slideUp">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-slate-800 to-slate-700 p-6 rounded-t-2xl">
                <h3 class="text-2xl font-bold from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 flex items-center gap-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    {{ $editMode ? 'Edit User' : 'Tambah User Baru' }}
                </h3>
            </div>

            <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}" class="p-6 space-y-5">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Username
                    </label>
                    <input wire:model="username" type="text" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all" 
                        placeholder="Masukkan username" required>
                    @error('username') <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>
                        Nama Lengkap
                    </label>
                    <input wire:model="nama_lengkap" type="text" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all" 
                        placeholder="Masukkan nama lengkap" required>
                    @error('nama_lengkap') <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Password
                        @if($editMode)
                        <span class="text-xs text-gray-500">(kosongkan jika tidak diubah)</span>
                        @endif
                    </label>
                    <input wire:model="password" type="password" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all" 
                        placeholder="Masukkan password" {{ $editMode ? '' : 'required' }}>
                    @error('password') <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Kelas
                    </label>
                    <select wire:model="class_id" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all" required>
                        <option value="">Pilih Kelas</option>
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                    @error('class_id') <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        Role
                    </label>
                    <select wire:model="role" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all" required>
                        <option value="pemilih">Pemilih</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role') <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span> @enderror
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit" 
                        class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 from-purple-500 to-purple-600 font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 px-6 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ $editMode ? 'Update' : 'Simpan' }}
                    </button>
                    <button type="button" wire:click="closeModal"
                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-xl font-bold shadow hover:shadow-md transition-all duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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