<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voting Ditutup') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 text-center">
                    <div class="mb-6">
                        <svg class="w-24 h-24 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">Periode Voting Ditutup</h1>
                    <p class="text-xl text-gray-600 mb-8">Saat ini periode voting sudah berakhir atau belum dibuka.</p>
                    
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 max-w-md mx-auto">
                        <p class="text-gray-700">
                            Silakan hubungi administrator untuk informasi lebih lanjut mengenai periode voting.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>