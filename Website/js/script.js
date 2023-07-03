var swiper = new Swiper(".slide-content", {
    slidesPerView: 4,
    spaceBetween: 30,
    centerSlides: true,
    fadeEffect: true,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      520: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      950: {
        slidesPerView: 4,
      },
    },
  });
  
  var swiper2 = new Swiper(".slide-content-mySwiper", {
    slidesPerView: 2,
    spaceBetween: 30,
    centerSlides: true,
    fadeEffect: true,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
    },
  });
  