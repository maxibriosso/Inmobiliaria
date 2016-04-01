<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

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
    <div class="col-md-4">
        <div class="col-md-12">
              <div class="btn-group">
                  <a href="#" id="list" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-th-list">Lista</span>
                  </a>
                  <a href="#" id="grid" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-th">Grilla</span>
                  </a>
              </div> 
        </div> 
        <div class="col-md-12">
          <?php Pjax::begin(['id' => 'forminmuebles']) ?>
              <?php $form = ActiveForm::begin([
                'method' => 'get',
                'options'=>['class'=>'form-buscador','data-pjax' => true]
              ]); ?>

                 <div class="form-group">
                     <?= $form->field($searchModel, 'tipo')->dropDownList([ 'Casa' => 'Casa', 'Apartamento' => 'Apartamento', 'Local' => 'Local', 'Terreno' => 'Terreno', 'Oficina' => 'Oficina', ], ['prompt' => 'TIPO PROPIEDAD'])->label('  '); ?>
                 </div>
                 <div class="form-group">
                     <?= $form->field($searchModel, 'cantidad_habitaciones')->dropDownList([ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], ['prompt' => 'HABITACIONES'])->label('  '); ?>
                 </div>
                 <div class="form-group ">
                    <?= $form->field($searchModel, 'cantidad_banios')->dropDownList([ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], ['prompt' => 'BAÑOS'])->label('  '); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($searchModel, 'precio_min')->textInput(array('placeholder' => 'PRECIO MIN'))->label('  '); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($searchModel, 'precio_max')->textInput(array('placeholder' => 'PRECIO MAX'))->label('  '); ?>
                </div>       
                <?= Html::submitButton('BUSCAR', ['class' => 'btn btn-default']) ?>
              <?php ActiveForm::end(); ?>
          <?php Pjax::end() ?>
        </div> 

    </div>

</div>