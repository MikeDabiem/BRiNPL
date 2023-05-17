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
                breakpoint: 769,
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
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        swipeToSlide: true,
        prevArrow: `<button type="button" class="all-services__prev brinpl-slider__prev transition-default slick-arrow d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="/wp-content/themes/brinpl/images/Arrow.svg" alt="prev"></button>`,
        nextArrow: `<button type="button" class="all-services__next brinpl-slider__next transition-default slick-arrow d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="/wp-content/themes/brinpl/images/Arrow.svg" alt="next"></button>`,
        responsive: [
            {
                breakpoint: 770,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    centerPadding: '16%',
                    arrows: false
                }
            }
        ]
    });
    $('.single-service__industries-cards').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        swipe: false,
        swipeToSlide: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1066,
                settings: {
                    slidesToShow: 4,
                    swipe: true
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 3,
                    swipe: true
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 2,
                    swipe: true
                }
            }
        ]
    });
    $('.single-service__expertise-cards').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        swipe: false,
        swipeToSlide: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 2,
                    swipe: true,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    swipe: true,
                }
            }
        ]
    });
});