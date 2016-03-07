

 var $el3 = $("#img2");
// custom footer template for the scenario
// the custom tags are in braces
var footerTemplate = '<div class="file-thumbnail-footer">\n' +
'   <div style="margin:5px 0">\n' +
        '<h6><label class="control-label" for="img2">Nombre:</label></h6>'+
'       <input class="kv-input kv-new form-control input-sm " value="{caption}" placeholder="Enter caption...">\n' +
        '<h6><label class="control-label" for="img2">Descripcion:</label></h6>'+
'       <input class="kv-input kv-init form-control input-sm " value="{TAG_VALUE}" placeholder="Enter caption...">\n' +
        '<div class="checkbox kv-check2 ">'+
          '<label class="control-label" for="img2"><input class="kv-check" type="checkbox" value="" onchange="valueChanged()">Favorito</label>'+
        '</div>'+
'   </div>\n' +
'   {actions}\n' +
'</div>';

$el3.fileinput({
    uploadAsync: false,
    showUpload: false,
    uploadUrl: 'http://localhost/Inmobiliaria/web/inmueble/updateimage',
    dropZoneEnabled: false,
    browseIcon: '<i class="glyphicon glyphicon-camera"></i> ',
    browseLabel: 'Imagen',
    maxFileCount: 5,
    overwriteInitial: false,
    layoutTemplates: {footer: footerTemplate},
    previewThumbTags: {
        '{TAG_VALUE}': '',        // no value
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
        $('.kv-check:visible').each(function() {

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

$("#formImg2 button[type=\"submit\"]").on("click", function(e) {
    e.preventDefault();
    $("#img2").fileinput("upload");
});

function valueChanged()
{
    if($('.kv-check').is(":checked")){
         $(".kv-check2").addClass("disabled");
         $('.kv-check').attr('disabled', true);

    }   
       
    
}
$el3.on("filepredelete", function(jqXHR) {
    var abort = true;
    if (confirm("Estas seguro que quieres eliminar esta imagen?")) {
        abort = false;
    }
    return abort; // you can also send any data/object that you can receive on `filecustomerror` event
});
 


