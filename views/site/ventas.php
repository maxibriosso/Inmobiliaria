<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="contenedor-img-contacto">
    <h1><?= Html::encode($this->title) ?></h1>  
</section>
<div class="container-fluid">


    <div class="col-md-8">
        <div class="well well-sm">
            <strong>Display</strong>
            <div class="btn-group">
                <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                    class="glyphicon glyphicon-th"></span>Grid</a>
            </div>
        </div>
          <?= 
          ListView::widget([
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
        
    </div>

    <!-- BUSCADOR -->
    <div class="col-md-4">
           <div class="container">
              <?php $form = ActiveForm::begin([
                'method' => 'get',
                'options'=>['class'=>'form-buscador']
              ]); ?>

                 <div class="form-group">
                   <?= $form->field($buscador, 'operacion')->dropDownList([ 'Venta' => 'VENTA', 'Alquiler' => 'ALQUILER', ], ['prompt' => 'OPERACION'])->label('  '); ?>
                 </div>
                 <div class="form-group">
                     <?= $form->field($buscador, 'tipo')->dropDownList([ 'Casa' => 'Casa', 'Apartamento' => 'Apartamento', 'Local' => 'Local', 'Terreno' => 'Terreno', 'Oficina' => 'Oficina', ], ['prompt' => 'TIPO PROPIEDAD'])->label('  '); ?>
                 </div>
                 <div class="form-group">
                     <?= $form->field($buscador, 'cantidad_habitaciones')->dropDownList([ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], ['prompt' => 'HABITACIONES'])->label('  '); ?>
                 </div>
                 <div class="form-group ">
                    <?= $form->field($buscador, 'cantidad_banios')->dropDownList([ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], ['prompt' => 'BAÑOS'])->label('  '); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($buscador, 'precio_min')->textInput(array('placeholder' => 'PRECIO MIN'))->label('  '); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($buscador, 'precio_max')->textInput(array('placeholder' => 'PRECIO MAX'))->label('  '); ?>
                </div>       
                <?= Html::submitButton('BUSCAR', ['class' => 'btn btn-default']) ?>
              <?php ActiveForm::end(); ?>
           </div>

    </div>

</div>