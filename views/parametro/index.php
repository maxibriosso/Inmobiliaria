<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Usuario;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParametroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parametros';
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
        <a href="<?= Url::to(['parametro/create']) ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a>
      </div>

      <div class="panel-body admin test-grid">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary'=>"",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute'=>'id_usuario',
                        'value'=> function($model){
                            $usu = Usuario::findOne($model->id_usuario);
                            return $usu->nombre;  
                        }, 
                        'filter'=> ArrayHelper::map(Usuario::find()->all(),'id','nombre'),
                            //'attribute' => 'id_barrio',
                            //'value' => 'idBarrio.nombre',
                    ],
                    'nombre',
                    'tipo',
                    'valor',
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
