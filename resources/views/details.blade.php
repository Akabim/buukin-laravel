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
    {{-- <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script>   --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

</head>

<body>
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10 shadow-md lg:px-12">
        <div class="container mx-auto">
            <div class="flex items-center justify-between relative py-3 px-4">
                <div class="px-4 flex">
                    <a href="{{ route('dashboard') }}" class="font-bold text-lg text-primary block py-2"> <img src="{{ asset('img/logo.png') }}" width="126px" height="29px" class="mt-1 lg:scale-110" alt="" />
                    </a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="scale-75 lg:hidden block absolute right-4">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left rotate-45;"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                    <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full lg:right-1/2 lg:top-1/2 right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex justify-center">
                            <li class="group lg:text-center">
                                <a href="{{ route('dashboard') }}" class="text-primary lg:text-primary py-2 px-8 group-hover:underline underline-offset-8 group-hover:text-primary group-hover:font-semibold flex transition ease-in-out">Beranda</a>
                            </li>
                            <li class="group lg:text-center">
                                <a href="{{ route('kategori') }}" class="text-primary lg:text-primary py-2 px-8 group-hover:underline underline-offset-8 group-hover:text-primary group-hover:font-semibold flex transition ease-in-out">Kategori</a>
                            </li>
                            <li class="group lg:text-center">
                                <a href="{{ route('favorit') }}" class="text-primary lg:text-primary py-2 px-8 group-hover:underline underline-offset-8 group-hover:text-primary group-hover:font-semibold flex transition ease-in-out">Favorit</a>
                            </li>
                            <li id="account-text" class="group lg:text-center">
                                <a href="{{ Route('profile.edit') }}" class="lg:hidden text-primary lg:bg-primary bg-transparent rounded-full py-2 px-8 mx-auto lg:hover:border-primary lg:hover:border-2 lg:hover:bg-transparent lg:hover:text-primary group-hover:font-semibold flex">Account</a>
                            </li>
                        </ul>
                    </nav>

                    <a href="">
                        <i class="lg:ml-8 lg:mr-0 mr-4 lg:w-6 lg:h-6 inline-flex text-primary w-5 h-5" data-feather="bell" id=""></i>
                    </a>
                    <a href="{{ route('history') }}" target="_blank">
                        <svg class="lg:ml-8 lg:mr-9 mr-7 lg:w-6 lg:h-6 inline-flex text-primary w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M6 1v4a1 1 0 0 1-1 1H1m8-2h3M9 7h3m-4 3v6m-4-3h8m3-11v16a.969.969 0 0 1-.932 1H1.934A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.829 1h8.239A.969.969 0 0 1 15 2ZM4 10h8v6H4v-6Z" />
                        </svg>
                        </i></a>
                    @if (Route::has('login'))
                    @auth
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="lg:border-2 lg:border-primary lg:rounded-full ">
                                    <i id="account-icons" name="user" class="hidden lg:w-6 lg:h-6 lg:inline-flex text-primary w-5 h-5" data-feather="user"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    <div>{{ Auth::user()->name }}</div>
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class=" w-full hidden mr-3 text-white lg:flex font-semibold bg-primary rounded-lg px-5 py-2">Log
                        in</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class=" w-full hidden text-primary lg:flex font-semibold bg-secondary rounded-lg px-7 py-2">Register</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <section id="" class=" pt-24 lg:pt-40 bg-white">
        <div class="container mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full self-start px-4 lg:px-12 lg:w-1/2 lg:pb-10">
                    <h1 class="font-semibold text-xl lg:text-4xl mb-4 text-black">{{ $restos->name }}</h1>
                    <p class="font-normal text-sm lg:text-lg mb-7 text-black"> <span class="px-1 py-1 bg-primary bg-opacity-10 rounded-md">
                            Harga tiap meja : Rp. {{ $restos->price }}</span> <span class="px-1 py-1 rounded-md text-primary ml-1.5 bg-primary bg-opacity-10">Surabaya</span>
                    </p>
                    <hr class="mb-4">
                    <div class="relative lg:right-0 "><img id="mainImage" src="{{ asset('storage/resto_photos' . $restos->photo_1) }}" alt="abimanyu" class=" w-full mx-auto relative " /></div>
                    <div class="flex-wrap flex">
                        <div class="w-1/2 p-2  sm:w-1/3 rounded-lg">
                            <a href="#" class="block">
                                <img src="{{ asset('storage/' . $restos->photo_1) }}" alt="" class="object-cover w-full lg:h-32 rounded-lg" onmouseover="changeImage(this)">
                            </a>
                        </div>
                        <div class="w-1/2 p-2 sm:w-1/3 rounded-lg ">
                            <a href="#" class="block ">
                                <img src="{{ asset('storage/' . $restos->photo_2) }}" alt="" class="object-cover w-full lg:h-32 rounded-lg" onmouseover="changeImage(this)">
                            </a>
                        </div>
                        <div class="w-1/2 p-2 sm:w-1/3 rounded-lg ">
                            <a href="#" class="block ">
                                <img src="{{ asset('storage/' . $restos->photo_3) }}" alt="" class="object-cover w-full lg:h-32 rounded-lg" onmouseover="changeImage(this)">
                            </a>
                        </div>
                    </div>
                    <hr class="lg:mt-7 mt-3 lg:mb-5 mb-3 ">

                    <ul class="flex flex-wrap gap-10 lg:gap-56 lg:text-lg justify-center mb-7 font-normal group">
                        <li id="menu" class="hover:text-primary text-black"><a href="#">Menu</a></li>
                        <li id="about-resto" class="hover:text-primary text-black"><a href="#">About</a></li>
                        <li id="coupons" class="hover:text-primary text-black"><a href="#">Coupons</a></li>
                    </ul>


                    <div id="about-resto-div" class="about hidden">
                        <h1 class="font-semibold text-lg lg:text-2xl mb-3 text-black">Tentang Restoran Ini</h1>
                        <p class="font-thin text-sm lg:text-lg text-justify text-black">{{ $restos->description }}?</p>
                    </div>

                    <div class="menu">
                        <h1 class="font-semibold text-lg lg:text-2xl mb-3 text-black">Menu</h1>
                        <a class="w-24 h-24 rounded-lg bg-slate-200" target="_blank" href="{{ asset('storage/' . $restos->menu) }}">
                            <img src="{{ asset('img/woodz-resto.png') }}" class="w-24 h-24" alt="">
                        </a>

                    </div>
                    <div class="coupons hidden">
                        <h1 class="font-semibold text-lg lg:text-2xl mb-3 text-black">Coupons</h1>
                        <div class="swiper3">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img title="Discount 10% For Beverages" src="{{ asset('img/coupons/10.png') }}" class="scale-75 hover:scale-100 transition" alt=""></div>
                                <div class="swiper-slide"><img title="Discount 20% For Desert" src="{{ asset('img/coupons/20.png') }}" class="scale-75 hover:scale-100 transition" alt=""></div>
                                <div class="swiper-slide"><img title="Discount 30% For Main Course" src="{{ asset('img/coupons/30.png') }}" class="scale-75 hover:scale-100 transition" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('booking.checkout') }}" method="post" class="w-full lg:w-1/2" enctype="multipart/form-data">
                    @csrf
                    <div class=" w-full px-4 sticky top-0">
                        <div class="lg:pl-44">
                            <h1 class="font-semibold text-xl lg:text-4xl mb-4 lg:mb-5 mt-7 lg:mt-32 text-black">Reservasi
                                Sekarang!
                            </h1>
                            <hr class="mb-5 lg:w-96">
                            <label for="tables" class="mb-3 font-normal lg:text-xl">Jumlah Meja</label>
                            <div class="">
                                <select name="table_count" id="table_count" class="mt-1.5 mb-5 w-full lg:w-2/3 py-2 px-2 rounded-lg border-primary border-2 text-black lg:text-lg">
                                    <option value="1">1 Meja</option>
                                    <option value="2">2 Meja</option>
                                    <option value="3">3 Meja</option>
                                    <option value="4">4 Meja</option>
                                    <option value="5">5 Meja</option>
                                    <option value="6">6 Meja</option>
                                </select>
                            </div>
                            <input type="hidden" name="restaurant_id" id="" value="{{ $restos->id }}">
                            <input type="hidden" name="selected_seats" id="selected_seats" value="">

                            <label for="tables" class="mb-3 font-normal lg:text-xl">Tanggal Pemesanan</label>
                            <div class="">
                                <input type="date" name="booking_date" id="reservationDate" class="mt-1.5 mb-5 w-full lg:w-2/3 py-2 px-2 rounded-lg border-primary border-2 text-black lg:text-lg">
                            </div>
                            <label for="tables" class="mb-3 font-normal lg:text-xl">Waktu Pemesanan</label>
                            <div class="">
                                <input type="time" name="booking_time" id="reservationTime" class="mt-1.5 mb-5 w-full lg:w-2/3 py-2 px-2 rounded-lg border-primary border-2 text-black lg:text-lg">
                            </div>
                            <div class="mb-3">
                                <button type="submit" id="" class="cursor-pointer mt-3 mb-5 w-full lg:w-2/3 py-3 px-2 rounded-lg bg-primary text-white lg:text-lg">Reservasi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
    <section id="denah" class="pb-24 bg-white">
        <div class="container mx-auto">
            <div class="flex-flex-wrap lg:px-12 px-4">
                <h1 class="font-semibold text-xl lg:text-4xl mb-7 mt-7 text-black">Denah {{ $restos->name }} </h1>
                <div class="inline-flex lg:mb-7 ">
                    <div class="bg-primary w-7 h-7 rounded-lg cursor-pointer kursi mr-3">
                    </div>
                    <p class="text-lg">Kursi Pilihanmu</p>
                </div>
                <div class="inline-flex lg:mx-7">
                    <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg cursor-pointer kursi mr-3">
                    </div>
                    <p class="text-lg">Tidak Tersedia</p>
                </div>
                <div class="inline-flex lg:mx-7">
                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi mr-3">
                    </div>
                    <p class="text-lg">Tersedia</p>
                </div>
                <div class="w-full block self-center px-4 py-9 border-gray-100 border-2 rounded-lg overflow-x-auto">
                    <div class="flex">
                        <div class="set inline-flex mr-14">
                            <div class="block mr-2">
                                <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg cursor-pointer kursi" data-kursi="1">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">1</p>
                                </div>
                                <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="2">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">2</p>
                                </div>
                            </div>
                            <div name="meja" class="block mr-2">
                                <div class="bg-[#E0E0E0] w-12 h-20 rounded-lg"></div>
                            </div>
                            <div class="block">
                                <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg kursi cursor-pointer" data-kursi="3">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">3</p>
                                </div>
                                <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="4">
                                    <p class="text-center self-center justify-center text-[#C2C2C2] font-normal">4
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="set inline-flex mr-14">
                            <div class="block mr-2">
                                <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg cursor-pointer kursi" data-kursi="5">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">5</p>
                                </div>
                                <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="6">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">6</p>
                                </div>
                            </div>
                            <div name="meja" class="block mr-2">
                                <div class="bg-[#E0E0E0] w-12 h-20 rounded-lg"></div>
                            </div>
                            <div class="block">
                                <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg kursi cursor-pointer" data-kursi="7">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">7</p>
                                </div>
                                <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="8">
                                    <p class="text-center self-center justify-center text-[#C2C2C2] font-normal">8
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="set inline-flex mr-14">
                            <div class="block mr-2">
                                <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg cursor-pointer kursi" data-kursi="9">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">9</p>
                                </div>
                                <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="10">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">10</p>
                                </div>
                            </div>
                            <div name="meja" class="block mr-2">
                                <div class="bg-[#E0E0E0] w-12 h-20 rounded-lg"></div>
                            </div>
                            <div class="block">
                                <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg kursi cursor-pointer" data-kursi="11">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">11</p>
                                </div>
                                <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="12">
                                    <p class="text-center self-center justify-center text-[#C2C2C2] font-normal">12
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="set inline-flex mr-14">
                            <div class="block mr-2">
                                <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg cursor-pointer kursi" data-kursi="13">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">13</p>
                                </div>
                                <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="14">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">14</p>
                                </div>
                            </div>
                            <div name="meja" class="block mr-2">
                                <div class="bg-[#E0E0E0] w-12 h-20 rounded-lg"></div>
                            </div>
                            <div class="block">
                                <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg kursi cursor-pointer" data-kursi="15">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">15</p>
                                </div>
                                <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="16">
                                    <p class="text-center self-center justify-center text-[#C2C2C2] font-normal">16
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="set inline-flex mr-14">
                            <div class="block mr-2">
                                <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg cursor-pointer kursi" data-kursi="17">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">17</p>
                                </div>
                                <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="18">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">18</p>
                                </div>
                            </div>
                            <div name="meja" class="block mr-2">
                                <div class="bg-[#E0E0E0] w-12 h-20 rounded-lg"></div>
                            </div>
                            <div class="block">
                                <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg kursi cursor-pointer" data-kursi="19">
                                    <p class="text-center items-center text-[#C2C2C2] font-normal">19</p>
                                </div>
                                <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="20">
                                    <p class="text-center self-center justify-center text-[#C2C2C2] font-normal">20
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="block mt-16 ml-12">
                            <div class="set flex items-center mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="21">
                                        <p class="text-center items-center text-white font-normal">21</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="22">
                                        <p class="text-center items-center text-white font-normal">22</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set flex items-center mt-9 mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="23">
                                        <p class="text-center items-center text-white font-normal">23</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="24">
                                        <p class="text-center items-center text-white font-normal">24</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set flex items-center mt-9 mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="25">
                                        <p class="text-center items-center text-white font-normal">25</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="26">
                                        <p class="text-center items-center text-white font-normal">26</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block mt-16 ml-12">
                            <div class="set flex items-center mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="27">
                                        <p class="text-center items-center text-white font-normal">27</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="28">
                                        <p class="text-center items-center text-white font-normal">28</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set flex items-center mt-9 mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="29">
                                        <p class="text-center items-center text-white font-normal">29</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="30">
                                        <p class="text-center items-center text-white font-normal">30</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set flex items-center mt-9 mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="31">
                                        <p class="text-center items-center text-white font-normal">31</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="32">
                                        <p class="text-center items-center text-white font-normal">32</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block mt-16 ml-12">
                            <div class="set flex items-center mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="33">
                                        <p class="text-center items-center text-white font-normal">33</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="34">
                                        <p class="text-center items-center text-white font-normal">34</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set flex items-center mt-9 mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="35">
                                        <p class="text-center items-center text-white font-normal">35</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="36">
                                        <p class="text-center items-center text-white font-normal">36</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set flex items-center mt-9 mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="37">
                                        <p class="text-center items-center text-white font-normal">37</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="38">
                                        <p class="text-center items-center text-white font-normal">38</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block mt-16 ml-12">
                            <div class="set flex items-center mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="39">
                                        <p class="text-center items-center text-white font-normal">39</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="40">
                                        <p class="text-center items-center text-white font-normal">40</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set flex items-center mt-9 mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="41">
                                        <p class="text-center items-center text-white font-normal">41</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="42">
                                        <p class="text-center items-center text-white font-normal">42</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set flex items-center mt-9 mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="43">
                                        <p class="text-center items-center text-white font-normal">43</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="44">
                                        <p class="text-center items-center text-white font-normal">44</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block mt-16 ml-12">
                            <div class="set flex items-center mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="45">
                                        <p class="text-center items-center text-white font-normal">45</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="46">
                                        <p class="text-center items-center text-white font-normal">46</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set flex items-center mt-9 mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="47">
                                        <p class="text-center items-center text-white font-normal">47</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="48">
                                        <p class="text-center items-center text-white font-normal">48</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set flex items-center mt-9 mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg cursor-pointer kursi" data-kursi="49">
                                        <p class="text-center items-center text-white font-normal">49</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-9 h-11 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#424242] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="50">
                                        <p class="text-center items-center text-white font-normal">50</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block mt-16 ml-12">
                            <h1 class="rotate-90 ml-36 text-4xl font-bold text-primary text-opacity-40">KASIR</h1>
                        </div>
                    </div>
                    <hr class="lg:w-full w-[1500px] h-1 mx-auto my-10 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
                    <div class="relative inline-flex">
                        <h1 class="mr-96 text-4xl font-bold text-primary text-opacity-40">OUT <br> DOOR <br> AREA
                        </h1>
                        <div class="flex justify-end">
                            <div class="set inline-flex mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg cursor-pointer kursi" data-kursi="51">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">51</p>
                                    </div>
                                    <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="52">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">52</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-12 h-20 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg kursi cursor-pointer" data-kursi="53">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">53</p>
                                    </div>
                                    <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="54">
                                        <p class="text-center self-center justify-center text-[#C2C2C2] font-normal">
                                            54</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set inline-flex mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg cursor-pointer kursi" data-kursi="55">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">55</p>
                                    </div>
                                    <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="56">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">56</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-12 h-20 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg kursi cursor-pointer" data-kursi="57">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">57</p>
                                    </div>
                                    <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="58">
                                        <p class="text-center self-center justify-center text-[#C2C2C2] font-normal">
                                            58</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set inline-flex mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg cursor-pointer kursi" data-kursi="59">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">59</p>
                                    </div>
                                    <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="60">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">60</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-12 h-20 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg kursi cursor-pointer" data-kursi="61">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">61</p>
                                    </div>
                                    <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="62">
                                        <p class="text-center self-center justify-center text-[#C2C2C2] font-normal">
                                            62</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set inline-flex mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg cursor-pointer kursi" data-kursi="63">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">63</p>
                                    </div>
                                    <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="64">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">64</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-12 h-20 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg kursi cursor-pointer" data-kursi="65">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">65</p>
                                    </div>
                                    <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="66">
                                        <p class="text-center self-center justify-center text-[#C2C2C2] font-normal">
                                            66</p>
                                    </div>
                                </div>
                            </div>
                            <div class="set inline-flex mr-14">
                                <div class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg cursor-pointer kursi" data-kursi="67">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">67</p>
                                    </div>
                                    <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="68">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">68</p>
                                    </div>
                                </div>
                                <div name="meja" class="block mr-2">
                                    <div class="bg-[#E0E0E0] w-12 h-20 rounded-lg"></div>
                                </div>
                                <div class="block">
                                    <div class="bg-[#E0E0E0] w-7 h-7 mb-6 rounded-lg kursi cursor-pointer" data-kursi="69">
                                        <p class="text-center items-center text-[#C2C2C2] font-normal">69</p>
                                    </div>
                                    <div class="bg-[#E0E0E0] w-7 h-7 rounded-lg kursi cursor-pointer" data-kursi="70">
                                        <p class="text-center self-center justify-center text-[#C2C2C2] font-normal">
                                            70</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="chat" class=" hidden fixed lg:bottom-20 lg:right-20 right-16 bottom-16">
        <div class="flex space-x-4">
            <div class="lg:w-96 lg:h-[450px] w-72 h-80 flex flex-col border shadow-md bg-white rounded-xl">
                <div class="flex items-center justify-between border-b p-2">
                    <!-- user info -->
                    <div class="flex items-center">
                        <img class="rounded-full w-10 h-10" src="{{ asset('img/woodz-resto.png') }}" />
                        <div class="pl-2">
                            <div class="font-semibold">
                                <a class="hover:underline" href="#">{{ $restos->name }}</a>
                            </div>
                            <div class="text-xs text-gray-600">Online</div>
                        </div>
                    </div>
                    <!-- end user info -->
                    <!-- chat box action -->
                    <div>
                        <button id="close" class="inline-flex hover:bg-indigo-50 rounded-full p-2" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- end chat box action -->
                </div>

                <div class="flex-1 px-4 py-4 overflow-y-auto">
                    <!-- chat message -->

                    <div class="flex items-center mb-4">
                        <div class="flex-none flex flex-col items-center space-y-1 mr-4">
                            <img class="rounded-full w-10 h-10" src="{{ asset('img/woodz-resto.png') }}" />
                            <a href="#" class="block text-xs hover:underline">{{ $restos->name }}</a>
                        </div>
                        <div class="flex-1 bg-indigo-400 text-white p-2 rounded-lg mb-2 relative">
                            <div>Selamat datang di {{ $restos->name }}, ada yang bisa kami bantu?</div>

                            <!-- arrow -->
                            <div class="absolute left-0 top-1/2 transform -translate-x-1/2 rotate-45 w-2 h-2 bg-indigo-400">
                            </div>
                            <!-- end arrow -->
                        </div>
                    </div>
                </div>

                <div class="flex items-center border-t p-2">
                    <!-- chat input action -->
                    <!-- end chat input action -->

                    <div class="w-full mx-2">
                        <input class="w-full rounded-full border border-gray-200" type="text" value="" placeholder="Aa" autofocus />
                    </div>

                    <!-- chat send action -->

                    <div>
                        <button class="inline-flex hover:bg-indigo-50 rounded-full p-2" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </button>
                    </div>

                    <!-- end chat send action -->
                </div>
            </div>

            <!-- end chat box -->

        </div>
    </div>


    <div id="chat-btn" class="cursor-pointer fixed z-[99999] flex items-center justify-center bottom-5 right-5 bg-primary rounded-full lg:w-16 lg:h-16 w-12 h-12">
        <i data-feather="message-square" class="text-white lg:h-10 lg:w-10"></i>
    </div>



    @extends('templates.footer')
    <script>
        // Get the chat button and chat box elements
        const chatBtn = document.getElementById("chat-btn");
        const chatBox = document.getElementById("chat");

        // Add a click event listener to the chat button
        chatBtn.addEventListener("click", function() {
            // Show the chat box
            chatBox.style.display = "block";
        });

        // Get the close button element
        const closeBtn = document.getElementById("close");

        // Add a click event listener to the close button
        closeBtn.addEventListener("click", function() {
            // Hide the chat box
            chatBox.style.display = "none";
        });





        feather.replace();

        function changeImage(element) {
            const mainImage = document.getElementById("mainImage");
            mainImage.src = element.src;
        }


        // Menu details
        const menuLink = document.getElementById("menu");
        const aboutLink = document.getElementById("about-resto");
        const couponsLink = document.getElementById("coupons");

        const menuDiv = document.querySelector(".menu");
        const aboutDiv = document.querySelector(".about");
        const couponsDiv = document.querySelector(".coupons");

        menuLink.addEventListener("click", function(event) {
            event.preventDefault();
            menuDiv.classList.remove("hidden");
            aboutDiv.classList.add("hidden");
            couponsDiv.classList.add("hidden");
        });

        aboutLink.addEventListener("click", function(event) {
            event.preventDefault();
            menuDiv.classList.add("hidden");
            aboutDiv.classList.remove("hidden");
            couponsDiv.classList.add("hidden");
        });

        couponsLink.addEventListener("click", function(event) {
            event.preventDefault();
            menuDiv.classList.add("hidden");
            aboutDiv.classList.add("hidden");
            couponsDiv.classList.remove("hidden");
        });

    </script>
    <script src="./dist/js/script.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
