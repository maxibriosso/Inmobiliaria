<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */

$this->title = 'Alta Imagenes';
$this->params['breadcrumbs'][] = ['label' => 'Inmuebles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formImagen', [
        'model' => $model,
        'id' => $id,
    ]) ?>

</div>