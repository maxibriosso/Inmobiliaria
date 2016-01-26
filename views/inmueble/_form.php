<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Propietario;
use app\models\Barrio;
use app\models\Usuario;

/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmueble-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
        <!--<?= $form->field($model, 'id_barrio')->textInput() ?>-->
        <?= $form->field($model, 'id_barrio')->dropDownList(ArrayHelper::map(Barrio::find()->all(), 'id', 'nombre'))?>

        <!--<?= $form->field($model, 'id_usuario')->textInput() ?>-->
        <!--<?= $form->field($model, 'id_usuario')->dropDownList(ArrayHelper::map(Usuario::find()->all(), 'id', 'nombre'))?>-->

        <!--<?= $form->field($model, 'id_propietario')->textInput() ?>-->
        <?= $form->field($model, 'id_propietario')->dropDownList(ArrayHelper::map(Propietario::find()->all(), 'id', 'nombre'))?>

        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'valor')->textInput() ?>

        <?= $form->field($model, 'estado')->dropDownList([ 'A Estrenar' => 'A Estrenar', 'Reciclado' => 'Reciclado', 'Nuevo' => 'Nuevo', 'Reparaciones Menores' => 'Reparaciones Menores', 'Impecable' => 'Impecable', 'Para Reciclar' => 'Para Reciclar', 'En Construccion' => 'En Construccion', 'En pozo' => 'En pozo', ], ['prompt' => '']) ?>

        <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

        <!--<?= $form->field($model, 'amueblado')->textInput() ?>-->
        <?= $form->field($model, 'amueblado')->checkbox(); ?>


        <!--<?= $form->field($model, 'garage')->textInput() ?>-->
        <?= $form->field($model, 'garage')->checkbox(); ?>

        <!--<?= $form->field($model, 'jardin')->textInput() ?>-->
        <?= $form->field($model, 'jardin')->checkbox(); ?>
        
        <!--<?= $form->field($model, 'parrillero')->textInput() ?>-->
        <?= $form->field($model, 'parrillero')->checkbox(); ?>
    </div>
    <div class="col-md-6">


        <?= $form->field($model, 'piso')->textInput() ?>

        <?= $form->field($model, 'tipo')->dropDownList([ 'Casa' => 'Casa', 'Apartamento' => 'Apartamento', 'Local' => 'Local', 'Terreno' => 'Terreno', 'Oficina' => 'Oficina', ], ['prompt' => '']) ?>

        <!-- <?= $form->field($model, 'prestamo_bancario')->textInput() ?>-->
        <?= $form->field($model, 'prestamo_bancario')->checkbox(); ?>

        <?= $form->field($model, 'cantidad_banios')->textInput() ?>

        <?= $form->field($model, 'cantidad_habitaciones')->textInput() ?>

        <?= $form->field($model, 'superficie')->textInput() ?>

        <?= $form->field($model, 'coord')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'operacion')->dropDownList([ 'Compra' => 'Compra', 'Alquiler' => 'Alquiler', ], ['prompt' => '']) ?>

        <!--<?= $form->field($model, 'destacado')->textInput() ?>-->
        <?= $form->field($model, 'destacado')->checkbox(); ?>

        <!--<?= $form->field($model, 'favorito')->textInput() ?>-->
        <?= $form->field($model, 'favorito')->checkbox(); ?>

        <!--<?= $form->field($model, 'activo')->textInput() ?>-->
        <?= $form->field($model, 'activo')->checkbox(); ?>

        <!--<?= $form->field($model, 'fecha_creacion')->textInput() ?>-->
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
