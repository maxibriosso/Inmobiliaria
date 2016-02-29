<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use app\models\Inmueble;
use yii\helpers\Url;
use     yii\web\JsExpression ;

/* @var $this yii\web\View */
/* @var $model app\models\Imagen */
/* @var $form yii\widgets\ActiveForm */
/*<?= $form->field($model, 'imagen')->textInput() ?>*/
?>

<div class="imagen-form">

    <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']]) ?>

    <!--<?= $form->field($model, 'id_inmueble')->textInput() ?>-->
    <?= $form->field($model, 'id_inmueble')->dropDownList(ArrayHelper::map(Inmueble::find()->all(), 'id', 'nombre'))?>

  
    <!--<?= $form->field($model, 'imagen')->fileInput() ?>-->
   <?php echo $form->field($model, 'imagen[]')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*' , 'multiple'=>true,'id'=>'img1'],
    'pluginOptions' => [
        'uploadUrl' => Url::current(),
        'showUpload' => false,
        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        'browseLabel' =>  'Imagen',
        'uploadExtraData' => new JsExpression('function() {

             var $el2 = $("#img1");
             var out = {}, key, i = 0;
            $(".kv-input:visible").each(function() {
                $el = $(this);
                key = $el.hasClass("kv-new") ? "new_" + i : "init_" + i;
                out[key] = $el.val();
                i++;
            });

            return out;
        }'),
        /*'layoutTemplates' => [
            'footer' => '<div class="file-thumbnail-footer">\n' +
                        '   <div style="margin:5px 0">\n' +
                                '<h6><label class="control-label" for="img1">Nombre:</label></h6>'+
                        '       <input class="kv-input kv-new form-control input-sm {TAG_CSS_NEW}" value="{caption}" placeholder="Enter caption...">\n' +
                                '<h6><label class="control-label" for="img1">Descripcion:</label></h6>'+
                        '       <input class="kv-input kv-init form-control input-sm " value="{TAG_VALUE}" placeholder="Enter caption...">\n' +
                        '   </div>\n' +
                        '   {actions}\n' +
                        '</div>'
        ]*/
    ],
    
    ]); ?>



    <!--<?= $form->field($model, 'destacada')->textInput() ?>-->
    <?= $form->field($model, 'destacada')->checkbox(); ?>

    <!--<?= $form->field($model, 'ruta')->textInput(['maxlength' => true]) ?>-->

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'estado')->textInput() ?>-->

    <!--<?= $form->field($model, 'fecha_creacion')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
