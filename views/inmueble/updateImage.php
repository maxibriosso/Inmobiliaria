<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */

$this->title = 'Modificar Imagenes: ' . 'Inmueble ' . $id;
$this->params['breadcrumbs'][] = ['label' => 'Inmuebles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $id, 'url' => ['view', 'id' => $id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="imagenes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formImagenModificar', [
        'imagenes' => $imagenes,
        'model' => $model,
        'id'=> $id,
        'previewconf' => $previewconf,
        'descripcion' => $descripcion,
        'destacada' => $destacada,
    ]) ?>

</div>