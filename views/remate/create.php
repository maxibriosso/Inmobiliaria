<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Remate */

$this->title = 'Create Remate';
$this->params['breadcrumbs'][] = ['label' => 'Remates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
