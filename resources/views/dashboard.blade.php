@extends('templates.app')

@section('content')
{{-- Banner --}}
<section class="pt-28 lg:pt-36 pb-12 w-full bg-white">
    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="w-full self-center justify-center px-4 lg:px-12">
                <div class="flex-wrap inline-flex sticky">
                    <div class="search-form bg-white rounded-full flex justify-center items-center border border-primary ">
                        <input class=" border-transparent focus:border-transparent focus:ring-0 py-2.5 lg:w-[975px] pr-4 pl-4 bg-white rounded-full focus:outline-none border-none" type="text" name="search" id="searchbar" onkeyup="search_resto()" placeholder="Cari disini..." />
                        <label>
                            <i class="mr-4 lg:w-6 lg:h-6 text-primary w-5 h-5" data-feather="search"></i>
                        </label>
                    </div>
                    <div class="w-40 bg-primary rounded-full lg:ml-12 hidden lg:flex">
                        <select name="" id="" class="mt-3 lg:mt-0 w-full lg:w-40 lg:pr-2 p-2.5 bg-primary text-white  rounded-full border-transparent focus:border-transparent focus:ring-0">
                            <option selected>Pilih Lokasi</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Jogja">Jogja</option>
                            <option value="Malang">Malang</option>
                        </select>
                    </div>
                    <select name="" id="" class=" border-transparent focus:border-transparent focus:ring-0 lg:hidden mt-3 lg:mt-0 w-full lg:w-40 lg:pr-2 p-2.5 border-e-8  border-primary border-solid lg:ml-96 bg-primary text-white rounded-full">
                        <option selected>Pilih Lokasi</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Jakarta">Surabaya</option>
                        <option value="Jakarta">Jogja</option>
                        <option value="Jakarta">Malang</option>
                    </select>
                </div>
                <!-- banner -->
                <div class="swiper lg:rounded-xl rounded-lg mt-7 lg:w-full flex-shrink sample-slider">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper  w-full">
                        <!-- Slides -->
                        <div class="swiper-slide w-full "><img src="{{ asset('img/banner.png') }}" class="w-[1513px] rounded-lg" alt=""></div>
                        <div class="swiper-slide w-full "><img src="{{ asset('img/banner.png') }}" class="w-[1513px] rounded-lg" alt=""></div>
                        <div class="swiper-slide w-full "><img src="{{ asset('img/banner.png') }}" class="w-[1513px] rounded-lg" alt=""></div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Main Content --}}
