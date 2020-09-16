$(function () {

    // Contact form validation
    $("#contactForm").validate({
        ignore: ".ignore",
        rules: {
            name: {
                required: true,
                minlength: 2,
                maxlength: 15
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true
            },
            hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
    });

});