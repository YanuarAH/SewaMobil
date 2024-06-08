<nav class="bg-zinc-100" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href='/'><h1 class="text-black text-xl">Sewa Mobil</h1></a>
                </div>
            </div>
            <div class="hidden md:flex flex-1 justify-center">
                <div class="flex items-baseline space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <x-navlink href='/' :active="request()->is('/')">Home</x-navlink>
                    <x-navlink href='/sewa' :active="request()->is('sewa')">Sewa</x-navlink>
                    <x-navlink href='/contact' :active="request()->is('contact')">Kontak</x-navlink>
                    <x-navlink href='/about' :active="request()->is('about')">About</x-navlink>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <a href='{{ route('login') }}' class="text-gray-700 hover:text-blue-700 hover:underline">Login</a>
                    <a href='{{ route('register') }}' class="ml-7 rounded-md px-3 py-2 text-sm font-medium bg-gray-600 text-white hover:bg-gray-300 hover:text-gray-700">Sign Up</a>
                </div>
            </div>  
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-blue-700 p-2 text-white hover:bg-blue-500 hover:text-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <x-navlink-mobile href='/' :active="request()->is('/')">Home</x-navlink-mobile>
            <x-navlink-mobile href='/sewa' :active="request()->is('sewa')">Sewa</x-navlink-mobile>
            <x-navlink-mobile href='/contact' :active="request()->is('contact')">Kontak</x-navlink-mobile>
            <x-navlink-mobile href='/about' :active="request()->is('about')">About</x-navlink-mobile>
            
        </div>
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <a href='{{ route('login') }}' class="block px-3 py-2 mt-4 rounded-md text-base font-medium text-gray-700 hover:bg-gray-300 hover:text-gray-700">Login</a>
            <a href='{{ route('register') }}' class="block px-3 py-2 rounded-md text-base font-medium bg-gray-600 text-white hover:bg-gray-300 hover:text-gray-700">Sign Up</a>
        </div>
    </div>
</nav>
