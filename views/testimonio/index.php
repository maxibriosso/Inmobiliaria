<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TestimonioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testimonios';
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
        <a href="<?= Url::to(['testimonio/create']) ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a>
      </div>

      <div class="panel-body admin test-grid">
        <div class="table-responsive">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary'=>"",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'titulo',
                    array(
                    'format' => 'image',
                    'value'=>function($model) { return $model->imageurl; },
                    ),
                    //'ruta',
                    [
                        'class' => '\pheme\grid\ToggleColumn',
                        'attribute' => 'estado',
                    ], 
                    [   'attribute'=>'fecha_creacion',
                        'format' =>  ['date', 'php:d-m-Y'],
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update}{delete} ',
                        'header'=>'Acciones',
                    ],

                ],
                'tableOptions' =>['class' => 'table'],

            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
