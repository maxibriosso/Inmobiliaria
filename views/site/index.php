<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Barrio;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
if(Yii::$app->user->isGuest){ 
?>
    <section class="contenido-principal-index">
      <section id="content_top">
        <!-- STart sequence Slider  -->
        <div id="sequence">
          <a href="#" class="sequence-prev">Prev</a>
          <a href="#" class="sequence-next">Next</a>
          <ul class="sequence-canvas unstyled">
            <?php foreach ($pre as $p): ?>
            <li class="animate-in ">
              <div class="start_anime">
                <img src="<?= Yii::$app->request->baseUrl . '/uploads/'.$p->ruta?>" class="bg_slider" alt="preview"/>
                <div class="box_area_slider">
                  <div class="panel" >
                    <h2 class="title"><small><?php echo $p->titulo ?></small></h2>
                    <div class="description">
                      <p><?php echo $p->descripcion ?></p>
                    </div>
                   <img src="<?= Yii::$app->request->baseUrl . '/img/casa.png'?>" class="img_sllider" alt="preview">
                  </div>
                </div>
              </div>
            </li>
            <?php endforeach; ?>

          </ul>
        </div><!-- End sequence Slider  -->
      </section><!-- End section content page -->
        

    </section>
    
    <!-- BUSCADOR -->
    <section class="contenedor-buscador">
       <div class="container buscador">
          <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options'=>['class'=>'form-inline form-buscador']
                
            ]); ?>

             <div class="form-group form-select">
               <?= $form->field($buscador, 'operacion')->dropDownList([ 'Venta' => 'VENTA', 'Alquiler' => 'ALQUILER', ], ['prompt' => 'OPERACION','class'=>'form-input'])->label('  '); ?>
             </div>
             <div class="form-group form-select">
                 <?= $form->field($buscador, 'tipo')->dropDownList([ 'Casa' => 'Casa', 'Apartamento' => 'Apartamento', 'Local' => 'Local', 'Terreno' => 'Terreno', 'Oficina' => 'Oficina', ], ['prompt' => 'TIPO PROPIEDAD','class'=>'form-input'])->label('  '); ?>
             </div>
             <div class="form-group form-select">
                 <?= $form->field($buscador, 'cantidad_habitaciones')->dropDownList([ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], ['prompt' => 'HABITACIONES','class'=>'form-input'])->label('  '); ?>
             </div>
             <div class="form-group form-select">
                <?= $form->field($buscador, 'cantidad_banios')->dropDownList([ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], ['prompt' => 'BAÑOS','class'=>'form-input'])->label('  '); ?>
            </div>
            <div class="form-group">
                <?= $form->field($buscador, 'precio_min')->textInput(array('placeholder' => 'PRECIO MIN','class'=>'form-input'))->label('  '); ?>
            </div>
            <div class="form-group">
                <?= $form->field($buscador, 'precio_max')->textInput(array('placeholder' => 'PRECIO MAX','class'=>'form-input'))->label('  '); ?>
            </div>     
            <div class="form-group cont-btn-busc-index">
              <?= Html::submitButton('<i class="fa fa-search fa-lg"></i>', ['class' => 'btn btn-default btn-form-buscar']) ?>
            </div>
          <?php ActiveForm::end(); ?>
       </div>

    </section>
    
    <!-- FRASE -->
    <section class="bigMessage">
        <div class="container">
            <h1>Fácil, Rápido &amp; <span>Esequible</span></h1>
            <br>
            <p>Hacemos su vida más fácil y así es como lo hacemos</p>
        </div>
    </section>  
    
    <!-- INMUEBLES DESTACADOS -->
    <section class="contenedor-inm-favoritos">
      <div class="titulo-index">           
        <h3 class="text-center">PROPIEDADES DESTACADAS</h3>
      </div>
      <div class="container">
          <div id="owl-demo" class="owl-carousel owl-theme">
          <?php foreach ($des as $d): ?>
                <div class="propertyItem">
                    <div class="propertyContent">
                        <a class="propertyType" href="<?= Url::to(['site/detalle','id' => $d->id]) ?>"><?php echo $d->operacion ?></a>
                        <a href="<?= Url::to(['site/detalle','id' => $d->id]) ?>" class="propertyImgLink">
                          <?php 
                              if (is_null($d->getImagendestacada())){
                                  $session = Yii::$app->session;
                                  $img_pred = $session->get('img_pred');
                          ?>
                          <img class="propertyImg" src="<?= Yii::$app->request->baseUrl . '/parametros/'.$img_pred ?>" alt="...">
                          <?php 
                              }else{
                                  $img = $d->getImagendestacada();
                          ?>
                          <img class="propertyImg" src="<?= Yii::$app->request->baseUrl . '/uploads/'.$img->ruta?>" alt="...">
                          <?php }  ?> 
                        </a>
                        <h4><a href="#"><?php echo $d->direccion ?></a></h4>
                        <p><?php echo Barrio::findOne($d->id_barrio)->nombre ?></p>
                        <div class="divider thin"></div>
                        <p class="forSale"><?php echo $d->tipo ?></p>
                        <p class="price">$<?php echo $d->valor ?></p>
                    </div>
                    <table border="1" class="propertyDetails">
                        <tbody>
                          <tr>
                            <td><i class="fa fa-arrows-alt" style="margin-right:7px;"></i><?php echo $d->superficie ?>m2</td>
                            <td><i class="fa fa-bed" style="margin-right:7px;"></i><?php echo $d->cantidad_habitaciones ?> Hab.</td>
                            <td><i class="fa fa-tint" style="margin-right:7px;"></i><?php echo $d->cantidad_banios ?> Baños</td>
                          </tr>
                        </tbody>
                    </table> 
                </div>
         
          <?php endforeach; ?>        
          </div>
      </div>
    </section>

    <!-- ULTIMOS INGRESOS -->
    <section class="contenedor-inm-ui">
      <div class="titulo-index">           
        <h3 class="text-center">ULTIMOS INGRESOS</h3>
      </div>
      <div class="container">
          <div id="owl-uingresos" class="owl-carousel owl-theme">
            <?php foreach ($ultima as $u): ?>       
              <div class="propertyItemTwo">
                <div class="propertyPrice">
                  <a class="propertyTypeTwo" href="<?= Url::to(['site/detalle','id' => $u->id]) ?>"><i class="fa fa-home"></i><?php echo $u->operacion ?><br><span>$ <?php echo $u->valor ?></span>
                  </a>
                  
                </div>
                <div class="propertyContentTwo">
                  <a href="<?= Url::to(['site/detalle','id' => $u->id]) ?>" class="propertyImgLink">
                    <?php 
                        if (is_null($u->getImagendestacada())){
                            $session = Yii::$app->session;
                            $img_pred2 = $session->get('img_pred');
                    ?>
                    <img class="propertyImgTwo" src="<?= Yii::$app->request->baseUrl . '/parametros/'.$img_pred2 ?>" alt="...">
                    <?php 
                        }else{
                            $img2 = $u->getImagendestacada();
                    ?>
                    <img class="propertyImgTwo" src="<?= Yii::$app->request->baseUrl . '/uploads/'.$img2->ruta?>" alt="...">
                    <?php }  ?>
                    <div class="propertyImgCaption">
                      <h3><?php echo $u->titulo ?></h3>
                      <p><?php echo $u->descripcion ?></p>
                    </div>
                  </a>
                </div>
                <table border="1" class="propertyDetails">
                    <tbody>
                      <tr>
                        <td><i class="fa fa-arrows-alt" style="margin-right:7px;"></i><?php echo $u->superficie ?>m2</td>
                        <td><i class="fa fa-bed" style="margin-right:7px;"></i><?php echo $u->cantidad_habitaciones ?> Hab.</td>
                        <td><i class="fa fa-tint" style="margin-right:7px;"></i><?php echo $u->cantidad_banios ?> Baños</td>
                      </tr>
                    </tbody>
                </table> 
              </div>
            <?php endforeach; ?>  
          
          </div>
      </div>
    </section> 
    
     <!-- TESTIMONIOS -->
    <section class="contenedor-testimonios">
      <div class="titulo-index">           
        <h3 class="text-center">TESTIMONIOS</h3>
        <h4>TESTIMONIOS DE ALGUNOS DE NUESTROS CLIENTES</h4>
      </div>
      <div class="container cont-contenido-test">
        
      </div>
    </section>  

     <!-- FRASE 2 -->
    <section class="contenedor-frase-contacto">
        <div class="container">
            <div class="col-lg-5 img-frase-b">
              <img src="<?= Yii::$app->request->baseUrl . '/img/casa.png'?>" alt="">
            </div>
            <div class="col-lg-4 texto-frase-b">
              <h3>VENDE O ALQUILA</h3>
              <h3>SU PROPIEDAD?</h3>
            </div>
            <div class="col-lg-3 btn-frase-b">
              <a class="btn btn-default" href="<?= Url::to(['site/contacto']) ?>" data-method="post">CONTACTENOS</a>
            </div>
        </div>
    </section>  



<?php }else{ ?>
  
  <div class="col-md-8 panel panel-default" role="menu" data-wow-duration="0.8s" data-wow-delay="0s">
      <div class="panel-heading text-left">Solicitudes
      </div>
      <div class="panel-body admin">

        <?= GridView::widget([
                'dataProvider' => $solic,
                'summary'=>"",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'nombre',
                    'telefono',
                    'email',
                    'tipo',
                    [ 'class' => 'yii\grid\ActionColumn',
                      'template' => '{view}',
                    ],
                    
                ],
                'tableOptions' =>['class' => 'table'],

            ]); ?>
    </div>
</div>
<?php } ?>