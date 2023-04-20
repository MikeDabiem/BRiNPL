jQuery(function ($) {
    if ($('#staffing-form').length) {
        const contactForm = $("#staffing-form");
        const contactFormPreloader = $(".staffing-form-preloader");
        const contactFormSuccess = $(".contact-form-success");
        const nameInput = $("#staffing-name");
        const emailInput = $("#staffing-email");
        const messageInput = $("#staffing-message");
        const labelInput = $("#staffing-label");
        $('.popup__form-btn').on('click', function() {
            contactForm.submit();
        });
        contactForm.on("submit", function (e) {
            e.preventDefault();
            labelInput.val($(".popup__title").text());
            console.log(labelInput.val());
            if (!nameInput.hasClass('error') && !emailInput.hasClass('error')) {
                contactFormPreloader.addClass("preloader-visible");
            }
            let contactFormInfo = $(this).serialize();
            let formData = new FormData();
            formData.append("action", 'staffingFormFunc');
            formData.append("contactFormInfo", contactFormInfo);
            $.ajax({
                url: "/wp-admin/admin-ajax.php",
                type: "post",
                dataType: 'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    let contactFormChecker = 0;
                    let arrayForValidation = [
                        {"key": response["staffing-name"], "path": nameInput},
                        {"key": response["staffing-email"], "path": emailInput},
                        {"key": response["staffing-message"], "path": messageInput},
                    ];
                    for (let i = 0; i < arrayForValidation.length; i++) {
                        contactFormChecker = checkValidationFrontend(arrayForValidation[i].key, arrayForValidation[i].path, contactFormChecker);
                    }
                    contactFormPreloader.removeClass("preloader-visible");
                    if (contactFormChecker === 0) {
                        $('.popup__body-fig').hide();
                        contactFormSuccess.addClass("active");
                        setTimeout(() => {
                            contactForm.trigger("reset");
                            contactFormSuccess.removeClass("active");
                            $('.popup__btn').css('opacity', 1).show();
                            $('.popup__form').removeClass('active').hide();
                            $('body').removeClass('overflow-hidden');
                            $('.popup').removeClass('active');
                            $('.popup__body-fig').show();
                        }, 5000)
                    }
                },
                error: function () {
                    contactFormPreloader.removeClass("preloader-visible");
                }
            });
        });
        function checkValidationFrontend(key, path, counter) {
            if (key === false) {
                path.addClass("error");
                counter++;
                path.on('focus', () => {
                    path.removeClass('error');
                });
            } else {
                path.removeClass("error");
            }
            return counter;
        }
    }
});