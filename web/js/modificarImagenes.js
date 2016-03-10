

var $el3 = $("#img2");

// custom footer template for the scenario
// the custom tags are in braces
var footerTemplate = '<div class="file-thumbnail-footer">\n' +
'   <div style="margin:5px 0">\n' +
        '<h6><label class="control-label" for="img2">Nombre:</label></h6>'+
'       <input class="kv-input kv-new form-control input-sm " value="{caption}" placeholder="Enter caption...">\n' +
        '<h6><label class="control-label" for="img2">Descripcion:</label></h6>'+
'       <input class="kv-input kv-init form-control input-sm " value="{TAG_VALUE}" placeholder="Enter caption...">\n' +
        '<div class="checkbox kv-checkDiv ">'+
          '<label class="control-label" for="img2"><input class="kv-check{TAG_CSS_NEW} " type="checkbox" value="">Favorito</label>'+
        '</div>'+
'   </div>\n' +
'   {actions}\n' +
'</div>';

//Configuracion para file input
$el3.fileinput({
    uploadAsync: false,
    showUpload: false,
    uploadUrl: 'http://localhost/Inmobiliaria/web/inmueble/updateimage?id='+idInmueble,
    dropZoneEnabled: false,
    browseIcon: '<i class="glyphicon glyphicon-camera"></i> ',
    browseLabel: 'Imagen',
    maxFileCount: 5,
    overwriteInitial: false,
    layoutTemplates: {footer: footerTemplate},
    previewThumbTags: {
        '{TAG_VALUE}': '',        // no value
        '{TAG_CSS_NEW}':'',   
    },
    initialPreview:imagenes,
    initialPreviewConfig:conf,
    initialPreviewThumbTags: desc,
    uploadExtraData: function() {  // callback example
        var out = {}, key, i = 0;
        $('.kv-input:visible').each(function() {
            $el = $(this);
            key = $el.hasClass('kv-new') ? 'new_' + i : 'init_' + i;
            out[key] = $el.val();
            i++;
        });

        var j = 1;
        $('input:checkbox').each(function() {

            if($(this).is(":checked")){   
                out['check']=j;

            }

            j++;            
        });


        return out;
    },
    deleteExtraData:{
        idInmueble: idInmueble,

    },


});

//Upload todas las imagenes nuevas
$("#formImg2 button[type=\"submit\"]").on("click", function(e) {
    e.preventDefault();
    $("#img2").fileinput("upload");
});

//Chequea un unico checkbox
$('input:checkbox').on('change', function() {
    $('input:checkbox').not(this).prop('checked', false);  
});

//Evento de consulta antes de eliminar imagen
$el3.on("filepredelete", function(jqXHR) {
    var abort = true;
    if (confirm("¿Estas seguro que quieres eliminar esta imagen?")) {
        abort = false;
    }
    return abort; // you can also send any data/object that you can receive on `filecustomerror` event
});

//Evento despues de imagen subida con error 
$el3.on('filebatchuploaderror', function(event, data, previewId, index) {
    //data extra toda la informacion subida en uploadExtraData
    //data files imagenes nuevas subidas
    //data response respuesta de modificacion de imagenes
    var response = data.response;
    alert (response.respuesta);

});

//Evento despues de imagen subida con exito 
$el3.on('filebatchuploadsuccess', function(event, data, previewId, index) {
    //data extra toda la informacion subida en uploadExtraData
    //data files imagenes nuevas subidas
    //data response respuesta de modificacion de imagenes
   var response = data.response;
   alert (response.respuesta);


});

//Evento despues de imagen eliminada
$el3.on('filedeleted', function(event, key, data) {
    var response = data.responseJSON;
    alert(response.respuesta);
    
});

$('.kv-check'+destacada).attr('checked', true);

