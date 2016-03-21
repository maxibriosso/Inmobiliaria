<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Barrio;
use app\models\Usuario;
use app\models\Propietario;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InmuebleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inmuebles';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="panel panel-default" role="menu" data-wow-duration="0.8s" data-wow-delay="0s">
      <div class="panel-heading text-left"><?= Html::encode($this->title) ?>
        <a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a>
        <a href="<?= Url::to(['inmueble/create']) ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a>
      </div>

      <div class="panel-body admin">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary'=>"",
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

                [   'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {updateimage} {delete} ',
                    'buttons' => [
                        'updateimage' => function ($url,$model,$key) {
                                return Html::a('<span class="glyphicon glyphicon-picture"></span>', $url);
                        },
                    ],
                ],

            ],
            'tableOptions' =>['class' => 'table'],
        ]); ?>

    </div>
</div>