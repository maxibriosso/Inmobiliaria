<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Barrio;
use app\models\Propietario;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Remate */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Remates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-8 panel-view wow bounceInUp" role="menu" data-wow-duration="0.8s" data-wow-delay="0.2s">
    <div class="panel-heading text-left">
        <p class="btn-action-view">
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-picture"></span>', ['updateimage', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que desea eliminar este remate?',
                'method' => 'post',
            ],
        ]) ?>
        </p>
        <h3>
            <?php echo $model->titulo; ?> 
        </h3>
<!--    <h5>
            <?php //echo $model->direccion; ?> / <?php //echo Propietario::findOne($model->id_propietario)->nombre ?><?php //echo ' ' ?><?php //echo Propietario::findOne($model->id_propietario)->apellido ?>
        </h5>
<!--         <h3 class="operacion-view">
            <span class="label label-info">
                <?php //echo $model->operacion; ?>
            </span>
            <span class="label label-danger"> $ <?php //echo $model->valor; ?></span>
        </h3> -->

        <p><?php echo $model->descripcion; ?></p>
    </div>
</div>

<div class="col-md-4 panel panel-default panel-view wow bounceInUp" role="menu" data-wow-duration="0.8s" data-wow-delay="0.3s">
    <div class="panel-heading text-left">Datos Remate
        
    </div>
    <div class="panel-body admin">
        <div class="table-responsive ">
          <table class="table table-condensed table-info-inm-view">
            <tbody>    
                <tr>
                    <td><b>Nombre</b></td>
                    <td><?php echo $model->titulo; ?> </td>
                </tr>
                <tr>
                    <td><b>Dirección</b></td>
                    <td><?php echo $model->direccion; ?> </td>
                </tr>
                <tr>
                    <td><b>Estado</b></td>
                    <td><?php if($model->estado){
                            echo '<span class="label label-success">Activo</span>'; 
                        }else{
                            echo '<span class="label label-danger">Inactivo</span>';
                        }        
                        ?></td>
                </tr>
                
            </tbody>
          </table>
        </div>
    </div>
</div>