<?php

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
            <li class="animate-in ">
              <div class="start_anime">
                <img src="<?= Yii::$app->request->baseUrl . '/img/1.jpg'?>" class="bg_slider" alt="preview"/>
                <div class="box_area_slider">
                  <div class="panel" >
                    <h2 class="title">Bienvenido<small><strong>Inmobiliaria</strong> Peraza-Gonzalez</small></h2>
                    <div class="description">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                   <img src="<?= Yii::$app->request->baseUrl . '/img/casa.png'?>" class="img_sllider" alt="preview">
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="start_anime">
                <img src="<?= Yii::$app->request->baseUrl . '/img/2.jpg'?>" class="bg_slider" alt="preview"/>
                <div class="box_area_slider">
                  <div class="panel" >
                    <h2 class="title">En busqueda<small>de un <strong></strong>Inmuble?</small></h2>
                    <div class="description">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <img src="<?= Yii::$app->request->baseUrl . '/img/condominio.png'?>" class="img_sllider" alt="preview">
                  </div>
                </div>
              </div>
            </li>
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
            <div class="item">         
                <div class="thumbnail">
                  <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>
            <div class="item">     
                <div class="thumbnail">
                  <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>
            <div class="item">     
                <div class="thumbnail">
                  <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>
            <div class="item">     
                <div class="thumbnail">
                  <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>
            <div class="item">     
                <div class="thumbnail">
                  <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>
            <div class="item">     
                <div class="thumbnail">
                  <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div> 
            <div class="item">     
                <div class="thumbnail">
                  <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div> 
            <div class="item">     
                <div class="thumbnail">
                  <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>            
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
            <div class="item">         
                <div class="thumbnail">
                  <div class="mask">  
                    <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" class="img-responsive zoom-img" alt="...">
                  </div>
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>
            <div class="item">     
                <div class="thumbnail">
                  <div class="mask">  
                    <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" class="img-responsive zoom-img" alt="...">
                  </div>
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>
            <div class="item">     
                <div class="thumbnail">
                  <div class="mask">
                    <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" class="img-responsive zoom-img" alt="...">
                  </div>
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>
            <div class="item">     
                <div class="thumbnail">
                  <div class="mask">
                    <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" class="img-responsive zoom-img" alt="...">
                  </div>
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>
            <div class="item">     
                <div class="thumbnail">
                  <div class="mask">  
                    <img src="<?= Yii::$app->request->baseUrl . '/img/pi.jpg'?>" class="img-responsive zoom-img" alt="...">
                  </div>
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
            </div>
          
          </div>
      </div>
    </section>   
<?php }else{ ?>

  <h1>Bienvenido al panel admin!</h1>

<?php } ?>