<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
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
        <a href="<?= Url::to(['usuario/create']) ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a>
      </div>

      <div class="panel-body admin usu-grid">
        <div class="table-responsive">
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
                'ci',
                'telefono',
                // 'email:email',
                // 'nick',
                // 'password',
                // 'fecha_nacimiento',
                [
                    'class' => '\pheme\grid\ToggleColumn',
                    'attribute' => 'estado',
                    // Uncomment if  you don't want AJAX
                    // 'enableAjax' => false,
                ], 
                // 'fecha_creacion',

                ['class' => 'yii\grid\ActionColumn'],
            ],
            'tableOptions' =>['class' => 'table'],
        ]); ?>
        <?php Pjax::end(); ?>
        </div>
    </div>
</div>