<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Departamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departamento-form">

    <?php $form = ActiveForm::begin([
    'id'=>'departamento-form',
    'enableAjaxValidation' => false,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs("
$('form#departamento-form').on('beforeSubmit', function(e) {
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: formData,
        success: function (data) {
            if(data==1){
                $(form).trigger('reset');
                $.pjax.reload({container:'#departamento-grid'});
            }else{ 
                if(data==2){
                    $('#modal').modal('hide');
                    $.pjax.reload({container:'#departamento-grid'});
                }else{
                    $(form).trigger('reset');
                    form.parent().html('Error en operacion departamento');
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