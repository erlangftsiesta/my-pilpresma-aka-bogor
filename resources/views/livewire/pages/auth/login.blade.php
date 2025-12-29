<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<!-- Google Fonts CDN untuk Arial -->
<link href="https://fonts.googleapis.com/css2?family=Arial:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
* {
    font-family: 'Arial', sans-serif;
}

.login-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.login-card {
    background: white;
    border-radius: 24px;
    padding: 48px 40px;
    max-width: 440px;
    width: 100%;
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
}

.mascot-area {
    text-align: center;
    margin-bottom: 32px;
}

.mascot-circle {
    width: 80px;
    height: 80px;
    /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    box-shadow: 0 8px 24px rgba(102, 126, 234, 0.4);
}

.mascot-icon {
    font-size: 40px;
}

.welcome-text {
    font-size: 28px;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 8px;
}

.subtitle-text {
    font-size: 15px;
    color: #718096;
    font-weight: 400;
}

.form-group {
    margin-bottom: 24px;
}

.form-label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 8px;
}

.form-input {
    width: 100%;
    padding: 14px 16px;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 15px;
    transition: all 0.2s;
    background: #f7fafc;
}

.form-input:focus {
    outline: none;
    border-color: #667eea;
    background: white;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.error-message {
    color: #e53e3e;
    font-size: 13px;
    margin-top: 6px;
    font-weight: 500;
}

.remember-section {
    display: flex;
    align-items: center;
    margin-bottom: 24px;
}

.checkbox-custom {
    width: 20px;
    height: 20px;
    border-radius: 6px;
    cursor: pointer;
    accent-color: #667eea;
}

.checkbox-label {
    margin-left: 10px;
    font-size: 14px;
    color: #4a5568;
    font-weight: 500;
    cursor: pointer;
}

.btn-login {
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    box-shadow: 0 4px 16px rgba(102, 126, 234, 0.3);
}

.btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(102, 126, 234, 0.4);
}

.btn-login:active {
    transform: translateY(0);
}

@media (max-width: 480px) {
    .login-card {
        padding: 36px 24px;
    }

    .welcome-text {
        font-size: 24px;
    }
}
</style>

<div class="login-container">
    <div class="login-card">
        <!-- Mascot Area -->
        <div class="mascot-area">
            <div class="mascot-circle">
                <span class="mascot-icon"><img src="{{ asset('images/maskot1.jfif') }}" alt="Login">
                </span>
            </div>
            <h1 class="welcome-text">Halo, Selamat Datang!</h1>
            <p class="subtitle-text">Masuk untuk melanjutkan</p>
        </div>

        <form wire:submit="login">
            <!-- Username -->
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input wire:model="form.username" id="username" class="form-input" type="text" name="username"
                    placeholder="Masukkan username kamu" required autofocus autocomplete="username" />
                @error('form.username')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input wire:model="form.password" id="password" class="form-input" type="password" name="password"
                    placeholder="Masukkan password kamu" required autocomplete="current-password" />
                @error('form.password')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="remember-section">
                <input wire:model="form.remember" id="remember" type="checkbox" class="checkbox-custom" name="remember">
                <label for="remember" class="checkbox-label">Ingat saya</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-login">
                Masuk
            </button>
        </form>
    </div>
</div>