<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;
use app\models\Barrio;
use yii\widgets\Pjax;

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
 
  $this->registerJs(
     '$("document").ready(function(){ 
          $("#forminmuebles").on("pjax:end", function() {
              $.pjax.reload({container:"#listinmuebles"});  //Reload ListView
          });
        });'
  );
?>
<section class="contenedor-img-contacto">
    <h1><?= Html::encode($this->title) ?></h1>  
</section>
<section class="contenedor-contenido-ventas">
  <div class="container-fluid">
    <div class="col-md-8">
      <?php Pjax::begin(['id' => 'listinmuebles']) ?>
          <?= ListView::widget([
              'dataProvider' => $listDataProvider,
              'options' => [
                  'tag' => 'div',
                  'class' => 'row list-group',
                  'id' => 'products',
              ],
              'layout' => "{items}\n{pager}",
              'itemView' => 'list_item',
          ]);
          ?>
      <?php Pjax::end() ?>
    </div>

    <!-- BUSCADOR -->
    <div class="col-md-4 buscador-ventas">
        <div class="col-md-12">
              <div class="btn-group botones-buscador">
                  <a href="#" id="list" class="btn btn-default">
                    <i class="glyphicon glyphicon-th-list"><span>Lista</span></i>
                  </a>
                  <a href="#" id="grid" class="btn btn-default">
                    <i class="glyphicon glyphicon-th"><span>Grilla</span></i>
                  </a>
              </div> 
        </div> 
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
                  <?= Html::submitButton('BUSCAR', ['class' => 'btn btn-default btn-busc-lat']) ?>
                </div>
              <?php ActiveForm::end(); ?>
          <?php Pjax::end() ?>
        </div> 
    </div>
  </div>
</section>
