<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;
use app\models\Barrio;
use app\models\Ciudad;

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = $this->title;

$baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
$this->registerJsFile($baseUrl.'/js/localizacionMapaDetalleremate.js');
?>

<section class="contenedor-img-detalle">
    <h1><?= Html::encode($this->title) ?></h1>  
</section>
<div class="contenido-detalle">
    <div class="container">
        <div class="col-md-8">
            <div class="col-md-12">
                <span class="titulo-detalle">
                    <h1><?php echo $model->direccion ?>
                    <?php $cd=$model->getBarrio(); ?>
                    <small><?php echo $cd->nombre ?> , <?php echo Ciudad::findOne($cd->id_ciudad)->nombre ?></small></h1>
                </span>
            </div>
             <div class="col-md-12">
            </div>

            <div class="col-md-12 gallery">
                <ul class="bxslider">
                    <?php 
                        $imagenes=$model->getImagenes();
                        if (is_null($imagenes)){
                              $session = Yii::$app->session;
                              $img_pred = $session->get('img_pred');
                        ?>
                            <li><img class="" src="<?= Yii::$app->request->baseUrl . '/parametros/'.$img_pred ?>" alt=""></li>
                        <?php 
                        }else{
                            foreach ($imagenes as $d):  
                        ?>
                        <li><img class="" src="<?= Yii::$app->request->baseUrl . '/uploads/'.$d->ruta?>" alt=""></li>
                    <?php  endforeach; } ?>  
                </ul>

                <div id="bx-pager">
                    <?php       
                        if (is_null($imagenes)){
                        ?>
                            <a data-slide-index="0" href=""><img class="" src="<?= Yii::$app->request->baseUrl . '/parametros/'.$img_pred ?>" alt=""></a>
                        <?php 
                        }else{
                            $contador=0;
                            foreach ($imagenes as $d):  
                        ?>
                        <a data-slide-index="<?= $contador; ?>" href=""><img class="" src="<?= Yii::$app->request->baseUrl . '/uploads/'.$d->ruta?>" alt=""></a>
                    <?php $contador++; endforeach; } ?> 
                </div>
            </div>
        </div>
      <div class="col-md-4">
            <div class="col-md-12 descrip-detalle">
              <span class="titulo-detalle-bis">
                <h1>Descripción</h1>
              </span>
              <p><?php echo $model->descripcion ?></p>
            </div>

      </div>
    </div>
    <div class="row cont-map-detalleremate">
        <div id="map_detalleremate" data-coord="<?php echo $model->ubicacion ?>" class="col-md-12"></div>
    </div>
</div>
