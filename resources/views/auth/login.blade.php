<x-guest-layout>
    {{-- Alert Error --}}
    @if ($errors->any())
    <div id="alert-error"
    class="fixed top-5 left-1/2 -translate-x-1/2 z-50 w-[90%] max-w-md bg-red-50 border-s-4 border-red-500 p-4 rounded-lg shadow-lg dark:bg-red-800/30
           transition duration-700 ease-in-out"
    role="alert">
        <div class="flex">
            <div class="ms-3">
                <h3 class="text-gray-800 font-semibold dark:text-white">
                    Error!
                </h3>
                <ul class="text-sm text-gray-700 dark:text-neutral-400 list-disc ps-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    {{-- Form Login --}}
    <form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto mt-10 space-y-8">
        @csrf

        {{-- Email --}}
        <div class="max-w-sm space-y-5">
            <div class="relative mb-5">
              <input type="email" name="email" id="email" value="{{ old('email') }}" class="peer py-2.5 sm:py-3 pe-0 ps-8 block w-full bg-transparent border-t-transparent border-b-2 border-x-transparent border-b-gray-500 sm:text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-blue-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-400 dark:text-neutral-200 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" placeholder="Email" required autofocus>
              <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                <svg class="shrink-0 size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg>
              </div>
            </div>
          
            <div class="relative mb-5">
              <input type="password"  name="password" id="password" class="peer py-2.5 sm:py-3 pe-0 ps-8 block w-full bg-transparent border-t-transparent border-b-2 border-x-transparent border-b-gray-500 sm:text-sm focus:border-t-transparent focus:border-x-transparent focus:border-b-blue-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-400 dark:text-neutral-200 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600" placeholder="Password" required autofocus>
              <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-2 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                <svg class="shrink-0 size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M2 18v3c0 .6.4 1 1 1h4v-3h3v-3h2l1.4-1.4a6.5 6.5 0 1 0-4-4Z"></path>
                  <circle cx="16.5" cy="7.5" r=".5"></circle>
                </svg>
              </div>
            </div>
          </div>

        {{-- Remember Me --}}
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember"
                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700">
            <label for="remember_me" class="ms-2 text-sm text-gray-600 dark:text-gray-400">Remember me</label>
        </div>

        {{-- Forgot password + Login button --}}
        <div class="flex items-center justify-center">
            <button type="submit"
                class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-sm">
                Log in
            </button>
        </div>
    </form>

    {{-- Auto-hide error --}}
    <script>
        setTimeout(() => {
            const alertError = document.getElementById('alert-error');
            if (alertError) {
                // Tambahkan kelas untuk animasi fade + geser ke atas
                alertError.classList.add('opacity-0', '-translate-y-5');
    
                // Setelah animasi selesai, baru sembunyikan elemen
                setTimeout(() => {
                    alertError.style.display = 'none';
                }, 700); // sama dengan duration-700
            }
        }, 5000);
    </script>
</x-guest-layout>
