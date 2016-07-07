<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//Modulo para subir imagenes
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row content-form">

<?php $form = ActiveForm::begin([
    'id'=>'presid',   
    'options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ruta')->fileInput(['accept' => 'image/*','id'=>'rutaRemate']) ?>
    <?= $form->field($model, 'ruta_img')->fileInput(['accept' => 'image/*','id'=>'rutaCRemate']) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
