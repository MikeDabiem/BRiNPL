jQuery(function ($) {
// PREVENT BACKGROUND SCROLL
    let currentWindowScrollPosition;
    let checkCurrentWindowScrollPosition = false;
    window.addEventListener('scroll', function (e) {
        if (checkCurrentWindowScrollPosition === true && currentWindowScrollPosition !== $(document).scrollTop()) {
            e.preventDefault();
        }
    });
    function getCurrentScrollData() {
        checkCurrentWindowScrollPosition = true;
        currentWindowScrollPosition = $(document).scrollTop();
    }
    function disablingScrollFreezing() {
        checkCurrentWindowScrollPosition = false;
    }
// END PREVENT BACKGROUND SCROLL

// burger
    $('.burger').on('click', function() {
        if(!$(this).hasClass('active')) {
            $(this).addClass('active');
            $('.nav-menu').addClass('active');
            $(body).addClass('overflow-hidden');
        } else {
            $(this).removeClass('active');
            $('.nav-menu').removeClass('active');
            $(body).removeClass('overflow-hidden');
        }
    })

//header scroll
    const header = $(".header");
    let currentMenuScroll = $(window).scrollTop();
    function checkHeaderClass() {
        (currentMenuScroll > 0) ? header.addClass("header-scrolled") : header.removeClass("header-scrolled");
    }
    checkHeaderClass();
    $(window).on("scroll", function () {
        currentMenuScroll = $(this).scrollTop();
        checkHeaderClass();
    });

// Scroll button
    $('#hero__scroll').on('click', (e) => {
        e.preventDefault();
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#whatwedo").offset().top - $(".header").outerHeight()
        }, 500);
    });

// Click on "What we do" tab
    $('.whatwedo__tab').on('click', (e) => {
        tabChanger(e);
        $(e.target).addClass('active');
    });

// Click on picture at "All services" tab
    $('.all-services__tab-item').on('click', (e) => {
        tabChanger(e);
        $(`.whatwedo__tab[href='${$(e.target).attr('href')}']`).addClass('active');
    });

    function tabChanger(e) {
        e.preventDefault();
        $('.whatwedo__tab').removeClass('active');
        $('.whatwedo__content').animate({opacity: 0}, 400);
        setTimeout(() => {
            $('.whatwedo__content-item').removeClass('active');
            $('#' + $(e.target).attr('href')).addClass('active');
            $('.whatwedo__content').animate({opacity: 1}, 400);
        }, 400);
    }

// Services labels in "Let's talk" form
    $('.service__item-input').on('change', (e) => {
        $(`.service__item-label[for = ${e.target.id}]`).toggleClass('active');
    });

// Filename in "Let's talk" form
    $('#feedback-form-file').on('change', (e) => {
        $('.feedback-form-filename').text(e.target.files[0].name);
    });

// About us page FLYING ROCKET
    if ($('.strategy__items').length) {
        const itemHeight = $('.strategy__items').outerHeight();
        const animItemOffset = $('.strategy__items').offset().top;
        const animStart = 4;

        function flying() {
            const scrollTop = $(window).scrollTop();

            let animTrigger = $(window).innerHeight() - itemHeight / animStart;
            if (itemHeight > $(window).innerHeight()) {
                animTrigger = $(window).innerHeight() - $(window).innerHeight() / animStart;
            }

            if (scrollTop > (animItemOffset - animTrigger) && scrollTop < (animItemOffset + itemHeight)) {
                $('.strategy__line').addClass('fly');
                $('.strategy__item').each(function (i) {
                    setTimeout(() => {
                        $(this).addClass('fly');
                    }, (i + $('.strategy__item').length / 10) * (2000 / $('.strategy__item').length));
                });
            }
        }

        flying();

        $(window).on('scroll' , () => {
            flying();
        });
    }

/*HEIGHT SLIDER TRANSITION*/
    const body = $("body");
    const html = $("html");
    const modal = $(".modal");
    body.on('slide.bs.carousel', '.carousel', function (e) {
        let nextH = $(e.relatedTarget).height();
        $(this).find('.active.carousel-item').parent().animate({
            height: nextH
        }, 500);
    });
    $(window).on('hidden.bs.modal', function () {
        $('.carousel .carousel-inner').css("height", "auto");
    });
    $(window).resize(function () {
        $('.carousel .carousel-inner').css("height", "auto");
    });
/*END HEIGHT SLIDER TRANSITION*/

/*SHOW SLIDE BY PREVIEW CLICK*/
    let imageNumber;
    let slideNumber;
    body.on("click", ".slider-image-link", function () {
        imageNumber = $(this).attr('data-counter');
        $('.image-modal-window').find('.carousel-item').each(function () {
            $(this).removeClass('active');
            slideNumber = $(this).attr("data-counter");
            if (slideNumber == imageNumber) {
                $(this).addClass('active');
            }
        });
    });
/*END SHOW SLIDE BY PREVIEW CLICK*/

/*CLOSE MODAL FIX*/
    body.on('click', ".image-modal-window .align-modal-helper", function (e) {
        if (e.target !== this) return;
        $(this).parents('.image-modal-window').find('.modal-cross').trigger('click');
    });
    body.on('click', ".image-modal-window .modal-content", function (e) {
        if (e.target !== this) return;
        $(this).parents('.image-modal-window').find('.modal-cross').trigger('click');
    });
/*CLOSE MODAL FIX*/

/*OVERFLOW MODAL FIX*/
    modal.on('shown.bs.modal', function () {
        body.removeClass('modal-open');
        html.addClass('modal-open');
    });
    modal.on('hidden.bs.modal', function () {
        html.removeClass('modal-open');
    });
/*END OVERFLOW MODAL FIX*/

// Activate Menu Portfolio link on single.php page
    if ($('.portfolio-close').length) {
        $('.menu-item').find(`a[href='${$('.portfolio-close').attr('href')}']`).parent().addClass('current_page_item ');
    }
// END Activate Menu Portfolio link on single.php page
});