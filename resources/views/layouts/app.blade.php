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
    <body class="font-sans antialiased bg-gray-100">
        <div class="flex min-h-screen">

            <aside class="w-64 bg-gray-700 text=white flex flex-col">
                <div class="p-4 text-2xl font-bold border-b border-gray-600">
                    Inventaris
                </div>

                <nav class="flex-1 p-4 space-y-2">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Dashboard</a>
                    <a href="{{ route ('ruangan') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Ruangan</a>
                    <a href="{{ route ('aset') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Aset</a>
                    <a href="{{ route ('pengaturan') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Pengaturan</a>
                </nav>

                <div class="p-4 border-t border-gray-700">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="w-full text-left px-4 py-2 rounded bg-red-500 hover:bg-red-700 ">Logout</button>
                    </form>
                </div>
            </aside>
            
           <div class="flex-1">
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
           </div>
        </div>
    </body>
</html>
