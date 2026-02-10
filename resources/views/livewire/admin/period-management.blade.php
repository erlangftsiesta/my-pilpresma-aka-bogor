<div class="py-12 bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Status Card -->
        <div class="bg-white rounded-2xl shadow-xl mb-6 overflow-hidden">
            <div class="bg-gradient-to-r from-slate-800 to-slate-700 p-6">
                <h3 class="text-2xl font-bold from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950 text-white
 flex items-center gap-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Status Periode Voting
                </h3>
            </div>
            
            @if($currentPeriod)
            <div class="p-8">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Periode Aktif</p>
                        <div class="flex items-center gap-4">
                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 px-4 py-3 rounded-xl border-2 border-blue-200">
                                <div class="flex items-center gap-2 text-blue-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="font-bold">{{ $currentPeriod->opened_time->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                            <div class="bg-gradient-to-r from-red-50 to-orange-50 px-4 py-3 rounded-xl border-2 border-red-200">
                                <div class="flex items-center gap-2 text-red-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="font-bold">{{ $currentPeriod->closed_time->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ml-6">
                        @if($isOpen)
                        <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-8 py-4 rounded-2xl shadow-lg">
                            <div class="flex items-center gap-3 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950
">
                                <!-- <div class="relative">
                                    <div class="w-4 h-4 bg-white rounded-full animate-pulse"></div>
                                    <div class="absolute inset-0 w-4 h-4 bg-white rounded-full animate-ping"></div>
                                </div> -->
                                <span class="text-lg font-bold">🟢 VOTING DIBUKA</span>
                            </div>
                        </div>
                        @else
                        <div class="bg-gradient-to-r from-red-500 to-red-600 px-8 py-4 rounded-2xl shadow-lg">
                            <div class="flex items-center gap-3 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950
">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span class="text-lg font-bold text-white">🔴 VOTING DITUTUP</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @else
            <div class="p-8">
                <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border-2 border-yellow-300 rounded-xl p-6 flex items-center gap-4">
                    <svg class="w-12 h-12 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <div>
                        <p class="font-bold text-yellow-800 text-lg">Belum Ada Periode Voting</p>
                        <p class="text-yellow-700 text-sm">Silakan tambah periode voting untuk memulai</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
        
        <!-- Main Table -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-slate-800 to-slate-700 p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-bold from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950 text-white
 mb-1">Manajemen Periode Voting</h3>
                        <p class="text-slate-300 text-sm">Atur jadwal pembukaan dan penutupan voting</p>
                    </div>
                    <button wire:click="create" 
                        class="bg-blue-500 hover:bg-blue-600 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950
 px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Periode
                    </button>
                </div>
            </div>
            
            @if (session()->has('message'))
            <div class="m-6 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-300 text-green-800 px-5 py-4 rounded-xl flex items-center gap-3 shadow-md">
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                    </svg>
                                    ID
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Waktu Dibuka
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Waktu Ditutup
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Status
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
                        @foreach($periods as $period)
                            @php
                                $now = \Carbon\Carbon::now();
                                $status = $now->between($period->opened_time, $period->closed_time) ? 'active' : 
                                         ($now->gt($period->closed_time) ? 'closed' : 'upcoming');
                            @endphp
                            <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-slate-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-slate-400 to-slate-600 rounded-lg from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950 text-white
 font-bold text-sm shadow">
                                        {{ $period->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <div class="p-2 bg-green-100 rounded-lg">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <span class="font-semibold text-gray-800">{{ $period->opened_time->format('d/m/Y H:i') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <div class="p-2 bg-red-100 rounded-lg">
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </div>
                                        <span class="font-semibold text-gray-800">{{ $period->closed_time->format('d/m/Y H:i') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($status == 'active')
                                    <span class="px-4 py-2 text-xs font-bold rounded-xl bg-gradient-to-r from-green-500 to-emerald-600 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950
 shadow-md text-white flex items-center gap-2 w-fit">
                                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                        AKTIF
                                    </span>
                                    @elseif($status == 'upcoming')
                                    <span class="px-4 py-2 text-xs font-bold rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950
 shadow-md text-white flex items-center gap-2 w-fit">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        AKAN DATANG
                                    </span>
                                    @else
                                    <span class="px-4 py-2 text-xs font-bold rounded-xl bg-gradient-to-r from-gray-400 to-gray-500 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950
 shadow-md text-white flex items-center gap-2 w-fit">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        SELESAI
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex gap-2">
                                        <button wire:click="edit({{ $period->id }})" 
                                            class="bg-blue-500 hover:bg-blue-600 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950
 px-4 py-2 rounded-lg font-semibold shadow hover:shadow-md transition-all duration-200 flex items-center gap-1.5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </button>
                                        <button wire:click="delete({{ $period->id }})" 
                                            onclick="return confirm('Yakin hapus periode ini?')"
                                            class="bg-red-500 hover:bg-red-600 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950
 px-4 py-2 rounded-lg font-semibold shadow hover:shadow-md transition-all duration-200 flex items-center gap-1.5">
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
        </div>
    </div>
    
    <!-- Modal -->
    @if($showModal)
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4 animate-fadeIn">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform animate-slideUp">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-slate-800 to-slate-700 p-6 rounded-t-2xl">
                <h3 class="text-2xl font-bold from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950
 flex items-center text-white gap-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $editMode ? 'Edit Periode' : 'Tambah Periode Baru' }}
                </h3>
            </div>
            
            <form wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}" class="p-6 space-y-5">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Waktu Dibuka
                    </label>
                    <input wire:model="opened_time" type="datetime-local" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all" required>
                    @error('opened_time') 
                    <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span> 
                    @enderror
                </div>
                
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Waktu Ditutup
                    </label>
                    <input wire:model="closed_time" type="datetime-local" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all" required>
                    @error('closed_time') 
                    <span class="text-red-500 text-sm flex items-center gap-1 mt-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </span> 
                    @enderror
                </div>
                
                <div class="flex gap-3 pt-4 border-t">
                    <button type="submit" 
                        class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 from-purple-500 to-purple-600 font-bold from-blue-900 to-blue-950
 px-6 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center text-white justify-center gap-2">
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