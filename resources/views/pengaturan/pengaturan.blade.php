@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-3/4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6 space-y-6">
            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-100 border-b pb-2 m-px">
                Pengaturan
            </h2>

            <!-- Enhanced Toggle Switch -->
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <span class="text-gray-700 dark:text-gray-200 font-medium">Ubah Tema Website</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400 mt-1">Pilih tampilan sesuai preferensi Anda</span>
                </div>
                
                <!-- Toggle Button -->
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="darkModeToggle" class="sr-only">
                    
                    <div class="relative w-20 h-10 bg-gray-200 rounded-full transition-all duration-300 ease-in-out shadow-inner border-2 border-gray-300 dark:bg-gray-700 dark:border-gray-600" id="toggleContainer">
                        
                        <div class="absolute top-1 left-1 w-8 h-8 bg-white rounded-full shadow-lg transform transition-all duration-300 ease-in-out border border-gray-200 flex items-center justify-center" id="toggleHandle">
                            
                            <svg class="w-4 h-4 text-yellow-500 transition-opacity duration-200" id="sunIcon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                            </svg>
                            
                            <svg class="w-4 h-4 text-blue-600 opacity-0 absolute transition-opacity duration-200" id="moonIcon" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                            </svg>
                        </div>
                    </div>
                </label>
            </div>

            <!-- Status Indicator -->
            <div class="mt-4 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 rounded-full bg-green-500"></div>
                    <span class="text-sm text-gray-600 dark:text-gray-300">
                        Mode: <span id="currentTheme" class="font-semibold">Light</span>
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection