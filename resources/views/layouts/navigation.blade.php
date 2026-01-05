<nav class="bg-[var(--navy-blue)] shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-[var(--warm-gold)] to-amber-500 rounded-2xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <span class="text-white font-bold text-xl">{{ config('app.name', 'Institutional') }}</span>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:ml-10 sm:flex">
                    <a href="{{ route('candidates') }}" 
                       class="text-white hover:bg-white/10 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-105">
                        Kandidat
                    </a>
                    <a href="#" 
                       class="text-white/80 hover:text-white hover:bg-white/10 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-105">
                        Tentang
                    </a>
                    <a href="#" 
                       class="text-white/80 hover:text-white hover:bg-white/10 px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-105">
                        Kontak
                    </a>
                </div>
            </div>

            <!-- Right Side Navigation -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <div class="ml-3 relative">
                        <button class="flex items-center space-x-2 text-white bg-white/10 hover:bg-white/20 px-4 py-2 rounded-xl transition-all duration-300 hover:scale-105 font-semibold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ Auth::user()->name }}</span>
                        </button>
                    </div>
                @else
                    <a href="{{ route('login') }}" 
                       class="text-white bg-[var(--warm-gold)] hover:bg-amber-500 px-6 py-2.5 rounded-xl font-semibold text-sm transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                        Login
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button class="text-white hover:bg-white/10 p-2 rounded-xl transition-colors">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
