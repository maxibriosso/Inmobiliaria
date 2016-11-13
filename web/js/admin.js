/*---LEFT BAR ACCORDION----*/

$(function() {
    function leftmenu(){
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
    }
    $(window).on('load', leftmenu);
    $(window).on('resize', leftmenu);
});

$(function() {
    function leftmenu2(){
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
    }
    $(window).on('load', leftmenu2);
    $(window).on('resize', leftmenu2);
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
    $("#sidebar").niceScroll({styler:"fb",cursorcolor:"#4ECDC4", cursorwidth: '3', cursorborderradius: '10px', background: '#404040', spacebarenabled:false, cursorborder: '',zindex: '1000'});
    $(".dcjq-parent.active .sub").niceScroll({styler:"fb",cursorcolor:"#4ECDC4", cursorwidth: '3', cursorborderradius: '10px', background: '#404040', spacebarenabled:true, cursorborder: '',zindex: '1000'});
    $("html").niceScroll({styler:"fb",cursorcolor:"#27da93", cursorwidth: '6', cursorborderradius: '10px', background: '#404040', spacebarenabled:false,  cursorborder: '', zindex: '1000'});

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

/*
$(document).ready(function() {
    
var $rem2 = $("#rutaRemate");

//Configuracion para file input
$rem2.fileinput({
    uploadAsync: false,
    showUpload: false,
    browseIcon: '<i class="glyphicon glyphicon-camera"></i> ',
    browseLabel: 'Imagen',
    maxFileCount: 1,
    overwriteInitial: false,

});

var $rem = $("#rutaCRemate");

//Configuracion para file input
$rem.fileinput({
    uploadAsync: false,
    showUpload: false,
    browseIcon: '<i class="glyphicon glyphicon-camera"></i> ',
    browseLabel: 'Imagen',
    maxFileCount: 1,
    overwriteInitial: false,
});

var $test = $("#rutaTest");

//Configuracion para file input
$test.fileinput({
    resizeImages: true,
    uploadAsync: false,
    showUpload: false,
    browseIcon: '<i class="glyphicon glyphicon-camera"></i> ',
    browseLabel: 'Imagen',
    maxFileCount: 1,
    overwriteInitial: false,
});

$('.filters').toggle().hide();

$('.search-button').click(function(){
    $('.filters').toggle();
    return false;
});
});
*/