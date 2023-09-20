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
  <body class="scroll-smooth">
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10 shadow-md">
      <div class="container mx-auto">
          <div class="flex items-center justify-between relative py-3 px-4">
              <div class="px-4 flex">
                  <a href="./index.html" class="font-bold text-lg text-primary block py-2"> <img src="{{asset('img/logo.png')}}"
                          width="126px" height="29px" class="mt-1 lg:scale-110" alt="" />
                  </a>
              </div>
              <div class="flex items-center px-4">
                  <button id="hamburger" name="hamburger" type="button"
                      class="scale-75 lg:hidden block absolute right-4">
                      <span
                          class="hamburger-line transition duration-300 ease-in-out origin-top-left rotate-45;"></span>
                      <span class="hamburger-line transition duration-300 ease-in-out"></span>
                      <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                  </button>
                  <nav id="nav-menu"
                      class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full lg:right-1/2 lg:top-1/2 right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                      <ul class="block lg:flex justify-center">
                          <li class="group lg:text-center">
                              <a href="{{ url('/dashboard') }}"
                                  class="text-primary lg:text-primary py-2 px-8 group-hover:underline underline-offset-8 group-hover:text-primary group-hover:font-semibold flex transition ease-in-out">Beranda</a>
                          </li>
                          <li class="group lg:text-center">
                              <a href="./kategori.html"
                                  class="text-primary lg:text-primary py-2 px-8 group-hover:underline underline-offset-8 group-hover:text-primary group-hover:font-semibold flex transition ease-in-out">Kategori</a>
                          </li>
                          <li class="group lg:text-center">
                              <a href="./favorite.html"
                                  class="text-primary lg:text-primary py-2 px-8 group-hover:underline underline-offset-8 group-hover:text-primary group-hover:font-semibold flex transition ease-in-out">Favorit</a>
                          </li>
                          <li id="account-text" class="group lg:text-center">
                              <a href="{{Route('profile.edit')}}"
                                  class="lg:hidden text-primary lg:bg-primary bg-transparent rounded-full py-2 px-8 mx-auto lg:hover:border-primary lg:hover:border-2 lg:hover:bg-transparent lg:hover:text-primary group-hover:font-semibold flex">Account</a>
                          </li>
                      </ul>
                  </nav>

                  <a href="">
                      <i class="lg:ml-8 lg:mr-0 mr-4 lg:w-6 lg:h-6 inline-flex text-primary w-5 h-5"
                          data-feather="bell" id=""></i>
                  </a>
                  <a href="./cart.html" target="_blank">
                      <svg class="lg:ml-8 lg:mr-9 mr-7 lg:w-6 lg:h-6 inline-flex text-primary w-5 h-5"
                          aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="1.4"
                              d="M6 1v4a1 1 0 0 1-1 1H1m8-2h3M9 7h3m-4 3v6m-4-3h8m3-11v16a.969.969 0 0 1-.932 1H1.934A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.829 1h8.239A.969.969 0 0 1 15 2ZM4 10h8v6H4v-6Z" />
                      </svg>
                      </i></a>

                      <a href="{{ route('login') }}" class=" w-full hidden mr-3 text-white lg:flex font-semibold bg-primary rounded-lg px-5 py-2">Log in</a>
                      <a href="{{ route('register') }}" class=" w-full hidden text-primary lg:flex font-semibold bg-secondary rounded-lg px-7 py-2">Register</a>                                      </div>
          </div>
      </div>
  </header>
    <!-- Banner -->
    <section class="pt-28 lg:pt-36 pb-12 w-full bg-white">
      <div class="container mx-auto">
        <div class="flex flex-wrap">
          <div class="w-full self-center justify-center px-4 lg:px-12">
            <div class="flex-wrap inline-flex sticky">
              <div class="search-form bg-white rounded-full flex justify-center items-center border border-primary ">
              <input class=" border-transparent focus:border-transparent focus:ring-0 py-2.5 lg:w-[975px] pr-4 pl-4 bg-white rounded-full focus:outline-none border-none" type="search" name="search" id="searchbar" onkeyup="search_resto()" placeholder="Cari disini..." />
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
                <div class="swiper-slide w-full "><img src="{{asset('img/banner.png')}}" class="w-[1513px] rounded-lg" alt=""></div>
                <div class="swiper-slide w-full "><img src="{{asset('img/banner.png')}}" class="w-[1513px] rounded-lg" alt=""></div>
                <div class="swiper-slide w-full "><img src="{{asset('img/banner.png')}}" class="w-[1513px] rounded-lg" alt=""></div>
              </div>
              <!-- If we need pagination -->
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Resto -->
    <section class="pt-8 pb-20">
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
                <!-- Slides -->
                <div class="swiper-slide restoran w-full "><a href="./detail-resto.html" class="group block rounded-lg">
                  <img
                    src="./dist/img/woods-resto.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Woodz Resto
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Pejuang No 3, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.7<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
                <div class="swiper-slide restoran w-full "><a href="./detail-resto.html" class="group block rounded-lg">
                  <img
                    src="./dist/img/resto.png"
                    alt=""
                    class="w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Naturez Cafe
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Menanggai No 17, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.5 <svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>

                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/resto-rumah-nenek.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Resto Rumah Nenek
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Anggrek No 1, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.6<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/old-rodeo.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Old Rodeo
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Kuningan No 29, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.7 <svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
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
              <div class="swiper-wrapper  w-full">
                <!-- Slides -->
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/resto.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Naturez Cafe
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Menanggai No 17, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.5 <svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/woods-resto.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Woodz Resto
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Pejuang No 3, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.7<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/resto-rumah-nenek.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Resto Rumah Nenek
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Anggrek No 1, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.6<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/old-rodeo.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Old Rodeo
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Kuningan No 29, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.7 <svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
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
              <div class="swiper-wrapper  w-full">
                <div class="swiper-slide restoran w-full "><a href="./detail-resto.html" class="group block rounded-lg">
                  <img
                    src="./dist/img/woods-resto.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Woodz Resto
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Pejuang No 3, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.7<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
                <!-- Slides -->
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/resto.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Naturez Cafe
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Menanggai No 17, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.5 <svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/resto-rumah-nenek.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Resto Rumah Nenek
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Anggrek No 1, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.6<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/old-rodeo.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Old Rodeo
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Kuningan No 29, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.7 <svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
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
              <div class="swiper-wrapper  w-full">
                <!-- Slides -->
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/resto.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Naturez Cafe
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Menanggai No 17, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.5 <svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/woods-resto.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Woodz Resto
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Pejuang No 3, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.7<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/resto-rumah-nenek.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Resto Rumah Nenek
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Anggrek No 1, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.6<svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
                <div class="swiper-slide restoran w-full "><a href="#" class="group block rounded-lg">
                  <img
                    src="./dist/img/old-rodeo.png"
                    alt=""
                    class="h-full w-full object-cover sm:h-full rounded-lg"
                  />
                
                  <div class="mt-3 flex justify-between ">
                    <div>
                      <h3
                        class="text-gray-900 group-hover:underline font-semibold group-hover:underline-offset-4"
                      >
                        Old Rodeo
                      </h3>
                
                      <p class="mt-1.5 max-w-[45ch] text-xs text-gray-500">
                        Jl. Kuningan No 29, Surabaya
                      </p>
                    </div>
                
                    <p class="text-gray-900 font-semibold inline-flex ">4.7 <svg class=" ml-1.5 w-5 h-5 text-yellow-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg></p>
                  </div>
                </a></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <footer class="bg-gray-100">
      <div class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="flex justify-center">
          <img src="{{asset('img/logo.png')}}" alt="">
        </div>
    
        <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-gray-500">
          Buukin' merupakan platform yang dapat membantu anda menemukan restoran sesuai yang anda inginkan, rasakan kemudahan reservasi dengan fitur-fitur yang kami berikan.
        </p>
    
        <ul class="mt-12 flex flex-wrap justify-center gap-6 md:gap-8 lg:gap-12">
          <li>
            <a class="text-gray-700 transition hover:text-gray-700/75" href="/">
              Beranda
            </a>
          </li>
    
          <li>
            <a class="text-gray-700 transition hover:text-gray-700/75" href="/">
              Kategori
            </a>
          </li>
    
          <li>
            <a class="text-gray-700 transition hover:text-gray-700/75" href="/">
              Favorit
            </a>
          </li>
    
          <li>
            <a class="text-gray-700 transition hover:text-gray-700/75" href="/">
              Riwayat
            </a>
          </li>
    
          <li>
            <a class="text-gray-700 transition hover:text-gray-700/75" href="/">
              Reservasi
            </a>
          </li>
        </ul>
    
        <ul class="mt-12 flex justify-center gap-6 md:gap-8">
          <li>
            <a
              href="/"
              rel="noreferrer"
              target="_blank"
              class="text-gray-700 transition hover:text-gray-700/75"
            >
              <span class="sr-only">Facebook</span>
              <svg
                class="h-6 w-6"
                fill="currentColor"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                  clip-rule="evenodd"
                />
              </svg>
            </a>
          </li>
    
          <li>
            <a
              href="/"
              rel="noreferrer"
              target="_blank"
              class="text-gray-700 transition hover:text-gray-700/75"
            >
              <span class="sr-only">Instagram</span>
              <svg
                class="h-6 w-6"
                fill="currentColor"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                  clip-rule="evenodd"
                />
              </svg>
            </a>
          </li>
    
          <li>
            <a
              href="/"
              rel="noreferrer"
              target="_blank"
              class="text-gray-700 transition hover:text-gray-700/75"
            >
              <span class="sr-only">Twitter</span>
              <svg
                class="h-6 w-6"
                fill="currentColor"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path
                  d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                />
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </footer>
    <script>
      feather.replace();
    </script>
    <script src="./dist/js/script.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  </body>
</html>