<section class="pt-8 pb-20 bg-white">
    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="w-full self-center justify-center px-4 lg:px-12">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 justify-start">
                        <h1 class="text-2xl font-bold text-black">Rekomendasi Untukmu!</h1>
                    </div>
                    <div class="lg:w-1/2 lg:mt-1 hidden lg:flex justify-end">
                        <a href="" class="text-primary hover:underline text-sm">Lihat Semua</a>
                    </div>
                </div>
                <div class="swiper2 lg:rounded-xl mt-3 lg:w-full flex-shrink sample-slider">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper flex-shrink  max-w-full">
                        @foreach ($restos as $resto )
                        <div class="swiper-slide restoran w-full "><a href="{{ route('details.show', $resto->id) }}" class="group block rounded-lg">
                                <img src="{{asset('storage/' . $resto->photo_1)}}" alt="" class="h-full w-full object-cover sm:h-full rounded-lg" />

                                <div class="mt-3 flex justify-between ">
                                    <div>
                                        <h3 class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4">
                                            {{$resto->name}}
                                        </h3>

                                        <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                                            {{$resto->address}}
                                        </p>
                                    </div>

                                    <p class="text-gray-900 font-semibold inline-flex ">{{$resto->ratings}}<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg></p>
                                </div>
                            </a></div>
                        @endforeach

                        <!-- Slides -->

                    </div>
                </div>
            </div>
            <div class="mt-7 w-full self-center justify-center px-4 lg:px-12">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 justify-start">
                        <h1 class="text-2xl font-bold text-black">Sedang Tren!</h1>
                    </div>
                    <div class="lg:w-1/2 lg:mt-1 hidden lg:flex justify-end">
                        <a href="" class="text-primary hover:underline text-sm">Lihat Semua</a>
                    </div>
                </div>
                <div class="swiper2 lg:rounded-xl mt-3 lg:w-full flex-shrink sample-slider">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper flex-shrink  max-w-full">
                        @foreach ($restos as $resto )
                        <div class="swiper-slide restoran w-full "><a href="{{ route('details.show', $resto->id) }}" class="group block rounded-lg">
                                <img src="{{asset('storage/' . $resto->photo_1)}}" alt="" class="h-full w-full object-cover sm:h-full rounded-lg" />

                                <div class="mt-3 flex justify-between ">
                                    <div>
                                        <h3 class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4">
                                            {{$resto->name}}
                                        </h3>

                                        <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                                            {{$resto->address}}
                                        </p>
                                    </div>

                                    <p class="text-gray-900 font-semibold inline-flex ">{{$resto->ratings}}<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg></p>
                                </div>
                            </a></div>
                        @endforeach

                        <!-- Slides -->

                    </div>
                </div>
            </div>
            <div class="mt-7 w-full self-center justify-center px-4 lg:px-12">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 justify-start">
                        <h1 class="text-2xl font-bold text-black">Restoran Baru!</h1>
                    </div>
                    <div class="lg:w-1/2 lg:mt-1 hidden lg:flex justify-end">
                        <a href="" class="text-primary hover:underline text-sm">Lihat Semua</a>
                    </div>
                </div>
                <div class="swiper2 lg:rounded-xl mt-3 lg:w-full flex-shrink sample-slider">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper flex-shrink  max-w-full">
                        @foreach ($restos as $resto )
                        <div class="swiper-slide restoran w-full "><a href="{{ route('details.show', $resto->id) }}" class="group block rounded-lg">
                                <img src="{{asset('storage/' . $resto->photo_1)}}" alt="" class="h-full w-full object-cover sm:h-full rounded-lg" />

                                <div class="mt-3 flex justify-between ">
                                    <div>
                                        <h3 class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4">
                                            {{$resto->name}}
                                        </h3>

                                        <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                                            {{$resto->address}}
                                        </p>
                                    </div>

                                    <p class="text-gray-900 font-semibold inline-flex ">{{$resto->ratings}}<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg></p>
                                </div>
                            </a></div>
                        @endforeach

                        <!-- Slides -->

                    </div>
                </div>
            </div>
            <div class="mt-7 w-full self-center justify-center px-4 lg:px-12">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 justify-start">
                        <h1 class="text-2xl font-bold text-black">Lagi Promo!</h1>
                    </div>
                    <div class="lg:w-1/2 lg:mt-1 hidden lg:flex justify-end">
                        <a href="" class="text-primary hover:underline text-sm">Lihat Semua</a>
                    </div>
                </div>
                <div class="swiper2 lg:rounded-xl mt-3 lg:w-full flex-shrink sample-slider">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper flex-shrink  max-w-full">
                        @foreach ($restos as $resto )
                        <div class="swiper-slide restoran w-full "><a href="{{ route('details.show', $resto->id) }}" class="group block rounded-lg">
                                <img src="{{asset('storage/' . $resto->photo_1)}}" alt="" class="h-full w-full object-cover sm:h-full rounded-lg" />

                                <div class="mt-3 flex justify-between ">
                                    <div>
                                        <h3 class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4">
                                            {{$resto->name}}
                                        </h3>

                                        <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                                            {{$resto->address}}
                                        </p>
                                    </div>
                                    <p class="text-gray-900 font-semibold inline-flex ">{{$resto->ratings}}<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg></p>
                                </div>
                            </a></div>
                        @endforeach

                        <!-- Slides -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
