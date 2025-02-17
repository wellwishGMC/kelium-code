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

        if ($(".single-products-section .products-loop").length) {

          let csp_swiper;

          $('.single-products-section .products-loop').append(`
              <div class="slider-controlls">
    			  <div class="swiper-button-prev prd-slider-btn"></div>
                  <div class="slider-pagination cs-pagination csp-pagination"></div>
                  <div class="swiper-button-next prd-slider-btn"></div>
              </div>
          `);

          $(".single-products-section .products-loop").addClass("swiper");
          $(".single-products-section ul.products").addClass("swiper-wrapper");
          $(".single-products-section ul.products > li").addClass("swiper-slide");

          csp_swiper = new Swiper(".single-products-section .products-loop", {
              slidesPerView: 1.1,
              loop: false,
              spaceBetween: 22,
              breakpoints: {
                680: {
                  slidesPerView: 2,
                  spaceBetween: 10,
                },
                1024: {
                  slidesPerView: 3,
                  spaceBetween: 10,
                },
              },
              pagination: {
                  el: ".csp-pagination",
                  type: "progressbar",
              },
              navigation: {
                  nextEl: ".swiper-button-next",
                  prevEl: ".swiper-button-prev",
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

          $('.products-archive--sidebar .select2-selection__placeholder').each(function() {
            let text = $(this).text().trim(); // Get text and trim spaces
            let newText = text.replace(/^Ogni\s*/, ''); // Remove "Ogni" and any following spaces
            $(this).text(newText); // Update the element's text
        });
        
// 		Add Custom Quick view button in the product
    $('.woocommerce-shop .products-loop .product .product-images, .tax-product_cat .products-loop .product .product-images').append('<button class="custom-quick-view">Acquista</button>');
		$('.single-products-section .product-images').append('<button class="custom-quick-view">Acquista</button>');
		$('.single-products-section .product-images, .woocommerce-shop .products-loop .product .product-images, .tax-product_cat .products-loop .product .product-images').on('click', '.custom-quick-view', function() {
			$(this).closest('.product.catalog-layout-default').find('.addonify-qvm-button').trigger('click');
		});
		
		$('.archive.woocommerce-page.woocommerce .products-archive--sidebar').append('<button class="mobile-menu">Filters</button>');
		$('.products-archive--sidebar .mobile-menu').on('click', function(){
			$(this).toggleClass('open-mobile-sidebar')
			$('.products-archive--sidebar .products-archive--widgets').slideToggle()
		});
		
		
    }); // Ready Ends
})(jQuery);
