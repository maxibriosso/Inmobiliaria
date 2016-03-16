

 var $el2 = $("#img1");
// custom footer template for the scenario
// the custom tags are in braces
var footerTemplate = '<div class="file-thumbnail-footer">\n' +
'   <div style="margin:5px 0">\n' +
        '<h6><label class="control-label" for="img1">Nombre:</label></h6>'+
'       <input class="kv-input kv-new form-control input-sm " value="{caption}" placeholder="Enter caption...">\n' +
        '<h6><label class="control-label" for="img1">Descripcion:</label></h6>'+
'       <input class="kv-input kv-init form-control input-sm " value=" " placeholder="Enter caption...">\n' +
        '<div class="checkbox">'+
          '<label class="control-label" for="img1"><input class="kv-check" type="checkbox" value="">Favorito</label>'+
        '</div>'+
'   </div>\n' +
    '<div class="file-actions">\n'+
    '    <div class="file-footer-buttons">\n'+
          '<button type="button" class="kv-file-remove btn btn-xs btn-default" title="Remove file"><i class="glyphicon glyphicon-trash text-danger"></i></button>'+
        '</div>'+
        '<div class="file-upload-indicator" title="Not uploaded yet"><i class="glyphicon glyphicon-hand-down text-warning"></i></div>'+
        '<div class="clearfix"></div>'+
    '</div>\n'+
'</div>';

//Configuracion para file input
$el2.fileinput({
    uploadAsync: false,
    showUpload: false,
    uploadUrl: 'http://localhost/Inmobiliaria/web/inmueble/imagen',
    dropZoneEnabled: false,
    browseIcon: '<i class="glyphicon glyphicon-camera"></i> ',
    browseLabel: 'Imagen',
    maxFileCount: 5,
    overwriteInitial: false,
    layoutTemplates: {footer: footerTemplate},
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

        out['id']=$('#imagen-id_inmueble').val();
       
        return out;
    }
});

//Upload todas las imagenes nuevas
$("#formImg button[type=\"submit\"]").on("click", function(e) {
    e.preventDefault();
    $("#img1").fileinput("upload");
});

$(document).ready(function() {
    //Chequea un unico checkbox
    $('#formImg').on('click','input:checkbox', function()  {
        $('#formImg input:checkbox').not(this).prop('checked', false);  
    });
});




