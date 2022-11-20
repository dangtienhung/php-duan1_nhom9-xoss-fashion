$(".footer__brands").slick({
   dots: false,
   infinite: true,
   speed: 300,
   slidesToShow: 5,
   slidesToScroll: 1,
   autoplay: true,
   autoplaySpeed: 2000,
   responsive: [
      {
         breakpoint: 1024,
         settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: false,
            autoplay: true,
            autoplaySpeed: 2000,
         },
      },
      {
         breakpoint: 600,
         settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            autoplay: true,
            autoplaySpeed: 2000,
         },
      },
      {
         breakpoint: 480,
         settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            autoplay: true,
            autoplaySpeed: 2000,
         },
      },
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
   ],
});



$(".detail__product-slider").slick({
   dots: false,
   slidesToShow: 4,
   slidesToScroll: 4,
   Infinity: true,
   responsive: [
      {
         breakpoint: 1250,
         settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: false,
         },
      },
      {
         breakpoint: 950,
         settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
         },
      },
      {
         breakpoint: 650,
         settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
         },
      },
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
   ],
   prevArrow:
        "<button type='button' class='slick-prev slick-btn'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:
        "<button type='button' class='slick-next slick-btn'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
});

