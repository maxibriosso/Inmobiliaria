<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */

$this->title = 'Create Ciudad';
$this->params['breadcrumbs'][] = ['label' => 'Ciudads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudad-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
