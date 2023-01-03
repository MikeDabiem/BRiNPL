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

    // "What we do" tabs
    $('.whatwedo__tab:eq(0)').addClass('active');
    $('.all-services__tab').addClass('active');

    // Click on tab
    $('.whatwedo__tab').on('click', (e) => {
        tabChanger(e);
        $(e.target).addClass('active');
    });

    // Click on picture at "All services" tab
    $('.all-services__tab-item').on('click', (e) => {
        tabChanger(e);
        $(`.whatwedo__tab[href='${$(e.target).parent().attr('href')}']`).addClass('active');
    });

    function tabChanger(e) {
        e.preventDefault();
        $('.whatwedo__tab').removeClass('active');
        $('.whatwedo__content').animate({opacity: 0}, 400);
        setTimeout(() => {
            $('.whatwedo__content-item').removeClass('active');
            $(e.target).attr('href') ? $($(e.target).attr('href')).addClass('active') : $($(e.target).parent().attr('href')).addClass('active');
            $('.whatwedo__content').animate({opacity: 1}, 400);
        }, 400);
    }

    // Form input required error message
    $('#lets-talk-form').on('submit', (e) => {
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
    $('#lets-talk-form-file').on('change', (e) => {
        $('.lets-talk-form-filename').text(e.target.value);
    });
});