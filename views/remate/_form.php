<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Remate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="remate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_barrio')->textInput() ?>

    <?= $form->field($model, 'titulo')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ubicacion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
