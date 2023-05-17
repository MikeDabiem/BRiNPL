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

// popup show form (and AJAX)
    const popup = $('.popup');
    if (popup.length) {
        $('.outstaff__content-card').on('click', function() {
            const btn = $(this).find('.outstaff__content-card-btn');
            btn.find('span').hide();
            btn.find('img').show();
            const data = {
                action: 'popup',
                data: $(this).data('index')
            }
            $.post(ajaxurl.url, data, function(response) {
                $('.popup__content').html(response);
                popup.addClass('active');
                $(body).addClass('overflow-hidden');
                btn.find('span').show();
                btn.find('img').hide();
            });
        });
        $('.popup__btn').on('click', function() {
            if (!$('.popup__form').hasClass('active')) {
                $(this).css('opacity', 0).slideToggle(200);
                $('.popup__form').addClass('active').slideToggle(400);
            }
        });
        $('.popup__close').on('click', closePopup);
        popup.on('click', (e) => {
            if (e.target.className === 'popup active') {
                closePopup();
            }
        });
        function closePopup() {
            $('.popup__btn').css('opacity', 1).show();
            $('.popup__form').removeClass('active').hide();
            $(body).removeClass('overflow-hidden');
            popup.removeClass('active');
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
    if ($('.portfolio-single').length) {
        $('.menu-item').find(`a[href='${document.location.origin}/portfolio/']`).parent().addClass('current_page_item ');
    }

// Activate Menu Services link on single-services.php page
    if ($('.single-service').length) {
        $('.menu-item').find(`a[href='${document.location.origin}/services/']`).parent().addClass('current_page_item ');
    }


// Portfolio AJAX
    if ($('.portfolio-page').length) {
        $('.portfolio__filter-buttons').on('change', function() {
           $('.portfolio-page__list').animate({opacity: .5}, 400);
           const data = {
               action: 'filter',
               data: $(this).serialize()
           }
           $.post(ajaxurl.url, data, function(response) {
               $('.portfolio-page__list').html(response).animate({opacity: 1}, 400);
               imageScrolling();
           });
        });
    }

// Scroll images on hover
    function imageScrolling() {
        let viewScrollContainer;
        let viewScrollHeight;
        let viewScrollerProjectSpeed;
        const viewScrollerProject = $('.scroll-image-trigger');
        viewScrollerProject.on('mouseenter', function() {
            viewScrollHeight = $(this).find('.scroll-image').outerHeight();
            viewScrollerProjectSpeed = viewScrollHeight * 3;
            viewScrollContainer = $(this).find('.scroll-image-wrapper');
            viewScrollContainer.stop().animate({
                scrollTop: viewScrollHeight
            }, viewScrollerProjectSpeed);
            viewScrollContainer.on('mousewheel', function() {
                $(this).stop()
            });
        });
        viewScrollerProject.on('mouseleave', function() {
            viewScrollContainer.stop().animate({
                scrollTop: 0
            }, viewScrollerProjectSpeed)
        });
    }
    imageScrolling();

// Show more button
    const showMoreBtn = $('.show-more-button');
    if (showMoreBtn.length) {
        showMoreBtn.on('click', function() {
            if (!$(this).hasClass('active')) {
                $(this).addClass('active').text('Show less').siblings('.show-more-content').slideDown(400);
            } else {
                $(this).removeClass('active').text('Show more').siblings('.show-more-content').slideUp(400);
            }
        });
    }
});