<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PropietarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Propietarios';
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
        <a href="<?= Url::to(['propietario/create']) ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a>
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
                'apellido',
                'telefono',
                'email:email',
                'ci',
                // 'estado',
                // 'fecha_creacion',

                ['class' => 'yii\grid\ActionColumn'],
            ],
            'tableOptions' =>['class' => 'table'],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
