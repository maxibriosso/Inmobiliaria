<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;
use app\models\Barrio;
use app\models\Ciudad;
use yii\widgets\Pjax;

$this->title = 'Detalle Inmueble';
$this->params['breadcrumbs'][] = $this->title;

//$baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
//$this->registerCssFile($baseUrl.'/css/slick.css');
//$this->registerCssFile($baseUrl.'/css/slick-theme.css');
?>

<section class="contenedor-img-detalle">
    <h1><?= Html::encode($this->title) ?></h1>  
</section>
<div class="contenido-detalle">
    <div class="container">
        <div class="col-md-8">
            <div class="col-md-12">
                <h2><?php echo $model->titulo ?></h2>
                <?php $cd=Barrio::findOne($model->id_barrio); ?>
                <h3><?php echo Barrio::findOne($model->id_barrio)->nombre ?> , <?php echo Ciudad::findOne($cd->id_ciudad)->nombre ?></h3>
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
                              $session = Yii::$app->session;
                              $img_pred = $session->get('img_pred');
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
            <div class="col-md-12">
                <h1>DESCRIPCIÓN</h1>
                <p><?php echo $model->descripcion ?></p>
            </div>
            <div class="col-md-12">
                <h1>CARACTERISTICAS</h1>
            </div>
        </div>
      <div class="col-md-4 buscador-ventas">
          <div class="col-md-12">
            <?php Pjax::begin(['id' => 'forminmuebles']) ?>
                <?php $form = ActiveForm::begin([
                  'method' => 'get',
                  'options'=>['class'=>'ventas-form','data-pjax' => true]
                ]); ?>

                   <div class="form-group form-select">
                       <?= $form->field($searchModel, 'tipo')->dropDownList([ 'Casa' => 'Casa', 'Apartamento' => 'Apartamento', 'Local' => 'Local', 'Terreno' => 'Terreno', 'Oficina' => 'Oficina', ], ['prompt' => 'TIPO PROPIEDAD','class'=>'form-input'])->label('  '); ?>
                   </div>
                   <div class="form-group form-select">
                       <?= $form->field($searchModel, 'cantidad_habitaciones')->dropDownList([ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], ['prompt' => 'HABITACIONES','class'=>'form-input'])->label('  '); ?>
                   </div>
                   <div class="form-group form-select">
                      <?= $form->field($searchModel, 'cantidad_banios')->dropDownList([ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], ['prompt' => 'BAÑOS','class'=>'form-input'])->label('  '); ?>
                  </div>
                  <div class="form-group">
                      <?= $form->field($searchModel, 'precio_min')->textInput(array('placeholder' => 'PRECIO MIN','class'=>'form-input'))->label('  '); ?>
                  </div>
                  <div class="form-group">
                      <?= $form->field($searchModel, 'precio_max')->textInput(array('placeholder' => 'PRECIO MAX','class'=>'form-input'))->label('  '); ?>
                  </div>
                  <div class="form-group cont-btn-form">     
                    <?= Html::submitButton('BUSCAR', ['class' => 'btn btn-default  btn-busc-lat']) ?>
                  </div>
                <?php ActiveForm::end(); ?>
            <?php Pjax::end() ?>
          </div> 

      </div>
    </div>
</div>
