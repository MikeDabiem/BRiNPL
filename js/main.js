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

//header scroll event
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
            tabHider();
        }, 400);
    }

    if ($('.whatwedo__tabs').length) {
        function tabHider() {
            function handler() {
                if ($(window).width() < 480) {
                    if ($('.all-services__tab').hasClass('active')) {
                        $('.whatwedo__tabs').hide();
                    } else {
                        $('.whatwedo__tabs').show();
                    }
                }
            }
            handler();
            $(window).on('load resize', handler);
        }
        tabHider();
    }

// Services labels in "Let's talk" form
    $('.service__item-input').on('change', (e) => {
        $(`.service__item-label[for = ${e.target.id}]`).toggleClass('active');
    });

// Filename in "Let's talk" form
    $('#feedback-form-file').on('change', (e) => {
        $('.feedback-form-filename').text(e.target.files[0].name);
    });

//About us page strategy
    if ($('.strategy__list').length) {
        function strategyChanger(el) {
            $('.strategy__list-item').removeClass('active');
            $('.strategy__description-dot').removeClass('active');
            $('.strategy__description-content').animate({opacity: 0}, 400);
            setTimeout(() => {
                $('.strategy__description-item').removeClass('active');
                el.addClass('active');
                $('.strategy__description-content').animate({opacity: 1}, 400);
            }, 400);
        }

        $(`[data-strat="0"]`).addClass('active');
        let i = 0;
        const changeStrat = setInterval(() => {
            if (i > $('.strategy__description-item').length - 2) {
                i = 0;
            } else {
                i++;
            }
            strategyChanger($(`[data-strat=${i}]`));
        }, 3000);

        $('[data-strat]').on('click', function() {
            clearInterval(changeStrat);
            strategyChanger($(`[data-strat=${($(this).data('strat'))}]`));
            $(this).addClass('active');
        });
    }

//About us page collaboration options
    if ($('.collab__posts').length && $(window).width() < 768) {
        $('.collab__post-header').on('click', function() {
            $(this).parent().toggleClass('active');
            $(this).toggleClass('active').next().slideToggle(400);
        });
    }

//About us page faq
    if ($('.faq__items').length) {
        $('.faq__item-question').on('click', function() {
            $(this).toggleClass('active').next().slideToggle(400);
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

// Portfolio AJAX
    if ($('.portfolio-page')) {
        $('.portfolio__filter-buttons').on('change', function() {
           $('.portfolio-page__list').animate({opacity: .5}, 400);
           const data = {
               action: 'filter',
               data: $(this).serialize()
           }
           $.post(ajaxurl.url, data, function(response) {
               $('.portfolio-page__list').html(response).animate({opacity: 1}, 400);
           });
        });
    }
});