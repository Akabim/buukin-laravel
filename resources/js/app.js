import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


feather.replace();


const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
  hamburger.classList.toggle("hamburger-active");
  navMenu.classList.toggle("hidden");
});

window.onscroll = function () {
  const header = document.querySelector("header");
  const fixedNav = header.offsetTop;

  if (window.pageYOffset > fixedNav) {
    header.classList.add("navbar-fixed");
  } else {
    header.classList.remove("navbar-fixed");
  }
};


// Swiper

const swiper = new Swiper(".swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  spaceBetween: 1,
  centerSlide: true,
  autoplay: {
    delay: 2000,
  },

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

const swiper2 = new Swiper(".swiper2", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  spaceBetween: 10,
  slidesPerView: 1,
  centerSlide: true,

  breakpoints: {
    768: {
      slidesPerView: 1,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
  },
});
const swiper3 = new Swiper(".swiper3", {
  // Optional parameters
  direction: "horizontal",
  spaceBetween: 10,
  slidesPerView: 2,
  centerSlide: true,

  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
  },
});

const swiper4 = new Swiper('.swiper4', {
  // Optional parameters
  direction: 'horizontal',
  slidesPerView: 3,
  spaceBetween: 15,
  centerSlide: true,

  breakpoints: {
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 7,
      spaceBetween: 10,
    },
  },
});


function changeImage(element) {
  const mainImage = document.getElementById("mainImage");
  mainImage.src = element.src;
}



document.addEventListener("DOMContentLoaded", function () {
  const kursiElements = document.querySelectorAll('.kursi');
  const selectedSeatsInput = document.getElementById("selected_seats");

  kursiElements.forEach((elem) => {
    elem.addEventListener('click', function () {
      elem.classList.toggle('bg-primary'); // Toggle warna latar belakang
      const selectedSeats = Array.from(document.querySelectorAll(".kursi.bg-primary"))
        .map(
          (selectedKursi) => selectedKursi.getAttribute("data-kursi")
        );
      selectedSeatsInput.value = selectedSeats.join(",");

      // Tambahkan console.log untuk melihat hasil
      console.log("Data kursi yang dipilih:", selectedSeatsInput.value);
    });
  });
});


// Menu details
const menuLink = document.getElementById("menu");
const aboutLink = document.getElementById("about-resto");
const couponsLink = document.getElementById("coupons");

const menuDiv = document.querySelector(".menu");
const aboutDiv = document.querySelector(".about");
const couponsDiv = document.querySelector(".coupons");

menuLink.addEventListener("click", function (event) {
  event.preventDefault();
  menuDiv.classList.remove("hidden");
  aboutDiv.classList.add("hidden");
  couponsDiv.classList.add("hidden");
});

aboutLink.addEventListener("click", function (event) {
  event.preventDefault();
  menuDiv.classList.add("hidden");
  aboutDiv.classList.remove("hidden");
  couponsDiv.classList.add("hidden");
});

couponsLink.addEventListener("click", function (event) {
  event.preventDefault();
  menuDiv.classList.add("hidden");
  aboutDiv.classList.add("hidden");
  couponsDiv.classList.remove("hidden");
});




        // Mendapatkan elemen-elemen yang diperlukan
        let searchTimeout;
        const liveSearchResults = document.getElementById('live-search-results');
        const divsToHide = document.querySelectorAll('.div-to-hide'); // Pilih semua div yang ingin disembunyikan

        // Fungsi untuk menyembunyikan semua div dengan class "div-to-hide"
        function hideDivs() {
            divsToHide.forEach(div => {
                div.style.display = 'none'; // Menyembunyikan div
            });
        }

        // Fungsi untuk menampilkan semua div dengan class "div-to-hide"
        function showDivs() {
            divsToHide.forEach(div => {
                div.style.display = 'block'; // Menampilkan kembali div
            });
        }

        // Fungsi untuk melakukan live search
        function liveSearch() {
            clearTimeout(searchTimeout);
            const query = document.getElementById('searchbar').value;

            searchTimeout = setTimeout(() => {
                if (query.trim() === '') {
                    // Jika input search kosong, hapus isi div hasil search dan sembunyikan
                    liveSearchResults.innerHTML = '';
                    liveSearchResults.classList.add('hidden');
                    showDivs(); // Menampilkan kembali semua div dengan class "div-to-hide"
                } else {
                    fetch(`{{ route('liveSearch') }}?query=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            liveSearchResults.innerHTML = ''; // Hapus hasil sebelumnya

                            if (data.length > 0) {
                                data.forEach(resto => {
                                    const resultDiv = document.createElement('div');
                                    resultDiv.classList.add('swiper-slide', 'restoran', 'w-full');

                                    const link = document.createElement('a');
                                    link.href = "{{ route('details.show', $resto->id) }}";
                                    link.classList.add('group', 'block', 'rounded-lg');

                                    const image = document.createElement('img');
                                    image.src = "{{ asset('storage/' . $resto->photo_1) }}";
                                    image.alt = '';
                                    image.classList.add('h-full', 'w-full', 'object-cover', 'sm:h-full',
                                        'rounded-lg');

                                    const contentDiv = document.createElement('div');
                                    contentDiv.classList.add('mt-3', 'flex', 'justify-between');

                                    const textDiv = document.createElement('div');

                                    const nameHeading = document.createElement('h3');
                                    nameHeading.classList.add('text-gray-900', 'group-hover:underline',
                                        'font-semibold', 'group-hover:underline-offset-4');
                                    nameHeading.textContent = resto.name;

                                    const addressPara = document.createElement('p');
                                    addressPara.classList.add('mt-1.5', 'max-w-[45ch]', 'text-xs',
                                        'text-gray-500');
                                    addressPara.textContent = resto.address;

                                    textDiv.appendChild(nameHeading);
                                    textDiv.appendChild(addressPara);

                                    const ratingsPara = document.createElement('p');
                                    ratingsPara.classList.add('text-gray-900', 'font-semibold',
                                        'inline-flex');
                                    ratingsPara.textContent = resto.ratings;

                                    const svgIcon = document.createElement('svg');
                                    svgIcon.classList.add('ml-1.5', 'w-5', 'h-5', 'text-yellow-200');
                                    svgIcon.setAttribute('aria-hidden', 'true');
                                    svgIcon.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
                                    svgIcon.setAttribute('fill', 'currentColor');
                                    svgIcon.setAttribute('viewBox', '0 0 22 20');

                                    const pathIcon = document.createElement('path');
                                    pathIcon.setAttribute('d',
                                        'M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z'
                                    );
                                    svgIcon.appendChild(pathIcon);
                                    ratingsPara.appendChild(svgIcon);

                                    contentDiv.appendChild(textDiv);
                                    contentDiv.appendChild(ratingsPara);

                                    link.appendChild(image);
                                    link.appendChild(contentDiv);
                                    resultDiv.appendChild(link);

                                    liveSearchResults.appendChild(resultDiv);
                                });

                                // Tampilkan hasil live search
                                liveSearchResults.classList.remove('hidden');
                                hideDivs(); // Sembunyikan semua div dengan class "div-to-hide"
                            } else {
                                liveSearchResults.textContent = 'Tidak ada hasil ditemukan.';
                                liveSearchResults.classList.remove('hidden');
                                showDivs(); // Menampilkan kembali semua div dengan class "div-to-hide"
                            }
                        });
                }
            }, 300); // Mengatur waktu penundaan debouncing
        }

        // Event listener untuk memanggil fungsi liveSearch saat pengguna mengetik
        document.getElementById('searchbar').addEventListener('keyup', liveSearch);