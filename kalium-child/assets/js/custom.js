(function ($) {
    $(document).ready(function () {
        if ($(".parent--main-hero-section").length) {

            let cs_swiper;

            $('.parent--main-hero-section').append(`
                <div class="slider-controlls"> 
                    <div class="slider-nav-btn cs-arrow-prev"></div>
                    <div class="slider-pagination cs-pagination"></div>
                    <div class="slider-nav-btn cs-arrow-next"></div>
                </div>
            `);

            $(".parent--main-hero-section").addClass("swiper");
            $(".parent--main-hero-section .main-hero-section").addClass("swiper-wrapper");
            $(".parent--main-hero-section .main-hero-section > .parent--slide-row").addClass("swiper-slide");

            cs_swiper = new Swiper(".parent--main-hero-section", {
                slidesPerView: 1,
                loop: true,
                spaceBetween: 0,
                pagination: {
                    el: ".cs-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".cs-arrow-next",
                    prevEl: ".cs-arrow-prev",
                },
            });

        }

        var swiper = new Swiper(".prd-category-cards-slider", {
            slidesPerView: 1,
            spaceBetween: 10,
            speed: 500,
              autoplay: {
                  delay: 3000,
              },
              loop: true,
            breakpoints: {
              680: {
                slidesPerView: 2,
                spaceBetween: 10,
              },
              1100: {
                slidesPerView: 3,
                spaceBetween: 10,
              },
              1350: {
                slidesPerView: 4,
                spaceBetween: 10,
              },
            },
          });

          
    }); // Ready Ends
})(jQuery);
