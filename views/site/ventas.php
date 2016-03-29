<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container" style="margin-top: 30px;">
    <div class="well well-sm">
        <strong>Display</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    </div>
    <div id="products" class="row list-group">
        <?php foreach ($inmuebles as $d): ?>
            <div class="item  col-xs-4 col-lg-4">
                <div class="thumbnail">
                    <?php $img = $d->getImagendestacada() ?>
                    <img class="group list-group-image" src="<?= Yii::$app->request->baseUrl . '/uploads/'.$img->ruta?>" alt="...">
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            <?=  $d->titulo ?></h4>
                        <p class="group inner list-group-item-text">
                            <?=  $d->descripcion ?></p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                    $<?=  $d->valor ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?> 
    </div>
</div>