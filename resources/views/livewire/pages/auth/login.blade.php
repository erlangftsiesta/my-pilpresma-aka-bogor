<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="elegant-bg flex items-center justify-center min-h-screen px-4 py-12">
        <div class="w-full max-w-md">
            <!-- Added elegant header section with title and description -->
<div class="rounded-xl relative overflow-hidden mb-6">
        <img 
            src="{{ asset('images/login-banner-cover.jpg') }}" 
            alt="PIPRESMA Header" 
            class="w-full h-52 sm:h-72 md:h-96 lg:h-[28rem] object-cover"
        />
        
        <!-- Gradient overlay biar elegan & nyambung ke background -->
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black/70"></div>
    </div>

        <!-- Applied elegant-card styling to form container -->
        <div class="elegant-card p-8 md:p-10">
            <form wire:submit="login" class="space-y-6">
                <center>
                    <h1 class="bg-gradient-to-r from-blue-500 to-blue-600 from-purple-500 to-purple-600 font-bold text-2xl">MyPilpresma</h1>
                </center>
                <!-- Email/Username Address -->
                <div>
                    <label for="username" class="block text-sm font-medium text-soft-navy mb-2">
                        {{ __('Username') }}
                    </label>
                    <input 
                        wire:model="form.username" 
                        id="username" 
                        class="input-elegant w-full" 
                        type="text" 
                        name="username" 
                        required 
                        autofocus 
                        autocomplete="username"
                        placeholder="Enter your username"
                    />
                    <x-input-error :messages="$errors->get('form.username')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-soft-navy mb-2">
                        {{ __('Password') }}
                    </label>
                    <input 
                        wire:model="form.password" 
                        id="password" 
                        class="input-elegant w-full"
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password"
                        placeholder="Enter your password"
                    />
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Styled remember me checkbox with elegant appearance -->
                <div class="flex items-center justify-between">
                    <label for="remember" class="inline-flex items-center cursor-pointer">
                        <input 
                            wire:model="form.remember" 
                            id="remember" 
                            type="checkbox" 
                            name="remember"
                            class="w-4 h-4 border-champagne-gold text-champagne-gold rounded focus:ring-2 focus:ring-pastel-blue"
                        >
                        <span class="ms-2 text-sm text-soft-navy">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <!-- <a 
                            class="text-sm text-champagne-gold hover:text-soft-navy transition-colors duration-300 font-medium" 
                            href="{{ route('password.request') }}" 
                            wire:navigate
                        >
                            {{ __('Forgot password?') }}
                        </a> -->
                    @endif
                </div>

                <!-- Applied btn-elegant styling to login button with full width -->
                <button 
                    type="submit" 
                    class="btn-elegant w-full mt-8 bg-gradient-to-r from-champagne-gold to-pastel-blue text-soft-navy font-semibold shadow-elegant hover:shadow-elegant-lg"
                >
                    {{ __('Sign In') }}
                </button>
            </form>
        </div>
    </div>
</div>
