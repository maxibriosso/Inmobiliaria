<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
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
           <form class="form-inline form-buscador">
              <div class="form-group">
                <!--<label for="exampleInputName2">Name</label>-->
                <select class="form-control">
                  <option value="" selected disabled>OPERACION</option>
                  <option>ALQUILER</option>
                  <option>VENTA</option>
                </select>
              </div>
              <div class="form-group">
                <!--<label for="exampleInputEmail2">Email</label>-->
                <select class="form-control">
                  <option value="" selected disabled>TIPO PROPIEDAD</option>
                  <option>CASA</option>
                  <option>APARTAMENTO</option>
                  <option>TERRENO</option>
                </select>
              </div>
              <div class="form-group ">
                <!--<label for="exampleInputEmail2">Email</label>-->
                <select class="form-control">
                  <option value="" selected disabled>HABITACIONES</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                </select>
              </div>
              <div class="form-group ">
                <!--<label for="exampleInputEmail2">Email</label>-->
                <select class="form-control">
                  <option value="" selected disabled>BAÑOS</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                </select>
              </div>
              <div class="form-group">
                <!--<label for="exampleInputEmail2">Email</label>-->
                <input type="text" class="form-control" placeholder="PRECIO MIN">
              </div>
              <div class="form-group">
                <!--<label for="exampleInputEmail2">Email</label>-->
                <input type="text" class="form-control" placeholder="PRECIO MAX">
              </div>
              <button type="submit" class="btn btn-default btn-form-buscar">BUSCAR</button>
            </form>
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
            <div class="item">         
                <div class="thumbnail">
                  <?php foreach ($d->getImagens()->all() as $img): ?>
                    <?php if($img->destacada == 1): ?>  
                      <img src="<?= Yii::$app->request->baseUrl . '/uploads/'.$img->ruta?>" alt="...">
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <div class="caption">
                    <h3><?php echo $d->titulo ?></h3>
                    <p><?php echo $d->descripcion ?></p>
                    <p>$ <?php echo $d->valor ?></p>
                  </div>
                </div>
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
            <div class="item">         
                <div class="thumbnail">
                  <?php foreach ($u->getImagens()->all() as $img2): ?>
                    <?php if($img2->destacada == 1): ?>  
                      <img src="<?= Yii::$app->request->baseUrl . '/uploads/'.$img2->ruta?>" alt="...">
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <div class="caption">
                    <h3><?php echo $u->titulo ?></h3>
                    <p><?php echo $u->descripcion ?></p>
                    <p>$ <?php echo $u->valor ?></p>
                  </div>
                </div>
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