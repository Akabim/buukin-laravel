@extends('templates.app')

@section('content')
    <section id="" class="pt-24 lg:pt-36 mb-7">
        <div class="container mx-auto">
            <div class="flex flex-wrap px-4">
                <div class="w-full self-center justify-center lg:px-12">
                    <div class="flex-wrap inline-flex sticky mb-7">
                        <div
                            class="search-form bg-white rounded-full flex justify-center items-center border border-primary ">
                            <input
                                class=" border-transparent focus:border-transparent focus:ring-0 py-2.5 lg:w-[975px] pr-4 pl-4 bg-white rounded-full focus:outline-none border-none"
                                type="text" name="search" id="searchbar" onkeyup="search_resto()"
                                placeholder="Cari disini..." />
                            <label>
                                <i class="mr-4 lg:w-6 lg:h-6 text-primary w-5 h-5" data-feather="search"></i>
                            </label>
                        </div>
                        <div
                            class="w-44 bg-primary rounded-full lg:ml-12 hidden lg:flex border-transparent focus:border-transparent focus:ring-0">
                            <select name="" id=""
                                class="mt-3 lg:mt-0 w-full lg:w-40 lg:pr-2 p-2.5 bg-primary text-white  rounded-full">
                                <option selected>Pilih Lokasi</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Surabaya">Surabaya</option>
                                <option value="Jogja">Jogja</option>
                                <option value="Malang">Malang</option>
                            </select>
                        </div>
                        <select name="" id=""
                            class="border-transparent focus:border-transparent focus:ring-0 lg:hidden mt-3 lg:mt-0 w-full lg:w-40 lg:pr-2 p-2.5 border-e-8  border-primary border-solid lg:ml-96 bg-primary text-white rounded-full">
                            <option selected>Pilih Lokasi</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Jakarta">Surabaya</option>
                            <option value="Jakarta">Jogja</option>
                            <option value="Jakarta">Malang</option>
                        </select>
                    </div>
                </div>
                <div class="w-full self-start px-4 lg:pr-12 lg:w-2/3 lg:pb-10 ">
                    <div class="flex flex-wrap mb-7 mt-3">
                        <!-- Slider main container -->
                        <div class="swiper4 w-full">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <div class="block">
                                        <img src="{{ asset('img/category/burger.png') }}"
                                            class="w-16 lg:w-20 bg-[#F5F5F5] mx-3 lg:mx-5 rounded-lg" alt="">
                                        <p class="font-normal justify-center text-gray-600 text-center text-base mt-2">
                                            Fast Food</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="block">
                                        <img src="{{ asset('img/category/steak.png') }}"
                                            class="w-16 lg:w-20 bg-[#F5F5F5] mx-3 lg:mx-5 rounded-lg" alt="">
                                        <p class="font-normal justify-center text-gray-600 text-center text-base mt-2">
                                            Meathouse</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="block">
                                        <img src="{{ asset('img/category/sushi caviar.png') }}"
                                            class="w-16 lg:w-20 bg-[#F5F5F5] mx-3 lg:mx-5 rounded-lg" alt="">
                                        <p class="font-normal justify-center text-gray-600 text-center text-base mt-2">
                                            Japanese</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="block">
                                        <img src="{{ asset('img/category/cake.png') }}"
                                            class="w-16 lg:w-20 bg-[#F5F5F5] mx-3 lg:mx-5 rounded-lg" alt="">
                                        <p class="font-normal justify-center text-gray-600 text-center text-base mt-2">
                                            Desert</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="block">
                                        <img src="{{ asset('img/category/cofee.png') }}"
                                            class="w-16 lg:w-20 bg-[#F5F5F5] mx-3 lg:mx-5 rounded-lg" alt="">
                                        <p class="font-normal justify-center text-gray-600 text-center text-base mt-2">
                                            Coffeshop</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="block">
                                        <img src="{{ asset('img/category/cookies.png') }}"
                                            class="w-16 lg:w-20 bg-[#F5F5F5] mx-3 lg:mx-5 rounded-lg" alt="">
                                        <p class="font-normal justify-center text-gray-600 text-center text-base mt-2">
                                            Snacks</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-5">
                        <div class="w-full lg:w-1/2 justify-start">
                            <h1 class="lg:text-2xl text-lg font-semibold text-black">Japanese Food</h1>
                        </div>
                        <div class="lg:w-1/2 lg:mt-2 hidden lg:flex justify-end">
                            <a href="" class="text-primary hover:underline text-sm">Lihat Semua</a>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
                        @foreach ($restos as $resto)
                            <div class="swiper-slide restoran w-full "><a href="{{ route('details.show', $resto->id) }}"
                                    class="group block rounded-lg">
                                    <img src="{{ asset('storage/' . $resto->photo_1) }}" alt=""
                                        class="h-full w-full object-cover sm:h-full rounded-lg" />

                                    <div class="mt-3 flex justify-between ">
                                        <div>
                                            <h3
                                                class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4">
                                                {{ $resto->name }}
                                            </h3>

                                            <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                                                {{ $resto->address }}
                                            </p>
                                        </div>

                                        <p class="text-gray-900 font-semibold inline-flex ">{{ $resto->ratings }}<svg
                                                class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg></p>
                                    </div>
                                </a></div>
                        @endforeach
                    </div>
                </div>
                <div class=" w-full px-4 lg:px-5 py-7 md:w-1/3 bg-[#F5F5F5] rounded-xl mt-7 lg:mt-3">
                    <h1 class="lg:text-2xl text-lg font-semibold lg:mb-5 mb-3 text-black">Lihat Lainnya</h1>
                    @foreach ($restos as $resto)
                        <div
                            class="restoran w-full mb-5 lg:flex hover:bg-primary bg-[#EDEDED] transition py-3 px-3 rounded-xl">
                            <a href="./detail-resto.html" class="group block lg:flex rounded-lg">
                                <img src="{{ asset('storage/' . $resto->photo_1) }}" alt=""
                                    class="h-full w-full lg:w-1/2 object-cover sm:h-full rounded-lg" />
                                <div class="mt-3 lg:ml-4 block justify-between ">
                                    <div>
                                        <h3
                                            class="text-gray-900 group-hover:text-white lg:text-xl group-hover:underline font-semibold group-hover:underline-offset-4">
                                            {{ $resto->name }}
                                        </h3>

                                        <p class="mt-1.5 max-w-[45ch] text-xs text-gray-900 group-hover:text-white">
                                            {{ $resto->address }}
                                        </p>
                                    </div>

                                    <div class="flex justify-end mt-3 lg:mt-10 lg:ml-24 lg:px-0"><svg
                                            class=" mr-1.5 w-5 h-5 text-yellow-200" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>

                                        <p class="text-gray-900 group-hover:text-white font-semibold">
                                            {{ $resto->ratings }}<span class="ml-2 text-opacity-20 font-thin">(173)</span>
                                        </p>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
