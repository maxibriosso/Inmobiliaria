<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RemateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Remates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Remate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_barrio',
            'titulo',
            'descripcion:ntext',
            'ubicacion:ntext',
            // 'estado',
            // 'fecha_creacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
