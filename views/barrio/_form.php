<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Departamento;
use app\models\Ciudad;

/* @var $this yii\web\View */
/* @var $model app\models\Barrio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barrio-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'id_departamento')->textInput() ?>-->
    <?= $form->field($model, 'id_departamento')->dropDownList(ArrayHelper::map(Departamento::find()->all(), 'id', 'nombre'))?>

    <!--<?= $form->field($model, 'id_ciudad')->textInput() ?>-->
    <?= $form->field($model, 'id_ciudad')->dropDownList(ArrayHelper::map(Ciudad::find()->all(), 'id', 'nombre'))?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
