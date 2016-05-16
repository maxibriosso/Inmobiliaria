<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Departamento */

$this->title = 'Create Departamento';
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamento-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
