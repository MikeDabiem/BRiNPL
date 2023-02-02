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
        centerMode: true,
        centerPadding: '16%',
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
                }
            }
        ]

    });
});