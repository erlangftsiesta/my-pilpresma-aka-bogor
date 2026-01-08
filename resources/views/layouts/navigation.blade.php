<nav
  x-data="{ open: false }"
  class="sticky top-0 z-50 bg-white/95 border-b border-[var(--champagne-gold)]/30"
>

  <div class="backdrop-blur-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-[var(--pastel-blue)] to-[var(--soft-navy)] rounded-lg flex items-center justify-center">
                            <span class="text-white font-['Poppins'] font-bold text-xl">E</span>
                        </div>
                        <span class="font-['Poppins'] text-2xl font-semibold text-[var(--soft-navy)]">
                            Institution
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ml-12 sm:flex items-center">
    @if(auth()->user()->isAdmin())
        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')"
            class="elegant-nav-link">
            Dashboard
        </x-nav-link>

        <x-nav-link :href="route('admin.users')" :active="request()->routeIs('admin.users')"
            class="elegant-nav-link">
            Users
        </x-nav-link>

        <x-nav-link :href="route('admin.candidates')" :active="request()->routeIs('admin.candidates')"
            class="elegant-nav-link">
            Kandidat
        </x-nav-link>

        <x-nav-link :href="route('admin.votes')" :active="request()->routeIs('admin.votes')"
            class="elegant-nav-link">
            Voting
        </x-nav-link>

        <x-nav-link :href="route('admin.periods')" :active="request()->routeIs('admin.periods')"
            class="elegant-nav-link">
            Periode
        </x-nav-link>
    @else
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
            class="elegant-nav-link">
            Dashboard
        </x-nav-link>

        <x-nav-link :href="route('candidates')" :active="request()->routeIs('candidates.*')"
            class="elegant-nav-link">
            Kandidat
        </x-nav-link>
    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-6 py-3 border border-[var(--champagne-gold)] rounded-full text-sm leading-4 font-medium text-[var(--soft-navy)] bg-white hover:bg-[var(--off-white)] focus:outline-none transition-all duration-300 space-x-2">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[var(--soft-navy)] hover:bg-[var(--off-white)] transition-all duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
   </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('candidates')" :active="request()->routeIs('candidates.*')">
                {{ __('Kandidat') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-[var(--champagne-gold)]/30">
            <div class="px-4">
                <div class="font-medium text-base text-[var(--soft-navy)]">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-[var(--pastel-blue)]">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    .elegant-nav-link {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        padding: 0.75rem 1.5rem;
        border-radius: 9999px;
        transition: all 0.3s ease;
        color: var(--soft-navy);
    }
    
    .elegant-nav-link:hover {
        background-color: var(--off-white);
    }
    
    .elegant-nav-link.active {
        background-color: white;
        border: 1px solid var(--champagne-gold);
        color: var(--soft-navy);
    }
</style>
