$(function () {

    // Contact form validation (plugin)
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
            }
        }
    });

    // Honeypot - Hide the url text field
    $('#url').hide();

});