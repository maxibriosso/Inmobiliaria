<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Departamento;
use app\models\Ciudad;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Barrio */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="barrio-form">
<?php $form = ActiveForm::begin([
    'id'=>'barrio-form',
    'enableAjaxValidation' => false,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>

    <!--<?= $form->field($model, 'id_departamento')->textInput() ?>-->
    <?= $form->field($model, 'id_departamento')->dropDownList(ArrayHelper::map(Departamento::find()->where(['estado'=>1])->all(), 'id', 'nombre'),
        ['prompt'=>'-- Seleccione --',
        'onchange'=>'
                    $.get( "'.Url::toRoute('barrio/ciudad').'", { id: $(this).val() } )
                        .done(function( data ) {
                            $( "#'.Html::getInputId($model, 'id_ciudad').'" ).html( data );
                        }
                    );
                    '       
        ]);?>

    <!--<?= $form->field($model, 'id_ciudad')->textInput() ?>-->
    
   <?php
        if ($model->isNewRecord)
            echo $form->field($model, 'id_ciudad')->dropDownList(['prompt'=>'-- Seleccione --']);
        else
        {
            $ciudad = ArrayHelper::map(Ciudad::find()->where(['id_departamento' =>$model->id_departamento])->all(), 'id', 'nombre');
            echo $form->field($model, 'id_ciudad')->dropDownList($ciudad);
        }
    ?> 

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs("
$('form#barrio-form').on('beforeSubmit', function(e) {
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: formData,
        success: function (data) {
            alert(data);
            if(data==1){
                $(form).trigger('reset');
                //$('#modal').modal('hide');
                $.pjax.reload({container:'#barrio-grid'});
            }else{ 
                if(data==2){
                    $('#modal').modal('hide');
                    $.pjax.reload({container:'#barrio-grid'});
                }else{
                    $(form).trigger('reset');
                    form.parent().html('Error en operacion barrio');
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

/*$this->registerJs('
    // obtener la id del formulario y establecer el manejador de eventos
        $("form#barrio-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action"),
                form.serialize()
            )
            .done(function(data) {
                if(data==1){
                    $(form).trigger("reset");
                    $.pjax.reload({container:"#barrio-grid"});
                }else{
                    $(form).trigger("reset");
                    form.parent().html("Error al crear barrio");
                }
            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        });
    ');*/

?>