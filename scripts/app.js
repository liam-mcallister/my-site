$(document).ready(function () {

  $(window).scroll(function () {
    if ($(document).scrollTop() > 50) {
      $("nav").addClass("nav-shadow");
    } else {
      $("nav").removeClass("nav-shadow");
    }
  });
  
});
