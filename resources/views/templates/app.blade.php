<!DOCTYPE html>
<html lang="id" class="overflow-x-hidden">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Buukin</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;900&display=swap" rel="stylesheet" />
        <script src="https://unpkg.com/feather-icons"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
      </head>
<body>
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10 shadow-md lg:px-12">
        <div class="container mx-auto">
            <div class="flex items-center justify-between relative py-3 px-4">
                <div class="px-4 flex">
                    <a href="{{route('dashboard')}}" class="font-bold text-lg text-primary block py-2"> <img
                            src="{{ asset('img/logo.png') }}" width="126px" height="29px" class="mt-1 lg:scale-110"
                            alt="" />
                    </a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button"
                        class="scale-75 lg:hidden block absolute right-4">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left rotate-45;"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                    <nav id="nav-menu"
                        class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full lg:right-1/2 lg:top-1/2 right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex justify-center">
                            <li class="group lg:text-center">
                                <a href="{{route('dashboard')}}"
                                    class="text-primary lg:text-primary py-2 px-8 group-hover:underline underline-offset-8 group-hover:text-primary group-hover:font-semibold flex transition ease-in-out">Beranda</a>
                            </li>
                            <li class="group lg:text-center">
                                <a href="{{route('kategori')}}"
                                    class="text-primary lg:text-primary py-2 px-8 group-hover:underline underline-offset-8 group-hover:text-primary group-hover:font-semibold flex transition ease-in-out">Kategori</a>
                            </li>
                            <li class="group lg:text-center">
                                <a href="{{route('favorit')}}"
                                    class="text-primary lg:text-primary py-2 px-8 group-hover:underline underline-offset-8 group-hover:text-primary group-hover:font-semibold flex transition ease-in-out">Favorit</a>
                            </li>
                            <li id="account-text" class="group lg:text-center">
                                <a href="{{ Route('profile.edit') }}"
                                    class="lg:hidden text-primary lg:bg-primary bg-transparent rounded-full py-2 px-8 mx-auto lg:hover:border-primary lg:hover:border-2 lg:hover:bg-transparent lg:hover:text-primary group-hover:font-semibold flex">Account</a>
                            </li>
                        </ul>
                    </nav>
    
                    <a href="">
                        <i class="lg:ml-8 lg:mr-0 mr-4 lg:w-6 lg:h-6 inline-flex text-primary w-5 h-5" data-feather="bell"
                            id=""></i>
                    </a>
                    <a href="{{ route('history') }}" target="_blank">
                        <svg class="lg:ml-8 lg:mr-9 mr-7 lg:w-6 lg:h-6 inline-flex text-primary w-5 h-5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"
                                d="M6 1v4a1 1 0 0 1-1 1H1m8-2h3M9 7h3m-4 3v6m-4-3h8m3-11v16a.969.969 0 0 1-.932 1H1.934A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.829 1h8.239A.969.969 0 0 1 15 2ZM4 10h8v6H4v-6Z" />
                        </svg>
                        </i></a>
                    @if (Route::has('login'))
                        @auth
                        <div class="hidden sm:flex sm:items-center">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="lg:border-2 lg:border-primary lg:rounded-full ">
                                        <i id="account-icons" name="user"
                                            class="hidden lg:w-6 lg:h-6 lg:inline-flex text-primary w-5 h-5" data-feather="user"></i>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        <div>{{ Auth::user()->name }}</div>
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
                        @else
                            <a href="{{ route('login') }}"
                                class=" w-full hidden mr-3 text-white lg:flex font-semibold bg-primary rounded-lg px-5 py-2">Log
                                in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class=" w-full hidden text-primary lg:flex font-semibold bg-secondary rounded-lg px-7 py-2">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    @extends('templates.footer')
    <script>
        feather.replace();
    </script>
      <script src="./dist/js/script.js"></script>
      <script src="https://unpkg.com/feather-icons"></script>
      <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</body>
</html>