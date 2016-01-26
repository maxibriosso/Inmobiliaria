/*---LEFT BAR ACCORDION----*/
$(function() {
    $('#nav-accordion2').dcAccordion({
        eventType: 'click',
        autoClose: true,
        saveState: true,
        disableLink: true,
        speed: 'slow',
        showCount: false,
        autoExpand: true,
//        cookie: 'dcjq-accordion-1',
        classExpand: 'dcjq-current-parent'
    });


});

$(function() {
    $('#nav-accordion').dcAccordion({
        eventType: 'click',
        autoClose: true,
        saveState: true,
        disableLink: true,
        speed: 'slow',
        showCount: false,
        autoExpand: true,
//        cookie: 'dcjq-accordion-1',
        classExpand: 'dcjq-current-parent'
    });

});

var Script = function () {


//    sidebar toggle

    $(function() {
        function tomardato() {
            var wSize = $(window).width();
            $('#dato').html(wSize);
        }
        $(window).on('load', tomardato);
        $(window).on('resize', tomardato);
    });
    
    $(function() {
        function responsiveView() {
            var wSize = $(window).width();
            if (wSize <= 768) {
                $('#collapse-2').hide();
                $('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                $('#collapse-2').show();
                $('#sidebar > ul').show();
            }
        }
        $(window).on('load', responsiveView);
        $(window).on('resize', responsiveView);
    });
    
    $('#juas').click(function () {
        
        if ($('#collapse-2').is(":visible") === true) {            
            $('#sidebar > ul').hide();
            $("#collapse-2").hide();
        } else {

            $('#sidebar > ul').show();
            $("#collapse-2").show();
        }
    });

// custom scrollbar
    $("#sidebar").niceScroll({styler:"fb",cursorcolor:"#4ECDC4", cursorwidth: '3', cursorborderradius: '10px', background: '#404040', spacebarenabled:false, cursorborder: ''});

    $("html").niceScroll({styler:"fb",cursorcolor:"#4ECDC4", cursorwidth: '6', cursorborderradius: '10px', background: '#404040', spacebarenabled:false,  cursorborder: '', zindex: '1000'});

    wow = new WOW(
        {
          boxClass:     'wow',      // default
          animateClass: 'animated', // default
          offset:       0,          // default
          mobile:       true,       // default
          live:         true        // default
        }
      )
    wow.init();

}();
