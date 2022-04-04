@php
try {
        $path = explode('/',url()->current())[3];
    } catch (\Exception $e) {
        $path = '';
    }
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #EF4444; }
        .cta-btn { color: #3d68ff; }
        .active-nav-link { background: #DC2626; }
        .nav-item:hover { background: #DC2626; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body @auth class="bg-gray-100 font-family-karla flex" @endauth>

    @auth()
        <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
            <div class="p-6">
                <a href="{{ route('home') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            </div>
            <nav class="text-white text-base font-semibold pt-3">
                <a href="{{ route('home') }}" class="flex items-center text-white py-4 pl-6 nav-item @if($path == '') active-nav-link @endif">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <div {{ auth()->user()->isAdmin() ? '' : 'hidden=true' }}>
                    <a href="{{ route('users') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if($path == 'users') active-nav-link @endif">
                        <i class="fas fa-users mr-3"></i>
                        Usuários
                    </a>
                </div>
            </nav>

        </aside>

        <div class="w-full flex flex-col h-screen overflow-y-hidden">
            <!-- Desktop Header -->
            <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
                <div class="w-1/2"></div>
                <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                    <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                        <img src="{{ session()->get('avatar_url') }}">
                    </button>
                    <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                    <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 account-link hover:text-white">Perfil</a>
                        <a href="#" class="block px-4 py-2 account-link hover:text-white" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sair</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </header>

            <!-- Mobile Header & Nav -->
            <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                    <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                        <i x-show="!isOpen" class="fas fa-bars"></i>
                        <i x-show="isOpen" class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Dropdown Nav -->
                <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                    <a href="{{ route('home') }}" class="flex items-center text-white py-2 pl-4 nav-item @if($path == '') active-nav-link @endif">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('users') }}"
                       class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item @if($path == 'users') active-nav-link @endif"
                        {{ auth()->user()->isAdmin() ? '' : 'style="display: none;"' }}
                    >
                        <i class="fas fa-users mr-3"></i>
                        Usuários
                    </a>
                </nav>
            </header>

            <div class="w-full overflow-x-hidden border-t flex flex-col">
                <main class="w-full flex-grow p-6">
    @endauth

    @yield('content')

    @auth
            </main>
        </div>
    @endauth

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

</body>
</html>
