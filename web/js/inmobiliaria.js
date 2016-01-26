$(function() {
  var activoHeader = 50;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= activoHeader ) {
           $('#frontend .logo-index').addClass('activo');
           $('#frontend .menu-index').addClass('activo');
           $('#frontend .navbar-inmo').addClass('activo');

        }
        else {
            $('#frontend .logo-index').removeClass('activo');
            $('#frontend .menu-index').removeClass('activo');
            $('#frontend .navbar-inmo').removeClass('activo');

        }
  });
  function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
  }

}); 

$(document).ready(function () {

    wow = new WOW(
      {
          boxClass: 'wow',      // default
          animateClass: 'animated', // default
          offset: 0,          // default
          mobile: true,       // default
          live: true        // default
      }
    )
    wow.init();
    
$('#frontend>.carousel').carousel()
    
});