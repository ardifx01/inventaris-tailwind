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

            <aside class="w-80 bg-gray-100 dark:bg-gray-800 min-h-screen flex flex-col justify-between py-4 px-4 border-r-2">
               
                <div class="text-md text-center font-bold border-b border-black py-4 text-gray-800 dark:text-gray-200 dark:border-white">
                    Project Name
                </div>
                @php
                    $menuItems = [
                        'dashboard' => [
                            'label' => 'Dashboard',
                            'icon' => '<svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path></svg>'
                        ],
                        'ruangan' => [
                            'label' => 'Ruangan', 
                            'icon' => '<svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>'
                        ],
                        'aset' => [
                            'label' => 'Aset',
                            'icon' => '<svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4zM3 8h.01a2 2 0 01.01 0H16a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2v-6a2 2 0 012-2z"></path></svg>'
                        ],
                        'pengaturan' => [
                            'label' => 'Pengaturan',
                            'icon' => '<svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>'
                        ]
                    ];
                    @endphp

                    
                    <nav class="flex-1 flex flex-col justify-center space-y-6">
                        @foreach($menuItems as $route => $item)
                            <a href="{{ route($route) }}" 
                            class="flex items-center px-4 py-2 rounded transition-all duration-200
                                    {{ request()->routeIs($route) 
                                        ? 'bg-blue-600 text-white shadow-lg border-l-4 border-blue-400' 
                                        : 'text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 hover:translate-x-1' }}">
                                {!! $item['icon'] !!}
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </nav>
                <div class="p-4 border-t border-gray-700 dark:border-white">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="w-full text-left px-4 py-2 text-center text-gray-50 bg-red-600 hover:bg-red-700 dark:text-gray-200 dark:hover:bg-red-800 rounded">
                            Logout
                        </button>
                    </form>
                </div>
            </aside>
            
           <div class="flex-1 flex flex-col">

            <header class="flex justify-between items-center px-6 py-6 text-gray-700 bg-gray-200 dark:bg-gray-700 dark:text-gray-100">
                <div class="text-md font-semibold text-gray-800 dark:text-gray-100">
                    Selamat Datang, "{{ Auth::user()-> name }}"
                </div>

                 <div class="text-sm text-gray-600 dark:text-gray-400">
                    {{ \Carbon\Carbon::now()-> translatedFormat('l, d F Y') }}
                </div>
            </header>

            <main class="flex-1 p-6">
                @yield('content')
            </main>

           </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Set theme saat page load
                if (localStorage.getItem('theme') === 'dark' || 
                    (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            
                // Update toggle state jika ada di halaman
                const toggle = document.getElementById('darkModeToggle');
                if (toggle) {
                    toggle.checked = document.documentElement.classList.contains('dark');
                    
                    toggle.addEventListener('change', function () {
                        if (this.checked) {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('theme', 'dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('theme', 'light');
                        }
                    });
                }
            });
            </script>
            
            @stack('scripts')
    </body>
</html>
