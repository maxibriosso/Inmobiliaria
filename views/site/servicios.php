<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Servicios';
$this->params['breadcrumbs'][] = $this->title;

$baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
?>

<section class="contenedor-img-servicios">
    <h1><?= Html::encode($this->title) ?></h1>  
</section>
<div class="container-fluid contenido-servicios">
    <div class="container">
         <div class="row margin-top-30">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 margin-bottom-30 item-service">
                <a href="#" title="Sign Me Up" class="well-link">
                    <div class="homepage-well center">
                        <div class="well-image-container">
                            <img src="../img/servicios/remate.jpg" />
                        </div>
                        <h3>REMATES</h3>
                        <p class="well-desc">
                            Descripcion de ejemplo <br> hay q ver que se le coloca.
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 margin-bottom-30 item-service">
                <a href="#" title="Get Help" class="well-link">
                    <div class="homepage-well center">
                        <div class="well-image-container">
                            <img src="../img/servicios/inmo2.jpg" />
                        </div>
                        <h3>INMOBILIARIA</h3>
                        <p class="well-desc">
                            Descripcion de ejemplo hay q ver que se le coloca.
                        </p>
                    </div>
                </a>
            </div>
            <div class="hidden-md hidden-lg clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 margin-bottom-30 item-service">
                <a href="#" title="Sign Me Up" class="well-link">
                    <div class="homepage-well center">
                        <div class="well-image-container">
                            <img src="../img/servicios/escrb.jpg" />
                        </div>
                        <h3>ESCRIBANIA</h3>
                        <p class="well-desc">
                            Descripcion de ejemplo hay q ver que se le coloca.
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-offset-0 col-md-4 col-lg-offset-0 col-lg-4 margin-bottom-30 item-service">
                <a href="#" title="Get Help" class="well-link">
                    <div class="homepage-well center">
                        <div class="well-image-container">
                            <img src="../img/servicios/abog2.jpg" />
                        </div>
                        <h3>ABOGADO</h3>
                        <p class="well-desc">
                           Descripcion de ejemplo hay q ver que se le coloca.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>