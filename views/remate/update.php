<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Remate */

$this->title = 'Update Remate: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Remates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="remate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
