<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="contenedor-site-error">
    <div class="container">
        <div class="row site-error text-center">
            <div class="col-md-4 error-img">
                <h1>OOPS!</h1>
                <img src="<?= Yii::$app->request->baseUrl . '/img/carita2.png' ?>" class="img-responsive" alt="">
            </div>
            <div class="col-md-8 error-text">
                <h2><?= Html::encode($this->title) ?></h2>

                <div class="">
                    <h4><?= nl2br(Html::encode($message)) ?></h4>
                </div>
                <hr>
                <p>
                    The above error occurred while the Web server was processing your request.
                </p>
                <p>
                    Please contact us if you think this is a server error. Thank you.
                </p>
            </div>
        </div>
    </div>
</div>
