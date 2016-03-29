<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Barrio */

$this->title = 'Crear';
$this->params['breadcrumbs'][] = ['label' => 'Barrios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barrio-create">

<!--     <h3><?= Html::encode($this->title) ?></h3> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
