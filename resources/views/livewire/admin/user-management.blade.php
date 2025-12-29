<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Manajemen User</h3>
                <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Tambah User
                </button>
                <div class="flex gap-2">
                    <button wire:click="export" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Export Excel
                    </button>
                    <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        + Tambah User
                    </button>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="p-6 border-b">
                <input wire:model.live="search" type="text" placeholder="Cari username atau nama..."
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            @if (session()->has('message'))
            <div class="m-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('message') }}
            </div>
            @endif

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Username</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Password</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Lengkap
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->username }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->first_password }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->nama_lengkap }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->class_relation->class_name ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 py-1 text-xs rounded {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button wire:click="edit({{ $user->id }})"
                                    class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                <button wire:click="delete({{ $user->id }})"
                                    onclick="return confirm('Yakin hapus user ini?')"
                                    class="text-red-600 hover:text-red-900">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if($showModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 max-w-md w-full">
            <h3 class="text-xl font-bold mb-4">{{ $editMode ? 'Edit User' : 'Tambah User' }}</h3>

            <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Username</label>
                    <input wire:model="username" type="text" class="w-full px-4 py-2 border rounded-lg" required>
                    @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                    <input wire:model="nama_lengkap" type="text" class="w-full px-4 py-2 border rounded-lg" required>
                    @error('nama_lengkap') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Password
                        {{ $editMode ? '(kosongkan jika tidak diubah)' : '' }}</label>
                    <input wire:model="password" type="password" class="w-full px-4 py-2 border rounded-lg"
                        {{ $editMode ? '' : 'required' }}>
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Kelas</label>
                    <select wire:model="class_id" class="w-full px-4 py-2 border rounded-lg" required>
                        <option value="">Pilih Kelas</option>
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                    @error('class_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Role</label>
                    <select wire:model="role" class="w-full px-4 py-2 border rounded-lg" required>
                        <option value="pemilih">Pemilih</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        {{ $editMode ? 'Update' : 'Simpan' }}
                    </button>
                    <button type="button" wire:click="closeModal"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>