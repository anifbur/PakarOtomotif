<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expert System - Motor Matic</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind CSS (via Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js for lightweight interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-zinc-950 text-zinc-300 min-h-screen flex flex-col selection:bg-rose-500 selection:text-white">

    <!-- Navigation -->
    <nav class="bg-zinc-900/80 backdrop-blur-md border-b border-zinc-800 sticky top-0 z-50 shadow-xl" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo & Brand -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-rose-500 to-orange-500 flex items-center justify-center shadow-lg shadow-rose-500/20 group-hover:shadow-rose-500/40 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold tracking-tight text-white group-hover:text-rose-400 transition-colors">Matic<span class="text-rose-500">Expert</span></span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden sm:flex sm:items-center sm:space-x-1">
                    <a href="{{ route('gejala.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-zinc-800 hover:text-white transition-colors {{ request()->routeIs('gejala.*') ? 'bg-zinc-800 text-white' : 'text-zinc-400' }}">Gejala</a>
                    <a href="{{ route('diagnosa.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-zinc-800 hover:text-white transition-colors {{ request()->routeIs('diagnosa.*') ? 'bg-zinc-800 text-white' : 'text-zinc-400' }}">Diagnosa</a>
                    <a href="{{ route('rule.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-zinc-800 hover:text-white transition-colors {{ request()->routeIs('rule.*') ? 'bg-zinc-800 text-white' : 'text-zinc-400' }}">Rules</a>
                    <div class="w-px h-6 bg-zinc-800 mx-2"></div>
                    <a href="/konsultasi" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-zinc-800 hover:text-white transition-colors {{ request()->is('konsultasi') ? 'bg-zinc-800 text-white' : 'text-zinc-400' }}">Konsultasi</a>
                    <a href="/riwayat-diagnosa" class="px-4 py-2 rounded-lg text-sm font-medium hover:bg-zinc-800 hover:text-white transition-colors {{ request()->is('riwayat-diagnosa') ? 'bg-zinc-800 text-white' : 'text-zinc-400' }}">Riwayat</a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center sm:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-zinc-400 hover:text-white hover:bg-zinc-800 focus:outline-none transition-colors">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24" x-show="!mobileMenuOpen">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24" x-show="mobileMenuOpen" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition.opacity class="sm:hidden border-t border-zinc-800 bg-zinc-900" style="display: none;">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('gejala.index') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-zinc-800 hover:text-white {{ request()->routeIs('gejala.*') ? 'bg-zinc-800 text-white' : 'text-zinc-400' }}">Gejala</a>
                <a href="{{ route('diagnosa.index') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-zinc-800 hover:text-white {{ request()->routeIs('diagnosa.*') ? 'bg-zinc-800 text-white' : 'text-zinc-400' }}">Diagnosa</a>
                <a href="{{ route('rule.index') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-zinc-800 hover:text-white {{ request()->routeIs('rule.*') ? 'bg-zinc-800 text-white' : 'text-zinc-400' }}">Rules</a>
                <a href="/konsultasi" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-zinc-800 hover:text-white {{ request()->is('konsultasi') ? 'bg-zinc-800 text-white' : 'text-zinc-400' }}">Konsultasi</a>
                <a href="/riwayat-diagnosa" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-zinc-800 hover:text-white {{ request()->is('riwayat-diagnosa') ? 'bg-zinc-800 text-white' : 'text-zinc-400' }}">Riwayat</a>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-grow flex flex-col">
        <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8 flex-grow flex flex-col">
            
            <!-- Global Alerts -->
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" class="mb-6 rounded-xl bg-emerald-500/10 border border-emerald-500/20 p-4 flex items-start gap-4" x-transition.opacity>
                    <div class="flex-shrink-0 mt-0.5">
                        <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-1 text-sm text-emerald-300 font-medium">
                        {{ session('success') }}
                    </div>
                    <button @click="show = false" class="text-emerald-400 hover:text-emerald-300 transition-colors">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div x-data="{ show: true }" x-show="show" class="mb-6 rounded-xl bg-rose-500/10 border border-rose-500/20 p-4 flex items-start gap-4" x-transition.opacity>
                    <div class="flex-shrink-0 mt-0.5">
                        <svg class="h-5 w-5 text-rose-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-1 text-sm text-rose-300 font-medium">
                        {{ session('error') }}
                    </div>
                    <button @click="show = false" class="text-rose-400 hover:text-rose-300 transition-colors">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @endif

            <!-- Page Content -->
            <div class="flex-grow">
                @yield('content')
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-zinc-800 bg-zinc-950/50 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-zinc-500 text-sm">
                &copy; {{ date('Y') }} Sistem Pakar Motor Matic. All rights reserved.
            </div>
            <div class="flex items-center gap-4 text-sm text-zinc-600">
                <span>Didesain dengan <span class="text-rose-500">&hearts;</span></span>
            </div>
        </div>
    </footer>

</body>
</html>