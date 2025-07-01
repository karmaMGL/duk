<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DriveTest Pro - Master Your Driving Test')</title>
    <meta name="description" content="Comprehensive driving test preparation platform">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 h-full">
    <div class="min-h-full" x-data="{ mobileMenuOpen: false, userMenuOpen: false }">
        <!-- Navigation -->
        <nav class="border-b bg-white/80 backdrop-blur-sm sticky top-0 z-50">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i data-lucide="trophy" class="w-5 h-5 text-white"></i>
                        </div>
                        <span class="text-xl font-bold text-gray-900">DriveTest Pro</span>
                    </a>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-8">
                        @php
                            $navItems = [
                                ['href' => route('dashboard'), 'label' => 'Dashboard', 'icon' => 'trophy'],
                                ['href' => route('sections'), 'label' => 'Practice', 'icon' => 'book-open'],
                                ['href' => route('exams'), 'label' => 'Exams', 'icon' => 'clock'],
                                ['href' => route('road-signs'), 'label' => 'Road Signs', 'icon' => 'shield'],
                            ];
                        @endphp

                        @foreach($navItems as $item)
                            <a href="{{ $item['href'] }}"
                               class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->url() === $item['href'] ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                                <i data-lucide="{{ $item['icon'] }}" class="w-4 h-4"></i>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endforeach
                    </div>

                    <!-- User Menu -->
                    <div class="flex items-center space-x-4">
                        <span class="hidden sm:inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            Pro Plan
                        </span>

                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i data-lucide="user" class="w-4 h-4"></i>
                            </button>

                            <div x-show="open" 
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                 role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="{{ route('profile') }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">
                                        <i data-lucide="user" class="w-4 h-4 mr-2 inline-block"></i>
                                        Profile
                                    </a>
                                    <a href="{{ route('settings') }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">
                                        <i data-lucide="settings" class="w-4 h-4 mr-2 inline-block"></i>
                                        Settings
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">
                                            <i data-lucide="log-out" class="w-4 h-4 mr-2 inline-block"></i>
                                            Log out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile menu button -->
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none">
                            <i x-show="!mobileMenuOpen" data-lucide="menu" class="w-5 h-5"></i>
                            <i x-show="mobileMenuOpen" data-lucide="x" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu -->
                <div x-show="mobileMenuOpen" class="md:hidden py-4 border-t">
                    <div class="space-y-2">
                        @foreach($navItems as $item)
                            <a href="{{ $item['href'] }}"
                               class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->url() === $item['href'] ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}"
                               @click="mobileMenuOpen = false">
                                <i data-lucide="{{ $item['icon'] }}" class="w-4 h-4"></i>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-6">
            <div class="container mx-auto px-4">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Re-initialize icons after dynamic content loads
        document.addEventListener('livewire:load', function() {
            lucide.createIcons();
        });
    </script>
</body>
</html>
