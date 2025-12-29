<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Status Card -->
        <div class="bg-white rounded-lg shadow mb-6 p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Status Periode Voting</h3>
            
            @if($currentPeriod)
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600">Periode Aktif:</p>
                        <p class="text-lg font-semibold">
                            {{ $currentPeriod->opened_time->format('d/m/Y H:i') }} - 
                            {{ $currentPeriod->closed_time->format('d/m/Y H:i') }}
                        </p>
                    </div>
                    
                    <div class="text-right">
                        <span class="px-4 py-2 rounded-full text-sm font-semibold {{ $isOpen ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $isOpen ? '🟢 Voting DIBUKA' : '🔴 Voting DITUTUP' }}
                        </span>
                    </div>
                </div>
            @else
                <p class="text-gray-500">Belum ada periode voting yang diatur</p>
            @endif
        </div>
        
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Manajemen Periode Voting</h3>
                <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Tambah Periode
                </button>
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu Dibuka</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu Ditutup</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($periods as $period)
                            @php
                                $now = \Carbon\Carbon::now();
                                $status = $now->between($period->opened_time, $period->closed_time) ? 'active' : 
                                         ($now->gt($period->closed_time) ? 'closed' : 'upcoming');
                            @endphp
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $period->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $period->opened_time->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $period->closed_time->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded 
                                        {{ $status == 'active' ? 'bg-green-100 text-green-800' : 
                                           ($status == 'upcoming' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                        {{ $status == 'active' ? 'Aktif' : ($status == 'upcoming' ? 'Akan Datang' : 'Selesai') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button wire:click="edit({{ $period->id }})" class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                    <button wire:click="delete({{ $period->id }})" 
                                            onclick="return confirm('Yakin hapus periode ini?')"
                                            class="text-red-600 hover:text-red-900">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-8 max-w-md w-full">
                <h3 class="text-xl font-bold mb-4">{{ $editMode ? 'Edit Periode' : 'Tambah Periode' }}</h3>
                
                <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Waktu Dibuka</label>
                        <input wire:model="opened_time" type="datetime-local" class="w-full px-4 py-2 border rounded-lg" required>
                        @error('opened_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Waktu Ditutup</label>
                        <input wire:model="closed_time" type="datetime-local" class="w-full px-4 py-2 border rounded-lg" required>
                        @error('closed_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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