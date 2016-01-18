<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InmuebleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmueble-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_barrio') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'id_propietario') ?>

    <?= $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'valor') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'titulo') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'amueblado') ?>

    <?php // echo $form->field($model, 'garage') ?>

    <?php // echo $form->field($model, 'jardin') ?>

    <?php // echo $form->field($model, 'parrillero') ?>

    <?php // echo $form->field($model, 'piso') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'prestamo_bancario') ?>

    <?php // echo $form->field($model, 'cantidad_banios') ?>

    <?php // echo $form->field($model, 'cantidad_habitaciones') ?>

    <?php // echo $form->field($model, 'superficie') ?>

    <?php // echo $form->field($model, 'coord') ?>

    <?php // echo $form->field($model, 'operacion') ?>

    <?php // echo $form->field($model, 'destacado') ?>

    <?php // echo $form->field($model, 'favorito') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <?php // echo $form->field($model, 'fecha_creacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
