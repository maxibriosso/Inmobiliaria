<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Barrio */

$this->title = 'Modificar: ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Barrios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="barrio-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
