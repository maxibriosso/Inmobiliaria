<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Barrio;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RemateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Remates';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('.filters').toggle().hide();
$('.search-button').click(function(){
    $('.filters').toggle();
    return false;
});
");
?>
<div class="panel panel-default" role="menu" data-wow-duration="0.8s" data-wow-delay="0s">
      <div class="panel-heading text-left"><?= Html::encode($this->title) ?> 
        <a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a>
        <a href="<?= Url::to(['remate/create']) ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a>
      </div>

      <div class="panel-body admin">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary'=>"",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    ['attribute'=>'id_barrio',
                     'value'=> function($model){
                        $barrio = Barrio::findOne($model->id_barrio);
                        return $barrio->nombre;  
                    }, 
                    'filter'=> ArrayHelper::map(Barrio::find()->all(),'id','nombre'),
                        //'attribute' => 'id_barrio',
                        //'value' => 'idBarrio.nombre',
                    ],
                    'titulo',
                    //'descripcion:ntext',
                    //'ubicacion:ntext',
                    'estado',
                    [   'attribute'=>'fecha_creacion',
                        'format' =>  ['date', 'php:d-m-Y'],
                    ],
                    //['class' => 'yii\grid\ActionColumn'],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header'=>'Acciones',
                        //'headerOptions' => ['width' => '200'],
/*                        'template' => '{view} {update} {imagen} {delete}',
                        'buttons' => [
                            'imagen' => function ($url,$model,$key) {
                                    return Html::a('<span class="glyphicon glyphicon-picture"></span>', $url);
                            },
                        ],*/
                    ],

                ],
                'tableOptions' =>['class' => 'table'],

            ]); ?>
            <?php Pjax::end(); ?>
    </div>
</div>
