<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-view-t">

    <h2><?php echo $model->tipo ?></h2>
    <hr>
    <?php $src= Yii::$app->request->baseUrl.'/'.$ruta->valor.'/'.$parametro->valor; ?>
    
    <div class="media">
      <div class="media-left">  
          <img class="media-object img-circle" width="50" src="<?php echo $src ?>" alt="...">
      </div>
      <div class="media-body">
        <h4 class="media-heading"><?php echo $model->nombre ?> <small><?php echo $model->fecha_creacion ?></small></h4>
        de <?php echo $model->email ?>
        <span class="label label-info tel-contacto" style="float:right;"><i class="fa fa-phone"></i> <?php echo $model->telefono ?></span>
      </div>
    </div>
    <hr>
    <div class="descrip-vista">
        <?php echo $model->descripcion ?>
    </div>

</div>
