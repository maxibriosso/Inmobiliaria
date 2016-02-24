<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Imagen_remate */

$this->title = 'Create Imagen Remate';
$this->params['breadcrumbs'][] = ['label' => 'Imagen Remates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagen-remate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
