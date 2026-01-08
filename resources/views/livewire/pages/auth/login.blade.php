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
        <div class="text-center mb-12">
            <h1 class="text-3xl font-semibold text-soft-navy mb-2">Welcome Back</h1>
            <p class="text-pastel-blue text-sm">Sign in to access your account</p>
        </div>

        <!-- Applied elegant-card styling to form container -->
        <div class="elegant-card p-8 md:p-10">
            <form wire:submit="login" class="space-y-6">
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
                        <a 
                            class="text-sm text-champagne-gold hover:text-soft-navy transition-colors duration-300 font-medium" 
                            href="{{ route('password.request') }}" 
                            wire:navigate
                        >
                            {{ __('Forgot password?') }}
                        </a>
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

            <!-- Added elegant divider and signup link -->
            <div class="divider-elegant"></div>

            <p class="text-center text-sm text-soft-navy">
                {{ __('New to our platform?') }}
                <a href="#" class="font-semibold text-champagne-gold hover:text-pastel-blue transition-colors duration-300">
                    {{ __('Create an account') }}
                </a>
            </p>
        </div>
    </div>
</div>
