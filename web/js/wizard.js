
var form = $("#formid");

form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex)
    {
       
        return form;
    },
    onFinishing: function (event, currentIndex)
    {
        
        return form;
    },
    onFinished: function (event, currentIndex)
    {
       $('#formid').submit();
    }
});