<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;

$baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
$this->registerJsFile($baseUrl.'/js/localizacionMapaCont.js');
?>
<section class="contenedor-img-contacto">
    <h1><?= Html::encode($this->title) ?></h1>  
</section>
<div class="contenido-contacto">
    
    
    <?php if (Yii::$app->session->hasFlash('contactoFormSubmitted')): ?>

        <div class="alert alert-success">
            Gracias por contactarnos. Nosotros responderemos a la mayor brevedad posible.
        </div>

    <?php endif; ?>
        <div class="cont-texto-contrato">
            <h3>
                Si tiene consultas comerciales u otras preguntas <br> por favor llene el siguiente formulario <br>para contactar con nosotros. Gracias.
            </h3>
        </div>
        
        <div class="cont-map">
            <div class="row">
                <div class="col-lg-5 cont-form-contacto">

                    <div class="solicitud-form">

                        <?php $form = ActiveForm::begin(); ?>
                            <div class="form-group form-select">
                                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'placeholder' => 'NOMBRE','class'=>'form-input'])->label('  '); ?>
                            </div>
                            <div class="form-group form-select">
                                <?= $form->field($model, 'telefono')->textInput(['maxlength' => true,'placeholder' => 'TELEFONO','class'=>'form-input'])->label('  '); ?>
                            </div>
                            <div class="form-group form-select">
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder' => 'EMAIL','class'=>'form-input'])->label('  '); ?>
                            </div>
                            <div class="form-group form-select">    
                                <?= $form->field($model, 'descripcion')->textarea(['rows' => 6,'placeholder' => 'DESCRIPCION','class'=>'form-input'])->label('  '); ?>
                            </div>
                            <div class="form-group form-select">
                                <?= $form->field($model, 'tipo')->dropDownList([ 'Solicitud Informacion' => 'Solicitud Informacion', 'Solicitud Publicacion' => 'Solicitud Publicacion', 'Admin' => 'Admin', ], ['prompt' => 'TIPO SOLICITUD','class'=>'form-input'])->label('  '); ?>
                            </div>
                            <div class="form-group cont-btn-form">
                                <?= Html::submitButton('ENVIAR' , ['class' => 'btn btn-success btn-busc-cont']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>

                    </div>

                </div>
                <div class="col-lg-7 cont-mapa-contacto">
                    <div id="map_contacto" class="col-md-12"></div>
                </div>
            </div>
        </div>
</div>
