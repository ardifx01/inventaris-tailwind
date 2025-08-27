<x-app-layout>
    {{-- <x-slot name="header">
       <div class="text-lg font-semibold text-gray-700 dark:text-gray-100">
            Selamat Datang, {{ Auth::user()-> name }}
       </div>

       <div class="text-sm text-gray-600 dark:text-gray-400">
        {{ \Carbon\Carbon::now()->translatedFormat ('l, d F Y') }}
       </div>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Ini adalah Page Ruangan") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
