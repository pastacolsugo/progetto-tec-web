<nav x-data="{ open: false }" class="bg-gray-900">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="m-2 sm:m-4 shrink-0 flex items-center">
                    <a href="{{ route('home') }}" aria-label="Home">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-100" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 mr-2 lg:-my-px lg:ml-10 lg:mr-16 md:flex text-gray-100">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Search Bar -->
            <form role="search" class="flex-1 ml-1 mr-4 sm:mx-8 my-3.5 flex block focus:ring-amber-700 focus:border-blue-500 text-gray-700" action="{{ route('search') }}" method="GET">
                <label class="hidden" for="search">Search box</label>
                <input id="search" type="search" aria-label="search box" name="query" value="{{ request()->get('query') }}" class="flex-1 w-auto text-sm sm:text-base border-none bg-gray-100 rounded-l focus:border-none" placeholder="Cerca..." required/>
                <button type="submit" class="py-1 px-2 sm:px-3 bg-amber-400 text-sm sm:text-base rounded-r border-left material-icons">search</button>
            </form>

            <!-- Settings Dropdown -->
            @auth
                <div class="hidden sm:flex sm:items-center sm:ml-16">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="p-2 flex items-center text-sm font-medium text-gray-100 hover:text-gray-200 hover:border-gray-300 focus:outline-none focus:text-gray-200 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
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
            @else
                <div class="hidden md:ml-16 md:flex">
                    <div class="shrink-0 flex items-center">
                        <a href="/login" class="py-1.5 px-3 bg-gray-900 text-gray-100 rounded hover:text-gray-400 active:text-gray-300 disabled:opacity-50">Log In</a>
                    </div>
                    <div class="shrink-0 flex items-center sm:ml-4">
                        <a href="/register" class="py-1.5 px-3 bg-amber-400 border border-amber-400 text-neutral-600 font-bold rounded hover:bg-amber-500 active:bg-amber-600 active:border-amber-500 disabled:opacity-50">Register</a>
                    </div>
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="mr-2 flex items-center md:hidden">
                <button @click="open = ! open" aria-label="Hamburger menu" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-200 focus:outline-none focus:text-gray-200 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden absolute w-full flex flex-col h-full shadow-md">
        <div class="bg-gray-100">
            <div class="pt-2 pb-3 border-t border-gray-200 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('my-orders')" :active="request()->routeIs('my-orders')">
                    {{ __('My orders') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-400">
                <div class="px-4">
                    @if (Auth::check())
                        <div class="font-medium text-base text-gray-600">{{ Auth::user()->name }}</div>
                    @endif
                </div>

                @auth
                    <div class="mt-3 space-y-1">
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
                @else
                    <div class="mt-3 space-y-1">
                        <!-- Log In -->
                        <x-responsive-nav-link :href="route('login')">
                            {{ __('Log In') }}
                        </x-responsive-nav-link>
                    </div>
                    <div class="mt-3 space-y-1">
                        <!-- Registration -->
                        <x-responsive-nav-link :href="route('register')">
                            {{ __('Register') }}
                        </x-responsive-nav-link>
                    </div>
                @endauth
            </div>
        </div>
        <div @click="open = ! open" class="flex-1 p-1 bg-[rgba(0,0,0,0.5)]"></div>
    </div>
</nav>
