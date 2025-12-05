<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
    <div id="app">
        <nav class="bg-white shadow-lg border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ url('/') }}"
                                class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent hover:from-indigo-700 hover:to-purple-700 transition-all duration-200">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        </div>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden sm:flex sm:items-center sm:space-x-4">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}"
                                    class="text-slate-600 hover:text-indigo-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                    {{ __('Login') }}
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-md hover:shadow-lg">
                                    {{ __('Register') }}
                                </a>
                            @endif
                        @else
                           @auth
       <div class="flex items-center space-x-3">
           <span class="text-sm text-gray-700">
               Bonjour, {{ Auth::user()->name }}
           </span>

           @if (Auth::user()->is_admin)
               <span class="inline-flex items-center rounded-full bg-red-600 px-2.5 py-0.5 text-xs font-semibold text-white">
                   Admin
               </span>
           @else
               <span class="inline-flex items-center rounded-full bg-sky-600 px-2.5 py-0.5 text-xs font-semibold text-white">
                   Auteur
               </span>
           @endif
       </div>
   @endauth
   


                            <!-- User Dropdown -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" @click.away="open = false"
                                    class="flex items-center space-x-2 text-slate-700 hover:text-indigo-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                    <span>{{ Auth::user()->name }}</span>
                                    <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-slate-200 py-1 z-50">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-slate-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors duration-150">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center sm:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                            class="text-slate-600 hover:text-indigo-600 p-2 rounded-lg transition-colors duration-200">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
                class="sm:hidden border-t border-slate-200" x-data="{ mobileMenuOpen: false }">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}"
                                class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 transition-colors duration-200">
                                {{ __('Login') }}
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="block px-3 py-2 rounded-lg text-base font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all duration-200">
                                {{ __('Register') }}
                            </a>
                        @endif
                    @else
                        <div class="px-3 py-2 text-base font-medium text-slate-700">
                            {{ Auth::user()->name }}
                        </div>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                            class="block px-3 py-2 rounded-lg text-base font-medium text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 transition-colors duration-200">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="py-8 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>