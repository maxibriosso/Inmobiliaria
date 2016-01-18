<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use app\models\Barrio;
use app\models\Usuario;
use app\models\Propietario;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InmuebleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inmuebles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmueble-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inmueble', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'id_barrio',
            [
                'attribute'=>'id_barrio',
                'value'=> function($model){
                    $barrio = Barrio::findOne($model->id_barrio);
                    return $barrio->nombre;  
                }, 
                'filter'=> ArrayHelper::map(Barrio::find()->all(),'id','nombre'),
            ],
            //'id_usuario',
            [
                'attribute'=>'id_usuario',
                'value'=> function($model){
                    $usuario = Usuario::findOne($model->id_usuario);
                    return $usuario->nombre;  
                }, 
                'filter'=> ArrayHelper::map(Usuario::find()->all(),'id','nombre'),
            ],
            //'id_propietario',
            [
                'attribute'=>'id_propietario',
                'value'=> function($model){
                    $propietario = Propietario::findOne($model->id_propietario);
                    return $propietario->nombre;  
                }, 
                'filter'=> ArrayHelper::map(Propietario::find()->all(),'id','nombre'),
            ],
            'nombre',
            // 'valor',
            // 'estado',
            // 'direccion',
            // 'titulo',
            // 'descripcion:ntext',
            // 'amueblado',
            // 'garage',
            // 'jardin',
            // 'parrillero',
            // 'piso',
            // 'tipo',
            // 'prestamo_bancario',
            // 'cantidad_banios',
            // 'cantidad_habitaciones',
            // 'superficie',
            // 'coord:ntext',
            // 'operacion',
            // 'destacado',
            // 'favorito',
            // 'activo',
            // 'fecha_creacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
