<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Barrio;

/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inmuebles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmueble-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
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
    ]) ?>

</div>
