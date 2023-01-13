jQuery(function ($) {
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
            $($(e.target).attr('href')).addClass('active');
            $('.whatwedo__content').animate({opacity: 1}, 400);
        }, 400);
    }

    // Form input required error message
    $('#feedback-form').on('submit', (e) => {
        requiredChecker('#name', e);
        requiredChecker('#email', e);
    });
    function requiredChecker(selector, e) {
        if ($(selector).val() === '') {
            e.preventDefault();
            $(selector).addClass('error');
            $(selector).on('input', () => {
                $(selector).removeClass('error');
            });
            return;
        }
    }

    // Services labels in "Let's talk" form
    $('.service__item-input').on('change', (e) => {
        $(`.service__item-label[for = ${e.target.id}]`).toggleClass('active');
    });

    // Filename in "Let's talk" form
    $('#feedback-form-file').on('change', (e) => {
        $('.feedback-form-filename').text(e.target.files[0].name);
    });

    // About us page flying rocket
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
});