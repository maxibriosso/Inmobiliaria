$(function() {
  var activoHeader = 50;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= activoHeader ) {
           $('#frontend .logo-index').addClass('activo');
           $('#frontend .menu-index').addClass('activo');
           $('#frontend .navbar-inmo').addClass('activo');
           $('#frontend .mn-menu-social-header').addClass('activo');
           $('#frontend .menu-social-header').addClass('activo');

        }
        else {
            $('#frontend .logo-index').removeClass('activo');
            $('#frontend .menu-index').removeClass('activo');
            $('#frontend .navbar-inmo').removeClass('activo');
            $('#frontend .mn-menu-social-header').removeClass('activo');
            $('#frontend .menu-social-header').removeClass('activo');

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
    
$('#frontend>.carousel').carousel();


var owl = $("#owl-demo");
 
owl.owlCarousel({
    items : 4, //10 items above 1000px browser width
    itemsCustom : false,
    autoPlay:  true,
    pagination : false,
    stopOnHover: true,
    responsive:  true,
    navigation:true,
    navigationText: [
      "<i class='fa fa-chevron-circle-left'></i>",
      "<i class='fa fa-chevron-circle-right'></i>"
      ],
});


var owl2 = $("#owl-uingresos");
 
owl2.owlCarousel({
    items : 4, //10 items above 1000px browser width
    itemsCustom : false,
    autoPlay:  true,
    pagination : false,
    paginationSpeed: 1000,
    responsive:  true,
    stopOnHover: true,
    navigation:true,
    navigationText: [
      "<i class='fa fa-chevron-circle-left'></i>",
      "<i class='fa fa-chevron-circle-right'></i>"
      ],
});

var owl4 = $("#owl-rem");
 
owl4.owlCarousel({
    items : 4, //10 items above 1000px browser width
    itemsCustom : false,
    autoPlay:  true,
    pagination : false,
    paginationSpeed: 1000,
    responsive:  true,
    stopOnHover: true,
    navigation:true,
    navigationText: [
      "<i class='fa fa-chevron-circle-left'></i>",
      "<i class='fa fa-chevron-circle-right'></i>"
      ],
});

var owl3 = $("#owl-test");
 
owl3.owlCarousel({
    animateOut: 'fadeOut',
    items : 1, //10 items above 1000px browser width
    itemsCustom : false,
    autoPlay:  true,
    pagination : true,
    paginationSpeed: 500,
    responsive:  true,
    stopOnHover: true,
    navigation: false,
    
});

$(".botones-buscador > .btn").click(function(){
    $(this).addClass("active").siblings().removeClass("active");
});

  $('.bxslider').bxSlider({
    pagerCustom: '#bx-pager',
    nextSelector: '.slider-next',
    prevSelector: '.slider-prev',
    nextText: '<img src="web/images/slider-next2.png" alt="Next" />',
    prevText: '<img src="web/images/slider-prev2.png" alt="Previous" />'
  });
  
  $("html").niceScroll({styler:"fb",cursorcolor:"#27da93", cursorwidth: '6', cursorborderradius: '10px', background: '#404040', spacebarenabled:false,  cursorborder: '', zindex: '1000'});

});


$(window).load(function(){
  call_slider_sequence();    
});
function call_slider_sequence(){
  if($('#sequence').length > 0){
    var options = {
      autoPlay: true,
      autoPlayDelay: 6000,
      pauseOnHover: false,
      hidePreloaderDelay: 1000,
      nextButton: true,
      prevButton: true,
      pauseButton: true,
      preloader: true,
      hidePreloaderUsingCSS: false,                   
      animateStartingFrameIn: true,    
      navigationSkipThreshold: 1700,
      preventDelayWhenReversingAnimations: true,
      customKeyEvents: {
        80: "pause"
      }
    };
    

    var sequence = $("#sequence").sequence(options).data("sequence");
  }
}

$(function() {
    function activarbotonera(){
        $(".botones-buscador > #grid").addClass("active");
    }
    $(window).on('load', activarbotonera);
});