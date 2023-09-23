@if (Auth::user()->role == 'admin')
    <x-app-layout>
        <div class="py-4 px-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <aside id="logo-sidebar"
                    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
                    aria-label="Sidebar">
                    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                        <a href="https://flowbite.com/" class="flex items-center pl-2.5 mb-5">
                            <img src="{{ asset('img/logo.png') }}" class=" mr-3 w-full" alt="Flowbite Logo" />
                        </a>
                        <ul class="space-y-2 font-medium">
                            <li>
                                <a href="{{ route('admin.create') }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 22 21">
                                        <path
                                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                        <path
                                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                                    </svg>
                                    <span class="ml-3">Tambah Data Resto</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.create') }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 22 21">
                                        <path
                                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                        <path
                                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                                    </svg>
                                    <span class="ml-3">Tambah Data Admin Resto</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('resto.index') }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 22 21">
                                        <path
                                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                        <path
                                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                                    </svg>
                                    <span class="ml-3">Request Form Resto</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>
                <section class="pt-36 ml-32 pb-20 px-4 lg:px-14">
                    <h1>Request Form Pendaftaran Resto</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($formresto as $form)
                            <div class=" hover:bg-primary bg-[#EDEDED] transition py-3 px-3 rounded-xl">
                                <div href="./detail-resto.html" class="group block rounded-lg">
                                    <div class="mt-3">
                                        <h3 class="text-gray-900 group-hover:text-white lg:text-2xl font-semibold">
                                            {{ $form->name }}
                                        </h3>
                                        <p class="text-xs text-gray-900 group-hover:text-white">
                                            {{ $form->address }}
                                        </p>
                                        <p class="text-xs group-hover:text-white text-gray-900 mt-2">
                                            <span class="font-thin">Deskripsi: <br> </span> {{$form->description}}
                                        </p>
                                        <p class="text-xs group-hover:text-white text-gray-900">
                                            <span class="font-thin">Rating:</span>
                                            {{$form->ratings}}
                                        </p>
                                        <p class="text-xs group-hover:text-white text-gray-900">
                                            <span class="font-thin">Harga Per Meja:</span> {{$form->price}}
                                        </p>
                                        <button type="submit" id="sweetalert"
                                            class="group-hover:border-white group-hover:border-2 cursor-pointer mt-3 w-full py-3 px-2 rounded-lg bg-primary text-white lg:text-lg">
                                            Confirm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            
            </div>
        </div>
    </x-app-layout>
@endif
  