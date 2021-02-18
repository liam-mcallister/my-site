$(function () {

  // Adds drop shadow to navbar when user scrolls 1+px
  // Removes it when user scrolls to top
  $(window).on("scroll", function () {
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

});
