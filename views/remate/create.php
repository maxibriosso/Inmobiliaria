<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Remate */

$this->title = 'Nuevo Remate';
$title2 = 'Crear';
$this->params['breadcrumbs'][] = ['label' => 'Remates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $title2;
?>
<div class="panel panel-default wow bounceInUp" role="menu" data-wow-duration="0.8s" data-wow-delay="0s">
      <div class="panel-heading text-left"><?= Html::encode($this->title) ?>
        <a href="<?= Url::to(['remate/index']) ?>" class="btn-link btn-sm"><i class="fa fa-list"></i></a>
      </div>
      <div class="panel-body admin">
        <?= $this->render('_form', [
            'model' => $model,
            'imagen'=> $imagen,
            'imagenes' => $imagenes,
        	  'previewconf' => $previewconf,
        ]) ?>
      </div>
</div>
