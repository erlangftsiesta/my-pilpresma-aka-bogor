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
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        
        <style>
            :root {
                --soft-navy: #2c3e50;
                --pastel-blue: #a8c5dd;
                --light-blue: #dce9f5;
                --champagne-gold: #e8d7b8;
                --off-white: #fafbfc;
                --deep-blue: #1a2332;
            }
            
            body {
                font-family: 'Open Sans', sans-serif;
                background: linear-gradient(180deg, var(--light-blue) 0%, var(--deep-blue) 100%);
                min-height: 100vh;
                color: var(--soft-navy);
            }
            
            h1, h2, h3, h4, h5, h6 {
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
            }
        </style>
    </head>
    <body class="antialiased">
        @include('layouts.navigation')
        <div class="min-h-screen">

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white/90 backdrop-blur-md">
                    <div class="max-w-7xl mx-auto py-12 px-6 sm:px-8 lg:px-12">
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
