
var $el4 = $("#imgRemate");


//Configuracion para file input
$el4.fileinput({
    uploadAsync: false,
    showUpload: false,
    browseIcon: '<i class="glyphicon glyphicon-camera"></i> ',
    browseLabel: 'Imagen',
    maxFileCount: 5,
    overwriteInitial: false,
    initialPreview:imagenes,
    initialPreviewConfig:conf,

});

//Evento de consulta antes de eliminar imagen
$el4.on("filepredelete", function(jqXHR) {
    var abort = true;
    if (confirm("¿Estas seguro que quieres eliminar esta imagen?")) {
        abort = false;
    }
    return abort; // you can also send any data/object that you can receive on `filecustomerror` event
});


//Evento despues de imagen eliminada
$el4.on('filedeleted', function(event, key, data) {
    var response = data.responseJSON;
    alert(response.respuesta);
    
});


function render(){
  google.maps.event.trigger(map, 'resize');
}