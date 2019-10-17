slickCarousel();

function slickCarousel(){
    $('.room-slider-wrapper').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    nextArrow: "<div class='col-1 ml-auto slider-nav-next'><button type='button' class='fas fa-chevron-right next'>Następny</button></div>",
    prevArrow: "<div class='col-1 mr-auto slider-nav-previous'><button type='button' class='fas fa-chevron-left previous'>Poprzedni</button></div>",

    responsive: [
    {
    breakpoint: 575,
    settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
    }
    }]

})}


function destroyCarousel() {
      if ($('.room-slider-wrapper').hasClass('slick-initialized')) {
        $('.room-slider-wrapper').slick('destroy');
      }      
    }