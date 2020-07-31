$(document).ready(function () {

  // Adds drop shadow to navbar when user scrolls 50+px
  $(window).scroll(function () {
    if ($(document).scrollTop() > 50) {
      $("nav").addClass("nav-shadow");
    } else {
      $("nav").removeClass("nav-shadow");
    }
  });

  // Glide.js config
  const carouselConfig =  {
    
  }
  
});
