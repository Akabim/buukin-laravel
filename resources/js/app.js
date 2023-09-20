import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import 'flowbite';


const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
  hamburger.classList.toggle("hamburger-active");
  navMenu.classList.toggle("hidden");
});

const sb = document.querySelector("#search-button");

document.addEventListener("click", function (e) {
  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove("active");
  }
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

// JavaScript code
function search_resto() {
  let input = document.getElementById("searchbar").value;
  input = input.toLowerCase();
  let x = document.getElementsByClassName("restoran");

  for (i = 0; i < x.length; i++) {
    if (!x[i].innerHTML.toLowerCase().includes(input)) {
      x[i].style.display = "none";
    } else {
      x[i].style.display = "block";
    }
  }
}

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

