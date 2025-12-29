<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Terima Kasih') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 text-center">
                    <div class="mb-6">
                        <svg class="w-24 h-24 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">Terima Kasih!</h1>
                    <p class="text-xl text-gray-600 mb-8">Suara Anda telah berhasil tercatat.</p>
                    
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 max-w-md mx-auto">
                        <p class="text-gray-700">
                            Partisipasi Anda sangat berarti untuk menentukan pemimpin yang terbaik.
                        </p>
                    </div>
                    
                    <div class="mt-8">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>