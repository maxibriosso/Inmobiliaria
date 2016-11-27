<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Inmueble;
use yii\helpers\Url;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Imagen */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="imagen-form">

    <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data','id'=>'formImg2']]) ?>

    <?= FileInput::widget([
    'model' => $model,
    'attribute' => 'imagen[]',
    'name' => 'imagen[]',
    'options' => ['accept' => 'image/*' , 'multiple'=>true, 'id'=>'img2'],
    'resizeImages' => true,
    'pluginOptions' => [
        'uploadUrl' => Url::to(['inmueble/updateimage','id'=>$id]),
        'showUpload'=> true,
        'uploadAsync'=> false,
        'dropZoneEnabled'=> false,
    	'initialPreview'=>$imagenes,
        'initialPreviewConfig'=>$previewconf,
        'initialPreviewThumbTags'=> $descripcion,
    	'initialPreviewAsData'=>true,
        'overwriteInitial'=> false,
        'maxFileCount'=> 5,
        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        'browseLabel' =>  'Imagen',
        'layoutTemplates' => [
            'footer' => '<div class="checkbox "><label class="control-label" for="img2"><input class="kv-check{TAG_VALUE}" type="checkbox" value="{TAG_VALUE}">Favorito</label></div>{actions}',
            ],
        'fileActionSettings' => [
            'showUpload' => false,
            ],
        'uploadExtraData' => new \yii\web\JsExpression("function (previewId, index) {
                        var j = 1;
                        var out = {};
                        $('input:checkbox').each(function() {
                            if($(this).is(':checked')){   
                                out['check']=$(this).val();
                                out['cont']= j;

                            }
                            j++;            
                        });
                        return out;
                }"),
        'deleteExtraData'=>[
            'idInmueble' => $id,

            ]
    	]

    ]); ?>



    <?php ActiveForm::end(); ?> 


</div>
<script type="text/javascript">
var destacada = <?php echo json_encode($destacada); ?>;
</script>
<?php
$this->registerJs("
    $('#formImg2').on('click','input:checkbox', function()  {
        $('#formImg2 input:checkbox').not(this).prop('checked', false);  
    });


    $('.kv-check'+destacada).attr('checked', true);

");


?>