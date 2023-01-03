jQuery(function($){
    $('.portfolio-slider__slides').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 15000,
        swipeToSlide: true,
        arrows: true,
        prevArrow: $('.portfolio-slider__prev'),
        nextArrow: $('.portfolio-slider__next'),
    });
});