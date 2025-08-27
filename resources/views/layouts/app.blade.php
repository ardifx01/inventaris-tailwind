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

            <aside class="w-80 bg-gray-100 dark:bg-gray-800 min-h-screen flex flex-col justify-between py-4 px-4">
               
                <div class="text-md text-center font-bold border-b py-4 text-gray-800 dark:text-gray-200">
                    Project Name
                </div>

                <nav class="flex-1 flex flex-col justify-center space-y-6">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Dashboard</a>
                    <a href="{{ route('ruangan') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Ruangan</a>
                    <a href="{{ route('aset') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Aset</a>
                    <a href="{{ route('pengaturan') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Pengaturan</a>
                </nav>

                <div class="p-4 border-t border-gray-700">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="w-full text-left px-4 py-2  text-gray-50 bg-red-600 hover:bg-red-700 dark:text-gray-200 dark:hover:bg-red-800 rounded">
                            Logout
                        </button>
                    </form>
                </div>
            </aside>
            
           <div class="flex-1 flex flex-col">

            <header class="flex justify-between items-center px-6 py-6 bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-100">
                <div class="text-md text-gray-200 dark:text-gray-400">
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
        
    </body>
</html>
