<x-app-layout>
    <x-slot name="header">
   {{-- <header class="flex justify-between items-center px-2">
        <div class="text-md font-semibold text-gray-700 dark:text-gray-200">
            Selamat Datang, "{{ Auth::user()-> name }}"
        </div>
        <div class="text-sm text-gray-600 dark:text-gray-400">
            {{ \Carbon\Carbon::now()-> translatedFormat('l, d F Y') }}
        </div>
   </header> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Ini adalah halaman Dashboard.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
