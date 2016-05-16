<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Departamento;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CiudadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ciudades';
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
        <a href="#" class="btn-link btn-sm search-button" id="activity-index-link" data-toggle="model" data-target="#modal" data-url=""><i class="fa fa-search"></i></a>
        <?= Html::a('<i class="fa fa-plus"></i>', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn-link btn-sm',
            'title' => Yii::t('app', 'Crear Ciudad'),
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create']),
            'data-pjax' => '0',
        ]); ?>
      </div>

      <div class="panel-body admin">
        <?php Pjax::begin(['id'=>'ciudad-grid']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'summary'=>"",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                //'id_departamento',
                [
                    'attribute'=>'id_departamento',
                    'value'=> function($model){
                        $dep = Departamento::findOne($model->id_departamento);
                        return $dep->nombre;  
                    }, 
                    'filter'=> ArrayHelper::map(Departamento::find()->all(),'id','nombre'),
                        //'attribute' => 'id_barrio',
                        //'value' => 'idBarrio.nombre',
                ],
                'nombre',
                [
                    'class' => '\pheme\grid\ToggleColumn',
                    'attribute' => 'estado',
                    // Uncomment if  you don't want AJAX
                    // 'enableAjax' => false,
                ], 
                [   'attribute'=>'fecha_creacion',
                    'format' =>  ['date', 'php:d-m-Y'],
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'update' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                'id' => 'activity-index-link',
                                'title' => Yii::t('app', 'Modificar Ciudad'),
                                'data-toggle' => 'modal',
                                'data-target' => '#modal',
                                'data-url' => Url::to(['update', 'id' => $model->id]),
                                'data-pjax' => '0',
                            ]);
                        },
                    ]
                ],
            ],
            'tableOptions' =>['class' => 'table'],
            ]); ?>
            <?php Pjax::end(); ?>
    </div>
</div>

<?php

$this->registerJs(
    "$(document).on('click', '#activity-index-link', (function() {
        var titulo=$(this).attr('title');
        $.ajax({
            url: $(this).data('url'),
            async: false,
            type : 'get',
            success: function (data) {
                $('.modalContent').html(data);
                $('.modal-header').html('<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"modal\" type=\"button\">×</button><h2>'+ titulo + '</h2>');
                $('#modal').modal();
            },
            
        });
    }));"
);


Modal::begin([
    'id' => 'modal',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
    //'header' => '<h2 class="modal-title">'.$this->title.'</h2>',
    //'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
]);
 
echo "<div class='modalContent'></div>";
 
Modal::end();



?>
