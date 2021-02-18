$(function () {

    // Contact form validation rules (plugin)
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

    // Form honeypot - Hide the url text field
    $('#url').hide();

});