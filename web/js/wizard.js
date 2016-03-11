
var form = $("#formid");
/*form.validate({

     rules: {
        nombre: "required",
        valor: "required",
    },
      messages: {
        nombre: "Ingresar Nombre",
        valor: "Ingrese valor",
    }
});*/

form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex)
    {
       /*  form.validate().settings.ignore = ":disabled,:hidden";*/
        return form;
    },
    onFinishing: function (event, currentIndex)
    {
         
       /* form.validate().settings.ignore = ":disabled";*/
        return form;
    },
    onFinished: function (event, currentIndex)
    {

       $('#formid').submit();
    }
});



