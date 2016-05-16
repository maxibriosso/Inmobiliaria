<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Parametro */


$this->title = 'Modificar Parametro: ' . ' ' . $model->nombre;

$this->params['breadcrumbs'][] = ['label' => 'Parametros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>

<div class="panel panel-default wow bounceInUp" role="menu" data-wow-duration="0.8s" data-wow-delay="0s">
      <div class="panel-heading text-left"><?= Html::encode($this->title) ?>
        <a href="<?= Url::to(['parametro/index']) ?>" class="btn-link btn-sm"><i class="fa fa-list"></i></a>
      </div>

      <div class="panel-body admin">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>