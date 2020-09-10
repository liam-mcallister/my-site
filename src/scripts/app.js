$(document).ready(function () {

  // Adds drop shadow to navbar when user scrolls 1+px
  $(window).scroll(function () {
    if ($(document).scrollTop() > 1) {
      $("nav").addClass("nav-shadow");
    } else {
      $("nav").removeClass("nav-shadow");
    }
  });

  //Smooth scrolling to page sections and collapse the nav
  $(document).on("click", 'a[href^="#"]', function () {
    const offset = 200;
    $("html, body").animate(
      {
        scrollTop: $($(this).attr("href")).offset().top - offset,
      },
      1000
    );
    $('.navbar-collapse').collapse('hide');
  });

  // Submit form in the background and hide it
  $('form').submit(function (e) {
    $('#spinner').show();
    e.preventDefault();
    $.ajax({
      url: 'index.php',
      type: 'POST',
      data: $('form').serialize(),
      success: function () {
        $('form').hide();
        $('#success-msg').show();
      }
    });
  });

});
