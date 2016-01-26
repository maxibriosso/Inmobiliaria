<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
if(Yii::$app->user->isGuest){ 
?>
    <section class="contenido-principal-index">

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="img/aptos/2.jpg" style="width: 100%;height:600px;" alt="...">
              <div class="carousel-caption">
                <h1>Titulo propiedad</h1>
                <p>descripcion</p>
              </div>
            </div>
            <div class="item">
              <img src="img/aptos/1.jpg" style="width: 100%;height:600px;" alt="...">
              <div class="carousel-caption">
                <h1>Titulo propiedad</h1>
                <div class="sliderTextBox">
                    <p>descripcion</p>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="img/aptos/3.jpg" style="width: 100%;height:600px;" alt="...">
              <div class="carousel-caption">
                <h1>Titulo propiedad</h1>
                <div class="sliderTextBox">
                    <p>descripcion</p>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="img/aptos/4.jpg" style="width: 100%;height:600px;" alt="...">
              <div class="carousel-caption">
                <h1>Titulo propiedad</h1>
                <div class="sliderTextBox">
                    <p>descripcion</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        

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

    <!-- INMUEBLES PRINCIPALES -->
    <section class="contenedor-buscador">
       <div class="container">
           
       </div>
        
    </section>    
<?php }else{ ?>

  <h1>Bienvenido al panel admin!</h1>

<?php } ?>