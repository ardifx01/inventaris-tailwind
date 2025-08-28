@php
    \Carbon\Carbon::setLocale('id');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

        <div class="flex h-screen">

            <!-- Sidebar -->
            <aside id="sidebar" class="bg-gray-100 dark:bg-gray-800 min-h-screen flex flex-col justify-between py-4 px-4 border-r-2 
                                      transition-all duration-300 ease-in-out
                                      w-80 flex-shrink-0">
               
                <!-- Header Sidebar dengan Logo dan Toggle Button -->
                <div class="border-b border-black dark:border-white pb-4">
                    <!-- Container untuk Logo dan Text (akan berubah layout saat collapsed) -->
                    <div class="flex items-center justify-center mb-3">
                        <!-- Logo -->
                        <img src="{{ asset('assets/icons/logo.svg') }}" 
                             alt="Logo" 
                             class="w-6 h-6 flex-shrink-0">
                        <!-- Text Inventory -->
                        <span class="menu-text ml-3 text-md font-bold text-gray-800 dark:text-gray-200 transition-opacity duration-300">
                            Inventory
                        </span>
                    </div>
                    <!-- Toggle button untuk collapse/expand (akan dipindah saat collapsed) -->
                    <div class="flex justify-end">
                        <button id="sidebar-toggle" class="p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-600 dark:text-gray-400">
                            <svg id="collapse-icon" class="w-5 h-5 transform rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                @php
                    $menuItems = [
                        'dashboard' => [
                            'label' => 'Dashboard',
                            'icon' => asset('assets/icons/dashboard.svg')
                        ],
                        'ruangan' => [
                            'label' => 'Ruangan', 
                            'icon' => asset('assets/icons/ruangan.svg')
                        ],
                        'aset' => [
                            'label' => 'Aset',
                            'icon' => asset('assets/icons/aset.svg')
                        ],
                        'riwayat' => [
                            'label' => 'Riwayat',
                            'icon' => asset('assets/icons/history.svg')
                        ],
                        'pengaturan' => [
                            'label' => 'Pengaturan',
                            'icon' => asset('assets/icons/settings.svg')
                        ]
                    ];
                @endphp

                <nav class="flex-1 flex flex-col justify-center space-y-6 mt-6">
                    @foreach($menuItems as $route => $item)
                        <a href="{{ route($route) }}" 
                        class="flex items-center px-4 py-2 rounded transition-all duration-200
                                {{ request()->routeIs($route) 
                                    ? 'bg-blue-600 text-white shadow-lg border-l-4 border-blue-400' 
                                    : 'text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 hover:translate-x-1' }}">
                            
                            <img src="{{ $item['icon'] }}" 
                                alt="{{ $item['label'] }}" 
                                class="w-5 h-5 flex-shrink-0 transition-all duration-200
                                        {{ request()->routeIs($route) 
                                        ? 'filter brightness-0 invert' 
                                        : 'opacity-70 dark:filter dark:brightness-0 dark:invert dark:opacity-100' }}">
                            
                            <span class="menu-text ml-3 transition-opacity duration-300">{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </nav>

                <!-- Logout Button dengan Logo -->
                <div class="border-t border-gray-700 dark:border-white pt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-2  py-2 text-gray-50 bg-red-600 hover:bg-red-700 dark:text-gray-200 dark:hover:bg-red-800 rounded transition-all duration-200">
                            <!-- Logo Logout -->
                            <img src="{{ asset('assets/icons/logout.svg') }}" 
                                 alt="Logout" 
                                 class="w-5 h-5 flex-shrink-0 filter brightness-0 invert">
                            <!-- Text Logout -->
                            <span class="menu-text ml-3 transition-opacity duration-300">Logout</span>
                        </button>
                    </form>
                </div>
            </aside>
            
            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col min-w-0">

                <!-- Header -->
                <header class="flex justify-between items-center px-6 py-6 text-gray-700 bg-gray-200 dark:bg-gray-700 dark:text-gray-100">
                    <div class="text-md font-semibold text-gray-800 dark:text-gray-100">
                        Selamat Datang, "{{ Auth::user()->name }}"
                    </div>

                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                    </div>
                </header>

                <!-- Main Content -->
                <main class="flex-1 p-6 overflow-auto">
                    @yield('content')
                </main>

            </div>
        </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Sidebar toggle functionality
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('sidebar-toggle');
    const collapseIcon = document.getElementById('collapse-icon');
    const menuTexts = document.querySelectorAll('.menu-text');
    
    let isCollapsed = false; // Status sidebar: false = expanded, true = collapsed
    const BREAKPOINT = 1900; // Titik dimana sidebar otomatis collapse (1200px)

    // Function untuk toggle sidebar
    function toggleSidebar() {
        if (isCollapsed) {
            // EXPAND sidebar
            sidebar.classList.remove('w-20');
            sidebar.classList.add('w-80');
            
            // Putar icon ke kiri (collapse icon)
            collapseIcon.style.transform = 'rotate(180deg)';
            
            // Tampilkan text menu dengan delay untuk animasi yang halus
            setTimeout(() => {
                menuTexts.forEach(text => {
                    text.style.opacity = '1';
                });
            }, 150);
            
            isCollapsed = false;
        } else {
            // COLLAPSE sidebar
            sidebar.classList.remove('w-80');
            sidebar.classList.add('w-20');
            
            // Putar icon ke kanan (expand icon)
            collapseIcon.style.transform = 'rotate(0deg)';
            
            // Sembunyikan text menu
            menuTexts.forEach(text => {
                text.style.opacity = '0';
            });
            
            isCollapsed = true;
        }
    }

    // Function untuk auto collapse/expand berdasarkan ukuran layar
    function handleResize() {
        const screenWidth = window.innerWidth;
        
        if (screenWidth <= BREAKPOINT && !isCollapsed) {
            // Auto collapse jika layar kecil dan sidebar masih expanded
            toggleSidebar();
        } else if (screenWidth > BREAKPOINT && isCollapsed) {
            // Auto expand jika layar besar dan sidebar masih collapsed
            toggleSidebar();
        }
    }

    // Event listener untuk tombol toggle manual
    toggleButton.addEventListener('click', toggleSidebar);

    // Event listener untuk resize window (auto collapse/expand)
    window.addEventListener('resize', handleResize);

    // Panggil handleResize saat pertama kali load untuk set initial state
    handleResize();

    // DARK MODE functionality (kode yang sudah ada sebelumnya)
    const toggle = document.getElementById('darkModeToggle');
    const toggleContainer = document.getElementById('toggleContainer');
    const toggleHandle = document.getElementById('toggleHandle');
    const lightText = document.getElementById('lightText');
    const darkText = document.getElementById('darkText');
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');
    const currentThemeSpan = document.getElementById('currentTheme');

    function applyDarkMode(isDark) {
        if (isDark) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    }

    function updateToggleUI(isDark) {
        if (!toggle) return;
        
        if (isDark) {
            toggle.checked = true;
            
            if (toggleContainer) {
                toggleContainer.classList.add('bg-blue-600', 'border-blue-500');
                toggleContainer.classList.remove('bg-gray-200', 'border-gray-300');
            }
            
            if (toggleHandle) {
                toggleHandle.style.transform = 'translateX(2.5rem)';
                toggleHandle.classList.add('bg-gray-100');
                toggleHandle.classList.remove('bg-white');
            }
            
            if (lightText) lightText.style.opacity = '0';
            if (darkText) darkText.style.opacity = '1';
            if (sunIcon) sunIcon.style.opacity = '0';
            if (moonIcon) moonIcon.style.opacity = '1';
            if (currentThemeSpan) currentThemeSpan.textContent = 'Dark';
            
        } else {
            toggle.checked = false;
            
            if (toggleContainer) {
                toggleContainer.classList.remove('bg-blue-600', 'border-blue-500');
                toggleContainer.classList.add('bg-gray-200', 'border-gray-300');
            }
            
            if (toggleHandle) {
                toggleHandle.style.transform = 'translateX(0)';
                toggleHandle.classList.remove('bg-gray-100');
                toggleHandle.classList.add('bg-white');
            }
            
            if (lightText) lightText.style.opacity = '1';
            if (darkText) darkText.style.opacity = '0';
            if (sunIcon) sunIcon.style.opacity = '1';
            if (moonIcon) moonIcon.style.opacity = '0';
            if (currentThemeSpan) currentThemeSpan.textContent = 'Light';
        }
    }
    
    const isDarkMode = localStorage.getItem('theme') === 'dark' || 
                      (!localStorage.getItem('theme') && 
                       window.matchMedia('(prefers-color-scheme: dark)').matches);
    
    applyDarkMode(isDarkMode);
    updateToggleUI(isDarkMode);

    if (toggle) {
        toggle.addEventListener('change', function() {
            const isChecked = this.checked;
            applyDarkMode(isChecked);
            updateToggleUI(isChecked);

            if (toggleContainer) {
                toggleContainer.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    toggleContainer.style.transform = 'scale(1)';
                }, 150);
            }
        });
    }

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
        if (!localStorage.getItem('theme')) {
            const isDark = e.matches;
            applyDarkMode(isDark);
            updateToggleUI(isDark);
        }
    });

    window.addEventListener('storage', function(e) {
        if (e.key === 'theme') {
            const isDark = e.newValue === 'dark';
            applyDarkMode(isDark);
            updateToggleUI(isDark);
        }
    });
});
</script>

    </body>
</html>