<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Empresa';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="contenedor-img-empresa">
    <h1><?= Html::encode($this->title) ?></h1>  
</section>
<div class="contenido-empresa">
    <div class="container">
        <div class="row cnt-quienessomos">
            <div class="col-md-6 cnt-texto-sobrenos">
                <div class="titulo-index">           
                    <h3 class="text-center">QUIENES SOMOS</h3>
                </div>
                <p class="text-center">Somos una empresa joven en constante crecimiento y capacitación. Ubicados en la Ciudad de San José de Mayo, Departamento de San José, contamos con jóvenes profesionales abocados al servicio y satisfacción de sus clientes, asesorando con responsabilidad, seriedad y de manera personalizada, los asuntos que llegan a nuestro estudio. <br>Con el convencimiento de que la formación y permanente capacitación son los argumentos que nos mantienen en la vanguardia para afrontar nuevos retos y desafíos.</p>    
            </div>
            <div class="col-md-6">
                <img src="<?= Yii::$app->request->baseUrl.'/img/about.png'?>" class="img-responsive" alt="">
            </div>
        </div>
    </div>
</div>
<div class="contenido-empresa-equipo">
    <div class="container">
        <div class="row cnt-equipo">
            <div class="col-sm-6 zero-horizontal-padding">
                <article class="agent-listing-post agent-post-odd clearfix hentry">
                    <div class="agent-common-styles">
                        <div class="inner-wrapper clearfix">
                            <figure class="agent-image">
                                <a href="#"><img class="img-circle" src="<?= Yii::$app->request->baseUrl.'/img/testimonial-image-2.jpg'?>" alt=""></a>
                            </figure>
                            <h3 class="agent-name"><a href="#">Carlos Andrés Peraza Fajardo</a><span>Escribano/Rematador</span></h3>
                            <div class="agent-social-profiles">
                                <a class="twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                <a class="gplus" target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                        <p>Comenzó sus estudios en la ciudad de San José, para luego cursar en la Universidad de la República la carrera de Escribanía, egresando de dicha institución en el año 2013.
                        En el año 2014 se recibe como rematador público, carrera que curso en la Universidad del Trabajo del Uruguay (centro de enseñanza técnico profesional CETP) 
                        Miembro de la Comisión de Derecho Comercial de la Asociación de Escribanos.</p>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 zero-horizontal-padding">
                <article class="agent-listing-post agent-post-odd clearfix hentry">
                    <div class="agent-common-styles">
                        <div class="inner-wrapper clearfix">
                            <figure class="agent-image">
                                <a href="#"><img class="img-circle" src="<?= Yii::$app->request->baseUrl.'/img/testimonial-image-5.jpg'?>" alt=""></a>
                            </figure>     
                            <h3 class="agent-name"><a href="agent-single.html">María José González Martínez</a><span>Escribana/Abogada</span></h3>
                            <div class="agent-social-profiles">
                                <a class="twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                            </div>

                        </div>
                        <p>Cursó ambas carreras en la Universidad de la República, egresando en el año 2013 y 2014 respectivamente.
                        Trabajó en la empresa CGM & asociados, recuperando activos de carteras de importantes empresas financieras.
                        Se desempeña como Abogada para el Centro de Estudiantes de Derecho en convenio con el MIDES, en la Ciudad de San José de Mayo.</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>