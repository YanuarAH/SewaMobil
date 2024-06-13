<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="#">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                @guest
                    <x-nav-link href="/" :active="request()->is('/')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link href="/about" :active="request()->is('about')" class="ms-5">
                        {{ __('About') }}
                    </x-nav-link>
                @else
                    <x-nav-link :href="Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard')" :active="Auth::user()->usertype == 'admin' ? request()->routeIs('admin.dashboard') : request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    {{-- admin links --}}
                    @if (Auth::user()->usertype == 'admin')
                    <x-nav-link href="{{ url('admin/mobil') }}" :active="request()->routeIs('admin.mobil')">
                        {{ __('Mobil') }}
                    </x-nav-link>
                    <x-nav-link href="admin/dana" :active="request()->routeIs('admin.dana')">
                        {{ __('Dana') }}
                    </x-nav-link>
                    <x-nav-link href="admin/jadwal" :active="request()->routeIs('admin.jadwal')">
                        {{ __('Jadwal') }}
                    </x-nav-link>
                    <x-nav-link href="admin/verif" :active="request()->routeIs('admin.verif')">
                        {{ __('Verifikasi') }}
                    </x-nav-link>
                    @endif

                    {{-- user links --}}
                    @if (Auth::user()->usertype == 'user')
                    <x-nav-link href="sewa" :active="request()->routeIs('user.sewa')">
                        {{ __('Sewa') }}
                    </x-nav-link>
                    <x-nav-link href="jadwal" :active="request()->routeIs('user.jadwal')">
                        {{ __('Jadwal') }}
                    </x-nav-link>
                    <x-nav-link href="profile" :active="request()->routeIs('profile.edit')">
                        {{ __('Profile') }}
                    </x-nav-link>
                    @endif
                @endguest

                </div>
            </div>

            @auth
             <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth

            @guest
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>
                <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')" class="ms-5">
                    {{ __('Register') }}
                </x-nav-link>
            </div>
            @endguest

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @guest
                <x-responsive-nav-link href="/" :active="request()->is('/')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="/about" :active="request()->is('about')" class="ms-5">
                    {{ __('About') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')" class="mt-5">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>

                {{-- admin links --}}
                @if (Auth::user()->usertype == 'admin')
                <x-responsive-nav-link href="admin/mobil" :active="request()->routeIs('admin.mobil')">
                    {{ __('Mobil') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="admin/dana" :active="request()->routeIs('admin.dana')">
                    {{ __('Dana') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="admin/jadwal" :active="request()->routeIs('admin.jadwal')">
                    {{ __('Jadwal') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="admin/verif" :active="request()->routeIs('admin.verif')">
                    {{ __('Verifikasi') }}
                </x-responsive-nav-link>
                @endif

                {{-- user links --}}
                @if (Auth::user()->usertype == 'user')
                <x-responsive-nav-link href="sewa" :active="request()->routeIs('user.sewa')">
                    {{ __('Sewa') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="jadwal" :active="request()->routeIs('user.jadwal')">
                    {{ __('Jadwal') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="profile" :active="request()->routeIs('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                @endif
            @endguest
        </div>

        @auth
            <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
        
    </div>
</nav>
