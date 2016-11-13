<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;
use app\models\Barrio;
use app\models\Ciudad;
use yii\widgets\Pjax;

$this->title = 'Detalle Inmueble';
$this->params['breadcrumbs'][] = $this->title;

$baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
$this->registerJsFile($baseUrl.'/js/localizacionMapaDetalle.js');
?>

<section class="contenedor-img-detalle">
    <h1><?= Html::encode($this->title) ?></h1>  
</section>
<div class="contenido-detalle">
    <div class="container cont-items-detalle">
      <div class="row">
        <div class="col-md-8">
            <div class="col-md-12">
              <span class="titulo-detalle">
                <h1><?php echo $model->direccion ?>
                <?php $cd=Barrio::findOne($model->id_barrio); ?>
                <small><?php echo Barrio::findOne($model->id_barrio)->nombre ?> , <?php echo Ciudad::findOne($cd->id_ciudad)->nombre ?></small></h1>
                <a href="#" class="btn btn-default text-right btn-print" onclick="imprimir();"><i class="fa fa-print"></i></a>
              </span>
            </div>
            <div class="col-md-12 tabla-info">

              <div class="property-topinfo">
                <ul class="amenities">
                  <li><?php if($model->tipo<>'Apartamento'){ ?>
                          <i class="fa fa-home" style="margin-right:7px;"></i>
                        <?php }else{ ?>
                          <i class="fa fa-building" style="margin-right:7px;"></i>
                        <?php } ?> <?php echo $model->tipo ?></li>
                  <li><i class="" style="margin-right:7px;"></i> <?php echo $model->estado ?></li>
                  <li><i class="fa fa-tag" style="margin-right:7px;"></i> <?php echo $model->operacion ?></li>
                </ul>
                
                <div id="property-id">$ <?php echo Yii::$app->formatter->asDecimal($model->valor,2) ?></div>
              </div>
            </div>

            <div class="col-md-12 gallery">
                <ul class="bxslider">
                    <?php 
                        $imagenes=$model->getImagenes();
                        if (is_null($imagenes) || count($imagenes)==0){
                              $session = Yii::$app->session;
                              $img_pred = $session->get('img_pred');
                        ?>
                            <li><img class="" src="<?= Yii::$app->request->baseUrl . '/parametros/'.$img_pred ?>" alt=""></li>
                        <?php 
                        }else{
                            foreach ($imagenes as $d):  
                        ?>
                        <li><img class="" src="<?= Yii::$app->request->baseUrl . '/uploads/'.$d->ruta?>" alt=""></li>
                    <?php  endforeach; } ?>  
                </ul>

                <div id="bx-pager">
                    <?php       
                        if (is_null($imagenes)){
                              $session = Yii::$app->session;
                              $img_pred = $session->get('img_pred');
                        ?>
                            <a data-slide-index="0" href=""><img class="" src="<?= Yii::$app->request->baseUrl . '/parametros/'.$img_pred ?>" alt=""></a>
                        <?php 
                        }else{
                            $contador=0;
                            foreach ($imagenes as $d):  
                        ?>
                        <a data-slide-index="<?= $contador; ?>" href=""><img class="" src="<?= Yii::$app->request->baseUrl . '/uploads/'.$d->ruta?>" alt=""></a>
                    <?php $contador++; endforeach; } ?> 
                </div>
            </div>   
            <div class="col-md-12">
              <span class="titulo-detalle-bis">
                <h1>Caracteristicas</h1>
              </span>
              <table border="1" class="propertyDetailsb">
                  <tbody>
                    <tr>
                      <td><i class="flaticon-stairs-1" style="margin-right:7px;"></i><br><span class="t_icon">Pisos</span><br><hr><span><?php echo $model->piso ?></span></td>
                      <td><i class="flaticon-technology" style="margin-right:7px;"></i><br><span class="t_icon">Área</span><br><hr><span><?php echo $model->superficie ?> m2</span></td>
                      <td><i class="flaticon-rest" style="margin-right:7px;"></i><br><span class="t_icon">Habitaciones</span><br><hr><span><?php echo $model->cantidad_habitaciones ?></span></td>
                      <td><i class="flaticon-bathroom" style="margin-right:7px;"></i><br><span class="t_icon">Baños</span><br><hr><span><?php echo $model->cantidad_banios ?></span></td>
                      <td><i class="flaticon-bedroom-black-closed-closet-for-clothes" style="margin-right:7px;"></i><br><span class="t_icon">Amueblado</span><br><hr>
                        <span><?php if($model->amueblado){
                            echo "Si";
                          }else{ echo "No";} ?></span>
                      </td>
                    </tr>
                  </tbody>
              </table>
              <table border="1" class="propertyDetailsb">
                  <tbody>
                    <tr>
                      <td><i class="flaticon-plant-on-a-hand" style="margin-right:7px;"></i><br><span class="t_icon">Jardin</span><br><hr><span><?php if($model->jardin){
                            echo "Si";
                          }else{ echo "No";} ?></span></td>
                      <td><i class="flaticon-grill" style="margin-right:7px;"></i><br><span class="t_icon">Parrillero</span><br><hr><span><?php if($model->parrillero){
                            echo "Si";
                          }else{ echo "No";} ?></span></td>
                      <td><i class="flaticon-car-in-garage" style="margin-right:7px;"></i><br><span class="t_icon">Garage</span><br><hr><span><?php if($model->garage){
                            echo "Si";
                          }else{ echo "No";} ?></span></td>
                      <td><i class="flaticon-give-money" style="margin-right:7px;"></i><br><span class="t_icon">Prestamos Bancario</span><br><hr><span><?php if($model->prestamo_bancario){
                            echo "Si";
                          }else{ echo "No";} ?></span></td>
                      <td><i class="fa fa-calendar" style="margin-right:7px;"></i><br><span class="t_icon">Fecha</span><br><hr><span><?php echo Yii::$app->formatter->asDate($model->fecha_creacion,'dd/MM/yyyy') ?></span></td>
                    </tr>
                  </tbody>
              </table>
            </div>

            <div class="col-md-12 descrip-detalle">
              <span class="titulo-detalle-bis">
                <h1>Descripción</h1>
              </span>
              <p><?php echo $model->descripcion ?></p>
              
            </div>
        </div>
        <div class="col-md-4 cont-buscador-ventas-detalle">
          <div class="row">
            <div class="col-md-12 buscador-ventas-detalle">
              <?php Pjax::begin(['id' => 'forminmuebles']) ?>
                  <?php $form = ActiveForm::begin([
                    'method' => 'get',
                    'options'=>['class'=>'ventas-form','data-pjax' => true]
                  ]); ?>

                     <div class="form-group form-select">
                         <?= $form->field($searchModel, 'tipo')->dropDownList([ 'Casa' => 'Casa', 'Apartamento' => 'Apartamento', 'Local' => 'Local', 'Terreno' => 'Terreno', 'Oficina' => 'Oficina', ], ['prompt' => 'TIPO PROPIEDAD','class'=>'form-input'])->label('  '); ?>
                     </div>
                     <div class="form-group form-select">
                         <?= $form->field($searchModel, 'cantidad_habitaciones')->dropDownList([ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], ['prompt' => 'HABITACIONES','class'=>'form-input'])->label('  '); ?>
                     </div>
                     <div class="form-group form-select">
                        <?= $form->field($searchModel, 'cantidad_banios')->dropDownList([ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], ['prompt' => 'BAÑOS','class'=>'form-input'])->label('  '); ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($searchModel, 'precio_min')->textInput(array('placeholder' => 'PRECIO MIN','class'=>'form-input'))->label('  '); ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($searchModel, 'precio_max')->textInput(array('placeholder' => 'PRECIO MAX','class'=>'form-input'))->label('  '); ?>
                    </div>
                    <div class="form-group cont-btn-form">     
                      <?= Html::submitButton('BUSCAR', ['class' => 'btn btn-default  btn-busc-lat']) ?>
                    </div>
                  <?php ActiveForm::end(); ?>
              <?php Pjax::end() ?>
            </div>
            <!--<div class="col-md-12">
              <span class="titulo-detalle-bis">
                <h1>Caracteristicas</h1>
              </span>
              <table border="1" class="propertyDetailsb">
                  <tbody>
                    <tr>
                      <td><i class="flaticon-stairs-1" style="margin-right:7px;"></i><br><span class="t_icon">Pisos</span><br><hr><span><?php echo $model->piso ?></span></td>
                      <td><i class="flaticon-technology" style="margin-right:7px;"></i><br><span class="t_icon">Área</span><br><hr><span><?php echo $model->superficie ?> m2</span></td>
                      
                    </tr>
                  </tbody>
              </table>
              <table border="1" class="propertyDetailsb">
                  <tbody>
                    <tr>
                      <td><i class="flaticon-rest" style="margin-right:7px;"></i><br><span class="t_icon">Habitaciones</span><br><hr><span><?php echo $model->cantidad_habitaciones ?></span></td>
                      <td><i class="flaticon-bathroom" style="margin-right:7px;"></i><br><span class="t_icon">Baños</span><br><hr><span><?php echo $model->cantidad_banios ?></span></td>
                      
                    </tr>
                  </tbody>
              </table>
              <table border="1" class="propertyDetailsb">
                  <tbody>
                    <tr>
                      <td><i class="flaticon-bedroom-black-closed-closet-for-clothes" style="margin-right:7px;"></i><br><span class="t_icon">Amueblado</span><br><hr>
                        <span><?php #if($model->amueblado){
                            #echo "Si";
                          #}else{ echo "No";} ?></span>
                      </td>
                      <td><i class="flaticon-plant-on-a-hand" style="margin-right:7px;"></i><br><span class="t_icon">Jardin</span><br><hr><span><?php #if($model->jardin){
                            #echo "Si";
                          #}else{ echo "No";} ?></span></td>
                      
                    </tr>
                  </tbody>
              </table>
              <table border="1" class="propertyDetailsb">
                  <tbody>
                    <tr>
                      
                      <td><i class="flaticon-grill" style="margin-right:7px;"></i><br><span class="t_icon">Parrillero</span><br><hr><span><?php #if($model->parrillero){
                            #echo "Si";
                          #}else{ echo "No";} ?></span></td>
                      <td><i class="flaticon-car-in-garage" style="margin-right:7px;"></i><br><span class="t_icon">Garage</span><br><hr><span><?php #if($model->garage){
                            #echo "Si";
                          #}else{ echo "No";} ?></span></td>
                    </tr>
                  </tbody>
              </table>
              <table border="1" class="propertyDetailsb">
                  <tbody>
                    <tr>

                      <td><i class="flaticon-give-money" style="margin-right:7px;"></i><br><span class="t_icon">Prestamos Bancario</span><br><hr><span><?php #if($model->prestamo_bancario){
                            #echo "Si";
                          #}else{ echo "No";} ?></span></td>
                      <td><i class="fa fa-calendar" style="margin-right:7px;"></i><br><span class="t_icon">Fecha</span><br><hr><span><?php #echo Yii::$app->formatter->asDate($model->fecha_creacion,'dd-MM-yyyy') ?></span></td>
                    </tr>
                  </tbody>
              </table>
            </div>-->
           <!-- <div class="col-md-12 caracteristicas-detalle">
              <ul class="property-amenities-list col-md-6">
                <li class="enabled"><i class=""></i> Security System </li>
                <li class="enabled"> Parking On Street </li>
                <li class="enabled"> Garage </li>
                <li class="enabled"> Internet </li>
                <li class="enabled"> Telephone </li>
                <li class="disabled"> Alarm Clock </li>
                <li class="disabled"> Water Cooler </li>
                <li class="enabled"> Air Conditioning </li>
                <li class="enabled"> Heating </li>
              </ul>
              <ul class="property-amenities-list col-md-6">
                <li class="enabled"> Security System </li>
                <li class="enabled"> Parking On Street </li>
                <li class="enabled"> Garage </li>
                <li class="enabled"> Internet </li>
                <li class="enabled"> Telephone </li>
                <li class="disabled"> Alarm Clock </li>
                <li class="disabled"> Water Cooler </li>
                <li class="enabled"> Air Conditioning </li>
                <li class="enabled"> Heating </li>
              </ul>
            </div>-->
          </div>
        </div>
      </div>
    </div>
    <div class="row cont-map-detalle">
      <div id="map_detalle" data-coord="<?php echo $model->coord ?>" class="col-md-12"></div>
    </div>
</div>

<script type="text/javascript">
function imprimir(){
    window.print();
}
</script>
