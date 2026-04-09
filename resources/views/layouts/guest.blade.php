<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="jalan.in — Laporkan dan perbaiki infrastruktur jalan kita bersama.">

        <title>{{ config('app.name', 'jalan.in') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased antigravity-bg min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">

        {{-- Infrastructure Grid --}}
        <div class="infra-grid"></div>

        {{-- Floating SVG Infrastructure Elements --}}
        <div class="floating-elements hidden sm:block" aria-hidden="true">

            {{-- Location Pin --}}
            <div class="floating-element float-1" style="top: 12%; left: 8%;">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 3C12.48 3 8 7.48 8 13C8 20.25 18 33 18 33C18 33 28 20.25 28 13C28 7.48 23.52 3 18 3ZM18 16.5C16.07 16.5 14.5 14.93 14.5 13C14.5 11.07 16.07 9.5 18 9.5C19.93 9.5 21.5 11.07 21.5 13C21.5 14.93 19.93 16.5 18 16.5Z" fill="rgba(107,29,42,0.08)"/>
                </svg>
            </div>

            {{-- Road Fragment 1 --}}
            <div class="floating-element float-2" style="top: 25%; right: 10%;">
                <svg width="80" height="12" viewBox="0 0 80 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0" y="0" width="80" height="12" rx="6" fill="rgba(107,29,42,0.04)"/>
                    <rect x="10" y="4" width="16" height="4" rx="2" fill="rgba(107,29,42,0.08)"/>
                    <rect x="34" y="4" width="16" height="4" rx="2" fill="rgba(107,29,42,0.08)"/>
                    <rect x="58" y="4" width="16" height="4" rx="2" fill="rgba(107,29,42,0.08)"/>
                </svg>
            </div>

            {{-- Geometric hexagon --}}
            <div class="floating-element float-3" style="bottom: 20%; left: 5%;">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="24,4 44,14 44,34 24,44 4,34 4,14" stroke="rgba(107,29,42,0.06)" stroke-width="1.5" fill="none"/>
                    <polygon points="24,12 36,18 36,30 24,36 12,30 12,18" stroke="rgba(107,29,42,0.04)" stroke-width="1" fill="none"/>
                </svg>
            </div>

            {{-- Infrastructure line --}}
            <div class="floating-element float-4" style="top: 65%; right: 6%;">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0" y1="30" x2="60" y2="30" stroke="rgba(107,29,42,0.05)" stroke-width="1.5"/>
                    <line x1="30" y1="0" x2="30" y2="60" stroke="rgba(107,29,42,0.05)" stroke-width="1.5"/>
                    <circle cx="30" cy="30" r="4" fill="rgba(107,29,42,0.06)"/>
                </svg>
            </div>

            {{-- Small dot cluster --}}
            <div class="floating-element float-5" style="top: 8%; right: 30%;">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="5" cy="5" r="2.5" fill="rgba(107,29,42,0.06)"/>
                    <circle cx="20" cy="8" r="3.5" fill="rgba(107,29,42,0.04)"/>
                    <circle cx="10" cy="22" r="2" fill="rgba(107,29,42,0.05)"/>
                    <circle cx="25" cy="25" r="1.5" fill="rgba(107,29,42,0.07)"/>
                </svg>
            </div>

            {{-- Asphalt Fragment --}}
            <div class="floating-element float-6" style="bottom: 15%; right: 25%;">
                <svg width="44" height="32" viewBox="0 0 44 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 0H40C42.2 0 44 1.8 44 4V28C44 30.2 42.2 32 40 32H4C1.8 32 0 30.2 0 28V4C0 1.8 1.8 0 4 0Z" fill="rgba(107,29,42,0.03)"/>
                    <rect x="6" y="14" width="10" height="4" rx="2" fill="rgba(107,29,42,0.06)"/>
                    <rect x="22" y="14" width="10" height="4" rx="2" fill="rgba(107,29,42,0.06)"/>
                </svg>
            </div>

            {{-- Triangle --}}
            <div class="floating-element float-2" style="top: 45%; left: 3%;">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="16,2 30,28 2,28" stroke="rgba(107,29,42,0.06)" stroke-width="1.5" fill="none"/>
                </svg>
            </div>

            {{-- Road fragment 2 --}}
            <div class="floating-element float-1" style="bottom: 30%; left: 15%;">
                <svg width="50" height="8" viewBox="0 0 50 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="50" height="8" rx="4" fill="rgba(107,29,42,0.04)"/>
                    <rect x="8" y="2.5" width="10" height="3" rx="1.5" fill="rgba(107,29,42,0.07)"/>
                    <rect x="24" y="2.5" width="10" height="3" rx="1.5" fill="rgba(107,29,42,0.07)"/>
                </svg>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="w-full max-w-md relative z-10 sm:max-w-lg">
            {{ $slot }}
        </div>

    </body>
</html>
