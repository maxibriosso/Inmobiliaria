<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Imagen_remateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Imagen Remates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagen-remate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Imagen Remate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_imagen',
            'nombre',
            'ruta:ntext',
            'destacada',
            // 'estado',
            // 'fecha_creacioin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
