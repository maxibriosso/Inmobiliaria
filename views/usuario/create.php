<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Nuevo Usuario';
$title2 = 'Crear';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $title2;
?>
<div class="panel panel-default wow bounceInUp" role="menu" data-wow-duration="0.8s" data-wow-delay="0s">
      <div class="panel-heading text-left"><?= Html::encode($this->title) ?>
        <a href="<?= Url::to(['usuario/index']) ?>" class="btn-link btn-sm"><i class="fa fa-list"></i></a>
      </div>
      <div class="panel-body admin">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
      </div>
</div>

