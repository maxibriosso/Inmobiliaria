<?php
use app\models\Barrio;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\i18n\yii\helpers\FormatConverter;
?>
<div class="item col-xs-12 col-sm-6 col-md-4 col-lg-4 grid-group-item">
    <div class="propertyItem">
        <div class="propertyContent">
            <a class="propertyType" href="<?= Url::to(['site/detalle','id' => $model->id]) ?>"><?php echo $model->operacion ?></a>
            <a href="<?= Url::to(['site/detalle','id' => $model->id]) ?>" class="propertyImgLink">
                <?php 
                    if (is_null($model->getImagendestacada())){
                        $session = Yii::$app->session;
                        $img_pred = $session->get('img_pred');
                ?>
                <img class="propertyImg" src="<?= Yii::$app->request->baseUrl . '/parametros/'.$img_pred ?>" alt="...">
                <?php 
                    }else{
                        $img = $model->getImagendestacada();
                ?>
                <img class="propertyImg" src="<?= Yii::$app->request->baseUrl . '/uploads/'.$img->ruta?>" alt="...">
                <?php }  ?> 
                
            </a>
            <div class="grid-items">
                <h4><a href="#"><?php echo $model->direccion ?></a></h4>
                <p><?php echo Barrio::findOne($model->id_barrio)->nombre ?></p>
                <p class="list-descripcion"><?php echo $model->getSubString() ?></p>
                <div class="divider thin"></div>
                <p class="forSale"><?php echo $model->operacion ?></p>
                <p class="price">$<?php echo Yii::$app->formatter->asDecimal($model->valor,2) ?></p>
            </div>
            <div class="grid-items-caracteristicas">
                <table border="1" class="propertyDetailsCar">
                  <tbody>
                    <tr>
                        <td>
                            <span><small><?php echo $model->piso ?></small><i class="flaticon-stairs-1" style="margin-right:7px;display: inline-block !important;"></i></span>
                        </td>
                        <td>
                            <?php 
                                if($model->amueblado){
                                    echo '<i class="flaticon-bedroom-black-closed-closet-for-clothes" style="margin-right:7px;"></i>';
                                }
                                else{ 
                                    echo '<i class="flaticon-bedroom-black-closed-closet-for-clothes color-disable" style="margin-right:7px;"></i>';
                                } 
                            ?>
                        </td>
                        <td>
                            <?php 
                                if($model->jardin){
                                    echo '<i class="flaticon-plant-on-a-hand" style="margin-right:7px;"></i>';
                                }
                                else{ 
                                    echo '<i class="flaticon-plant-on-a-hand color-disable" style="margin-right:7px;"></i>';
                                } 
                            ?>
                        </td>
                        <td>
                            <?php 
                                if($model->parrillero){
                                    echo '<i class="flaticon-grill" style="margin-right:7px;"></i>';
                                }
                                else{ 
                                    echo '<i class="flaticon-grill color-disable" style="margin-right:7px;"></i>';
                                } 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                if($model->garage){
                                    echo '<i class="flaticon-car-in-garage" style="margin-right:7px;"></i>';
                                }
                                else{ 
                                    echo '<i class="flaticon-car-in-garage color-disable" style="margin-right:7px;"></i>';
                                } 
                            ?>
                        </td>
                        <td>
                            <?php 
                                if($model->prestamo_bancario){
                                    echo '<i class="flaticon-give-money" style="margin-right:7px;"></i>';
                                }
                                else{ 
                                    echo '<i class="flaticon-give-money color-disable" style="margin-right:7px;"></i>';
                            } ?>
                            
                        </td>
                    </tr>
                  </tbody>
                </table>
            </div>
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

                