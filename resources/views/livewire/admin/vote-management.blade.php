<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b">
                <h3 class="text-xl font-bold text-gray-800">Data Votes</h3>
                <div class="p-6 border-b flex justify-between items-center">
                    <h3 class="text-xl font-bold text-gray-800">Data Votes</h3>
                    <button wire:click="export" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Export Excel
                    </button>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="p-6 border-b">
                <input wire:model.live="search" type="text" placeholder="Cari nama pemilih atau kelas..."
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Pemilih
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kandidat Dipilih
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu Vote</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($votes as $index => $vote)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $votes->firstItem() + $index }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vote->user->nama_lengkap }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vote->user->class_relation->class_name ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vote->candidate->candidates_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vote->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button wire:click="delete({{ $vote->id }})"
                                    onclick="return confirm('Yakin hapus vote ini?')"
                                    class="text-red-600 hover:text-red-900">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-6">
                {{ $votes->links() }}
            </div>
        </div>
    </div>
</div>