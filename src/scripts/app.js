$(document).ready(function () {

  // Adds drop shadow to navbar when user scrolls 1+px
  $(window).scroll(function () {
    if ($(document).scrollTop() > 1) {
      $("nav").addClass("nav-shadow");
    } else {
      $("nav").removeClass("nav-shadow");
    }
  });

});
