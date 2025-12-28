<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DriveTest Pro - Master Your Driving Test')</title>
    <meta name="description" content="Comprehensive driving test preparation platform">

    @yield('browser-tab-icon', '<link rel="icon" href="/logo.svg" type="image/svg+xml">')


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                    },
                },
            },
        }
    </script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
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

                        @foreach ($navItems as $item)
                            <a href="{{ $item['href'] }}"
                                class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->url() === $item['href'] ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                                <i data-lucide="{{ $item['icon'] }}" class="w-4 h-4"></i>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endforeach
                    </div>

                    <!-- User Menu -->
                    <div class="flex items-center space-x-4">

                        @if (auth()->user()->current_price_id == null)
                            <span
                                class="hidden sm:inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                Free Plan
                            </span>
                        @elseif (auth()->user()->current_price_id != null)
                            <span
                                class="hidden sm:inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                Pro Plan
                            </span>
                        @else
                            <span
                                class="hidden sm:inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                Free Plan
                            </span>
                        @endif
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                @php
                                    $avatar = auth()->user()->img_url ?? null;
                                @endphp

                                @if ($avatar)
                                    @php
                                        $src = \Illuminate\Support\Str::startsWith($avatar, [
                                            'http://',
                                            'https://',
                                            '/',
                                        ])
                                            ? $avatar
                                            : asset($avatar);
                                    @endphp
                                    <img src="{{ $src }}" alt="Avatar"
                                        class="w-8 h-8 rounded-full object-cover">
                                @else
                                    <i data-lucide="user" class="w-4 h-4"></i>
                                @endif
                            </button>

                            <div x-show="open" @click.away="open = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="{{ route('profile') }}"
                                        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem"
                                        tabindex="-1">
                                        <i data-lucide="user" class="w-4 h-4 mr-2 inline-block"></i>
                                        Profile
                                    </a>
                                    <a href="{{ route('settings') }}"
                                        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem"
                                        tabindex="-1">
                                        <i data-lucide="settings" class="w-4 h-4 mr-2 inline-block"></i>
                                        Settings
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="w-full text-left text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                            role="menuitem" tabindex="-1">
                                            <i data-lucide="log-out" class="w-4 h-4 mr-2 inline-block"></i>
                                            Log out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile menu button -->
                        <button @click="mobileMenuOpen = !mobileMenuOpen"
                            class="md:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none">
                            <i x-show="!mobileMenuOpen" data-lucide="menu" class="w-5 h-5"></i>
                            <i x-show="mobileMenuOpen" data-lucide="x" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu -->
                <div x-show="mobileMenuOpen" class="md:hidden py-4 border-t">
                    <div class="space-y-2">
                        @foreach ($navItems as $item)
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
        @auth('admin')
            <div class="flex">
                <!-- Sidebar -->
                <aside class="w-64 bg-white border-r border-gray-200 hidden lg:block">
                    <div class="flex flex-col h-full">
                        <nav class="flex-1 px-4 py-6 space-y-2">
                            @php
                                $navItems = [
                                    ['href' => '/admin/dashboard', 'label' => 'Хяналтын самбар'],
                                    ['href' => '/admin/sections', 'label' => 'Хэсэгүүд'],
                                    ['href' => '/admin/questions', 'label' => 'Асуултууд'],
                                    ['href' => '/admin/static-exams', 'label' => 'Статик харилцан'],
                                    ['href' => '/admin/road-signs', 'label' => 'Замын тэмдэг'],
                                    ['href' => '/admin/users', 'label' => 'Хэрэглэгчүүлүүлэг'],
                                    ['href' => '/admin/companies', 'label' => 'Компанийн мэдээллүүлэг'],
                                    ['href' => '/admin/discounts', 'label' => 'Хөтөлбөрлөлт'],
                                    ['href' => '/admin/feedback', 'label' => 'Санал хүсэлт'],
                                    ['href' => '/admin/pricing', 'label' => 'Үнэ'],
                                    ['href' => '/admin/reports', 'label' => 'Report'],
                                ];
                            @endphp

                            @foreach ($navItems as $item)
                                <a href="{{ $item['href'] }}"
                                    class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                                    <!-- Optionally add icons -->
                                    {{ $item['label'] }}
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </aside>
            @endauth

            <!-- Page Content -->
            <main class="py-6 w-full">
                <div class="container mx-auto px-4 max">
                    @yield('content')
                </div>
            </main>
        </div>

        <!-- Toast Notifications Container -->
        <div class="fixed bottom-4 right-4 z-50 space-y-3 w-80" id="toast-container">
            <!-- Success Toast Template -->
            <div id="success-toast"
                class="hidden items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-lg border border-green-200"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    <span class="sr-only">Success icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">
                    <span class="font-semibold text-gray-900">Success!</span>
                    <span id="success-message">Operation completed successfully.</span>
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
                    onclick="this.parentElement.remove()">
                    <i data-lucide="x" class="w-5 h-5"></i>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Error Toast Template -->
            <div id="error-toast"
                class="hidden items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-lg border border-red-200"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                    <i data-lucide="alert-triangle" class="w-5 h-5"></i>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">
                    <span class="font-semibold text-gray-900">Error!</span>
                    <span id="error-message">An error occurred. Please try again.</span>
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
                    onclick="this.parentElement.remove()">
                    <i data-lucide="x" class="w-5 h-5"></i>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        </div>

        <script>
            // Initialize Lucide icons
            lucide.createIcons();

            // Re-initialize icons after dynamic content loads
            document.addEventListener('livewire:load', function() {
                lucide.createIcons();
            });

            // Toast notification functions
            function showToast(type, message) {
                const container = document.getElementById('toast-container');
                const toast = document.getElementById(`${type}-toast`).cloneNode(true);

                // Set the message
                const messageElement = toast.querySelector(`#${type}-message`);
                if (messageElement) {
                    messageElement.textContent = message;
                }

                // Make the toast visible
                toast.classList.remove('hidden');
                toast.classList.add('flex');

                // Add to container
                container.prepend(toast);

                // Auto-remove after 5 seconds
                setTimeout(() => {
                    toast.remove();
                }, 5000);
            }

            // Make function available globally
            window.showToast = showToast;

            // Listen for toast events
            document.addEventListener('toast', function(e) {
                showToast(e.detail.type, e.detail.message);
            });

            // Check for session flash messages
            @if (session('success'))
                showToast('success', '{{ session('success') }}');
            @endif

            @if (session('error'))
                showToast('error', '{{ session('error') }}');
            @endif
        </script>
        @stack('scripts')
</body>

</html>
