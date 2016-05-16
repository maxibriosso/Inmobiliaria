<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Departamento;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudad-form">

    <?php $form = ActiveForm::begin([
    'id'=>'ciudad-form',
    'enableAjaxValidation' => false,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>

    <!--<?= $form->field($model, 'id_departamento')->textInput() ?>-->
    <?= $form->field($model, 'id_departamento')->dropDownList(ArrayHelper::map(Departamento::find()->all(), 'id', 'nombre'))?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs("
$('form#ciudad-form').on('beforeSubmit', function(e) {
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: formData,
        success: function (data) {
            if(data==1){
                $(form).trigger('reset');
                $.pjax.reload({container:'#ciudad-grid'});
            }else{ 
                if(data==2){
                    $('#modal').modal('hide');
                    $.pjax.reload({container:'#ciudad-grid'});
                }else{
                    $(form).trigger('reset');
                    form.parent().html('Error en operacion ciudad');
                }
            }
        },
        
    });
    return false;
}).on('submit', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});
");


?>