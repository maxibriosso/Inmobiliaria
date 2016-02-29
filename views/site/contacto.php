<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="contenedor-img-contacto">

</section>
<div class="container contenido-contacto">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactoFormSubmitted')): ?>

        <div class="alert alert-success">
            Gracias por contactarnos. Nosotros responderemos a la mayor brevedad posible.
        </div>

    <?php endif; ?>

        <p>
            Si tiene consultas comerciales u otras preguntas , por favor llene el siguiente formulario para contactar con nosotros. Gracias.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <div class="solicitud-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'tipo')->dropDownList([ 'Solicitud Informacion' => 'Solicitud Informacion', 'Solicitud Publicacion' => 'Solicitud Publicacion', 'Admin' => 'Admin', ], ['prompt' => '']) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Enviar' , ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>
        </div>

</div>
