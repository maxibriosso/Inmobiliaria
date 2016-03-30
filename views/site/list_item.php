<?php
use app\models\Barrio;
?>
<div class="item  col-xs-4 col-lg-4">
    <div class="propertyItem">
        <div class="propertyContent">
            <a class="propertyType" href="#"><?php echo $model->operacion ?></a>
            <a href="#" class="propertyImgLink">
                <?php $img = $model->getImagendestacada() ?> 
                <img class="propertyImg" src="<?= Yii::$app->request->baseUrl . '/uploads/'.$img->ruta?>" alt="...">
            </a>
            <h4><a href="#"><?php echo $model->direccion ?></a></h4>
            <p><?php echo Barrio::findOne($model->id_barrio)->nombre ?></p>
            <div class="divider thin"></div>
            <p class="forSale"><?php echo $model->operacion ?></p>
            <p class="price">$<?php echo $model->valor ?></p>
        </div>
        <table border="1" class="propertyDetails">
            <tbody>
                <tr>
                    <td><i class="fa fa-arrows-alt" style="margin-right:7px;"></i><?php echo $model->superficie ?>m2</td>
                    <td><i class="fa fa-bed" style="margin-right:7px;"></i><?php echo $model->cantidad_habitaciones ?> Hab.</td>
                    <td><i class="fa fa-tint" style="margin-right:7px;"></i><?php echo $model->cantidad_banios ?> Baños</td>
                </tr>
            </tbody>
        </table> 
    </div>
</div>

                