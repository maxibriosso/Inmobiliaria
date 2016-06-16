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
            <div class="col-sm-4 margin-bottom-30">
                <a href="/account/signup/" title="Sign Me Up" class="well-link">
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
            <div class="col-sm-4 margin-bottom-30">
                <a href="/relocation_services/" title="Get Help" class="well-link">
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
            <div class="col-sm-4 margin-bottom-30">
                <a href="/account/signup/" title="Sign Me Up" class="well-link">
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
        </div>
        <div class="row margin-top-30">
            <div class="col-sm-4 margin-bottom-30">

            </div>
            <div class="col-sm-4 margin-bottom-30">
                <a href="/relocation_services/" title="Get Help" class="well-link">
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
            <div class="col-sm-4 margin-bottom-30">
  
            </div>
        </div>
    </div>
    

</div>