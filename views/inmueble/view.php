<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Barrio;
use app\models\Propietario;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Inmuebles', 'url' => ['index']];
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
                'confirm' => 'Seguro que desea eliminar este inmueble?',
                'method' => 'post',
            ],
        ]) ?>
        </p>
        <h3>
            <?php echo $model->tipo; ?> - <?php echo $model->nombre; ?> 
        </h3>
        <h5>
            <?php echo $model->direccion; ?> / <?php echo Propietario::findOne($model->id_propietario)->nombre ?><?php echo ' ' ?><?php echo Propietario::findOne($model->id_propietario)->apellido ?>
        </h5>
        <h3 class="operacion-view">
            <span class="label label-info">
                <?php echo $model->operacion; ?>
            </span>
            <span class="label label-danger"> $ <?php echo $model->valor; ?></span>
        </h3>

        <p><?php echo $model->descripcion; ?></p>
        <div class="table-responsive ">
          <table class="table table-condensed table-accs-inm-view">
            <tbody>
                <tr>
                    <td><?php if($model->amueblado){
                            echo '<i class="fa fa-check-circle-o"></i>'; 
                        }else{
                            echo '<i class="fa fa-times-circle-o"></i>';
                        }        
                        ?> 
                    </td>
                    <td>Amueblado</td>
                    <td><?php if($model->garage){
                            echo '<i class="fa fa-check-circle-o"></i>'; 
                        }else{
                            echo '<i class="fa fa-times-circle-o"></i>';
                        }        
                        ?> 
                    </td>
                    <td>Garage</td>
                    <td><?php if($model->jardin){
                            echo '<i class="fa fa-check-circle-o"></i>'; 
                        }else{
                            echo '<i class="fa fa-times-circle-o"></i>';
                        }        
                        ?> 
                    </td>
                    <td>Jardín</td>
                </tr>
                <tr>
                    <td><?php if($model->parrillero){
                            echo '<i class="fa fa-check-circle-o"></i>'; 
                        }else{
                            echo '<i class="fa fa-times-circle-o"></i>';
                        }        
                        ?> 
                    </td>
                    <td>Parrillero</td>
                    <td><?php if($model->prestamo_bancario){
                            echo '<i class="fa fa-check-circle-o"></i>'; 
                        }else{
                            echo '<i class="fa fa-times-circle-o"></i>';
                        }        
                        ?> 
                    </td>
                    <td>Prestamo</td>
                </tr>
             </tbody>
          </table>
        </div>
    </div>
</div>

<div class="col-md-4 panel panel-default panel-view wow bounceInUp" role="menu" data-wow-duration="0.8s" data-wow-delay="0.3s">
    <div class="panel-heading text-left">Datos Inmueble
        
    </div>
    <div class="panel-body admin">
        <div class="table-responsive ">
          <table class="table table-condensed table-info-inm-view">
            <tbody>    
                <tr>
                    <td><b>Nombre</b></td>
                    <td><?php echo $model->nombre; ?> </td>
                </tr>
                <tr>
                    <td><b>Tipo</b></td>
                    <td><?php echo $model->tipo; ?> </td>
                </tr>
                <tr>
                    <td><b>Operación</b></td>
                    <td><?php echo $model->operacion; ?> </td>
                </tr>
                <tr>
                    <td><b>Dirección</b></td>
                    <td><?php echo $model->direccion; ?> </td>
                </tr>
                <tr>
                    <td><b>Superficie</b></td>
                    <td><?php echo $model->superficie; ?> m2 </td>
                </tr>
                <tr>
                    <td><b>Pisos</b></td>
                    <td><?php echo $model->piso; ?> </td>
                </tr>
                <tr>
                    <td><b>Habitaciones</b></td>
                    <td><?php echo $model->cantidad_habitaciones; ?> </td>
                </tr>
                <tr>
                    <td><b>Baños</b></td>
                    <td><?php echo $model->cantidad_banios; ?> </td>
                </tr>
                <tr>
                    <td><b>Estado</b></td>
                    <td><?php if($model->activo){
                            echo 'Si'; 
                        }else{
                            echo 'No';
                        }        
                        ?></td>
                </tr>
                
            </tbody>
          </table>
        </div>
    </div>
</div>


    <?php /*DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'id_barrio',
             [
                'attribute'=>'id_barrio',
                'value'=> Barrio::findOne($model->id_barrio)->nombre     
            ],
            'id_usuario',
            'id_propietario',
            'nombre',
            'valor',
            'estado',
            'direccion',
            'titulo',
            'descripcion:ntext',
            'amueblado',
            'garage',
            'jardin',
            'parrillero',
            'piso',
            'tipo',
            'prestamo_bancario',
            'cantidad_banios',
            'cantidad_habitaciones',
            'superficie',
            'coord:ntext',
            'operacion',
            'destacado',
            'favorito',
            'activo',
            'fecha_creacion',
        ],
    ]) */?>


