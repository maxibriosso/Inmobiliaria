<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TestimonioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testimonios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Testimonio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo',
            'descripcion:ntext',
            'ruta',
            'estado',
            // 'fecha_creacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
