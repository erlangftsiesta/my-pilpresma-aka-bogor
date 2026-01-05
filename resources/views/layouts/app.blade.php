<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        
        <style>
            :root {
                --navy-blue: #1e3a5f;
                --sky-blue: #60a5fa;
                --warm-gold: #f59e0b;
                --soft-white: #ffffff;
                --bg-light: #f0f7ff;
            }
            
            body {
                font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
                background: linear-gradient(135deg, #e0f2fe 0%, #bfdbfe 50%, #93c5fd 100%);
                min-height: 100vh;
                color: var(--navy-blue);
                position: relative;
                overflow-x: hidden;
            }
            
            /* Abstract wave shapes */
            body::before {
                content: '';
                position: fixed;
                top: -50%;
                right: -10%;
                width: 800px;
                height: 800px;
                background: radial-gradient(circle, rgba(96, 165, 250, 0.15) 0%, transparent 70%);
                border-radius: 50%;
                z-index: 0;
                animation: float 20s ease-in-out infinite;
            }
            
            body::after {
                content: '';
                position: fixed;
                bottom: -30%;
                left: -5%;
                width: 600px;
                height: 600px;
                background: radial-gradient(circle, rgba(245, 158, 11, 0.1) 0%, transparent 70%);
                border-radius: 50%;
                z-index: 0;
                animation: float 15s ease-in-out infinite reverse;
            }
            
            @keyframes float {
                0%, 100% { transform: translate(0, 0) scale(1); }
                50% { transform: translate(-30px, 30px) scale(1.05); }
            }
            
            h1, h2, h3, h4, h5, h6 {
                font-family: 'Plus Jakarta Sans', sans-serif;
                font-weight: 800;
            }
            
            .content-wrapper {
                position: relative;
                z-index: 1;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen content-wrapper">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white/80 backdrop-blur-sm shadow-sm border-b-2 border-[var(--warm-gold)]">
                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
    </body>
</html>
