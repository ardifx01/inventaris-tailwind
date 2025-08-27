@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6 space-y-6">
            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-100 border-b pb-2 m-px">
                Pengaturan
            </h2>

            <!-- Switch Toggle -->
            <div class="flex items-center justify-between">
                <span class="text-gray-700 dark:text-gray-200">Ubah Tema Website</span>
                
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="darkModeToggle" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-focus:ring-2
                     peer-focus:ring-blue-500 dark:bg-gray-600 after:content-[''] after:absolute 
                     after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 
                     after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                      peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white">
                    </div>
                </label>
            </div>
        </div>
    </div>
</div>
@endsection