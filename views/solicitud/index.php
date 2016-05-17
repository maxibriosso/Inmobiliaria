<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitud';
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
                    'nombre',
                    'telefono',
                    'email',
                    'tipo',
                    [   'attribute'=>'fecha_creacion',
                        'format' =>  ['date', 'php:d-m-Y'],
                    ],
                    //['class' => 'yii\grid\ActionColumn'],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header'=>'Acciones',
                        'template' => '{view}{delete}',
                    ],

                ],
                'tableOptions' =>['class' => 'table'],

            ]); ?>
            <?php Pjax::end(); ?>
    </div>
</div>
