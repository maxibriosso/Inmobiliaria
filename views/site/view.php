<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
?>
<div class="solicitud-view">
    
    <?php $src= Yii::$app->request->baseUrl.'/'.$ruta->valor.'/'.$parametro->valor; ?>
    
    <div class="media">
      <div class="media-left">  
          <img class="media-object img-circle" width="50" src="<?php echo $src ?>" alt="...">
      </div>
      <div class="media-body">
        <h4 class="media-heading"><?php echo $model->nombre ?> <small><?php echo $model->fecha_creacion ?></small></h4>
        de <?php echo $model->email ?>
        <span class="label label-info"><i class="fa fa-phone"></i> <?php echo $model->telefono ?></span>
      </div>
    </div>
    <hr>
    <div class="descrip-vista">
        <?php echo $model->descripcion ?>
    </div>
    <?php #DetailView::widget([
        #'model' => $model,
        #'attributes' => [
        #    'id',
        #    'nombre',
        #    'telefono',
        #    'email:email',
        #    'descripcion:ntext',
        #    'tipo',
        #    'estado',
        #    'fecha_creacion',
        #],
    #]) ?>

</div>
