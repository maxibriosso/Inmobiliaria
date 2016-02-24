<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Imagen_remate */

$this->title = 'Update Imagen Remate: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Imagen Remates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="imagen-remate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
