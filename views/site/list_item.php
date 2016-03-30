   
<div class="item  col-xs-4 col-lg-4">
    <div class="thumbnail">
        <?php $img = $model->getImagendestacada() ?>
        <img class="group list-group-image" src="<?= Yii::$app->request->baseUrl . '/uploads/'.$img->ruta?>" alt="...">
        <div class="caption">
            <h4 class="group inner list-group-item-heading">
                <?=  $model->titulo ?></h4>
            <p class="group inner list-group-item-text">
                <?=  $model->descripcion ?></p>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <p class="lead">
                        $<?=  $model->valor ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

                