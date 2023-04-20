jQuery(function($){
    $('.brinpl-slider__slides').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 15000,
        swipeToSlide: true,
        arrows: true,
        prevArrow: $('.brinpl-slider__prev'),
        nextArrow: $('.brinpl-slider__next'),
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    centerPadding: '10%'
                }
            }
        ]
    });
    $('.portfolio-single__carousel-slides').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 15000,
        swipeToSlide: true,
        arrows: true,
        prevArrow: $('.portfolio-carousel__prev'),
        nextArrow: $('.portfolio-carousel__next'),
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    centerPadding: '16%',
                }
            }
        ]

    });
    $('.all-services__tab').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        swipe: false,
        prevArrow: `<button type="button" class="all-services__prev brinpl-slider__prev transition-default slick-arrow d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="/wp-content/themes/brinpl/images/Arrow.svg" alt="prev"></button>`,
        nextArrow: `<button type="button" class="all-services__next brinpl-slider__next transition-default slick-arrow d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="/wp-content/themes/brinpl/images/Arrow.svg" alt="next"></button>`,
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    centerPadding: '16%',
                    swipe: true,
                    swipeToSlide: true,
                    arrows: false
                }
            }
        ]
    });
});