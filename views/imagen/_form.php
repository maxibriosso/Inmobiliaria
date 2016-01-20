<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Inmueble;

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

  
    <?= $form->field($model, 'imagen')->fileInput() ?>



    <?= $form->field($model, 'destacada')->textInput() ?>

    <!--<?= $form->field($model, 'ruta')->textInput(['maxlength' => true]) ?>-->

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <!--<?= $form->field($model, 'fecha_creacion')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
