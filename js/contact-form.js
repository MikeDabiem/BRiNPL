jQuery(function ($) {
    if ($('#contact-form').length) {
        const contactForm = $("#contact-form");
        const contactFormPreloader = $(".contact-form-preloader");
        const contactFormSuccess = $(".contact-form-success");
        const nameInput = $("#form-name");
        const emailInput = $("#form-email");
        const messageInput = $("#form-message");
        contactForm.on("submit", function (e) {
            e.preventDefault();
            if (!nameInput.hasClass('error') && !emailInput.hasClass('error')) {
                contactFormPreloader.addClass("preloader-visible");
            }
            let contactFormInfo = $(this).serialize();
            const fileInput = $('#feedback-form-file');
            let formData = new FormData();
            formData.append("contact-form-file", fileInput[0].files[0]);
            formData.append("action", 'contactFormFunc');
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
                        {"key": response["form-name"], "path": nameInput},
                        {"key": response["form-email"], "path": emailInput},
                        {"key": response["form-message"], "path": messageInput},
                    ];
                    for (let i = 0; i < arrayForValidation.length; i++) {
                        contactFormChecker = checkValidationFrontend(arrayForValidation[i].key, arrayForValidation[i].path, contactFormChecker);
                    }
                    contactFormPreloader.removeClass("preloader-visible");
                    if (contactFormChecker === 0) {
                        contactFormSuccess.addClass("active");
                        setTimeout(() => {
                            contactForm.trigger("reset");
                            $('.service__item-label').removeClass('active');
                            $('.feedback-form-filename').html('');
                            contactFormSuccess.removeClass("active");
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