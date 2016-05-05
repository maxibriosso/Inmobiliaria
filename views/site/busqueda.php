<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Usuario;
use app\models\Propietario;


use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;
use app\models\Barrio;
use yii\widgets\Pjax;

$this->title = 'Busqueda';
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


    <div class="col-md-12">
      <?php Pjax::begin(['id' => 'listinmuebles']) ?>
          <?= ListView::widget([
              'dataProvider' => $dataProvider,
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
    


</div>