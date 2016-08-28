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
    'options' => ['enctype' => 'multipart/form-data','id'=>'formImg']]) ?>

    <?= FileInput::widget([
    'model' => $model,
    'attribute' => 'imagen[]',
    'name' => 'imagen[]',
    'options' => ['accept' => 'image/*' , 'multiple'=>true, 'id'=>'img1'],
    'pluginOptions' => [
        'uploadUrl' => Url::to(['inmueble/imagen','id'=>$id]),
        'showUpload'=> true,
        'uploadAsync'=> false,
        'maxFileCount'=> 5,
        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        'browseLabel' =>  'Imagen',
        'layoutTemplates' => [
            'footer' => '<div class="checkbox "><label class="control-label" for="img2"><input class="kv-check{TAG_VALUE}" type="checkbox" value="{TAG_VALUE}">Favorito</label></div>{actions}',
            ],
        'uploadExtraData' => new \yii\web\JsExpression("function (previewId, index) {
                        var j = 1;
                        var out = {};
                        $('input:checkbox').each(function() {
                            if($(this).is(':checked')){   
                                out['cont']= j;

                            }
                            j++;            
                        });
                        return out;
                }")
    	]

    ]); ?>

    <?php ActiveForm::end(); ?> 


</div>
<?php
$this->registerJs("
    $('#formImg').on('click','input:checkbox', function()  {
        $('#formImg input:checkbox').not(this).prop('checked', false);  
    });

");