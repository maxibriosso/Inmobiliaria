<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
$this->title = 'Inmobiliaria';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <?php if(Yii::$app->user->isGuest){ ?>
    <div id="frontend">
      <!-- HEADER -->
      <header>
          <div id="inicio">
          </div>
          <div class="menu-social-header navbar-fixed-top navbar-collapse2 collapse">
            <div class="container contenedor-menu-social-header">
                <ul class="nav navbar-nav mn-menu-social-header navbar-left text-center">                    
                    <li><a href="#" class="no-link">099392222</a></li>
                    <li><a href="#" class="no-link">|</a></li>
                    <li><a href="#" class="no-link">info@inmobiliaria.com</a></li>
                    <li><a href="#" class="no-link">|</a></li>
                    <li><a href="<?= Url::to(['site/login']) ?>">Login</a></li>
                </ul>
            </div>
        </div>
          <div class="navbar navbar-inverse navbar-fixed-top navbar-inmo" role="navigation">
              <div class="container">
                  <div class="navbar-header navbar-header-index">
                      <a class="navbar-brand logo-index" href="#">
                          <!--<img alt="Brand" src="img/logo2.png">-->
                          <h1>Inmobiliaria</h1>
                      </a>
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                          <span class="sr-only">Menu</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                  </div>
                  <div class="collapse navbar-collapse menu-header-index">
                      <ul class="nav navbar-nav navbar-right menu-index">
                          <li><a href="<?= Url::to(['site/index']) ?>">Inicio</a></li>
                          <li><a href="<?= Url::to(['site/empresa']) ?>">Empresa</a></li>
                          <li><a href="<?= Url::to(['site/servicios']) ?>">Servicios</a></li>
                          <li><a href="<?= Url::to(['site/ventas']) ?>">Ventas</a></li>
                          <li><a href="<?= Url::to(['site/alquileres']) ?>">Alquileres</a></li>
                          <li><a href="<?= Url::to(['site/contacto']) ?>">Contacto</a></li>
                         
                      </ul>
                  </div><!--/.nav-collapse -->
              </div>
          </div>
      </header>

      <section>
          <?= $content ?>
      </section>

      <footer>
          <div class="">
              <div class="container">
                <div class="footer-top-at">
                      <div class="col-md-4 amet-sed">
                        <h4>Nuestra compañía</h4>
                        <ul class="nav-bottom">
                          <li><a href="#">Sobre nosotros</a></li>
                          <li><a href="#">Términos &amp; condiciones</a></li>
                          <li><a href="#">Política de privacidad</a></li>
                          <li><a href="#">Login</a></li>                         
                        </ul> 
                      </div>
                      <div class="col-md-4 amet-sed">
                        <h4>Atención al cliente</h4>
                        <p>Lunes a viernes, 9 a 18 hs</p>
                        <p>Sabados, 9 a 13 hs</p>
                        <p>Direccion 1234</p>
                        <p>info@inmobiliaria.com</p>
                        <p>099394334</p>
                      </div>
                      <div class="col-md-4 amet-sed ">
                        <h4>Servicios</h4>
                          <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"> </i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"> </i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"> </i></a></li>
                          </ul>
                      </div>
                    <div class="clearfix"> </div>
                    </div>
              
              </div>
          </div>
          <div id="footerwrap">
              <div class="container text-center">
                  <h4><small>Inmobiliaria Peraza - Copyright 2015</small></h4>
              </div>
          </div>   
      </footer>
    </div>



    <?php }else{ ?>
    <div id="backend">
      <!-- HEADER -->
      <header> 
          <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid contenedor-navbar">
              
              <div class="navbar-header">
                  <a class="navbar-brand" href="#">Admin 2.0</a>
                  <!--<a href="#" class="btn-menu"><span class="fa fa-bars"></a></li>-->
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-1">
                      <span class="">Login</span>
                  </button>
                  <button type="button" id="juas" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-2">
                      <span class="">Menu</span>
                  </button>
                
              </div>

              <div class="collapse navbar-collapse" id="collapse-1">
                
                <ul class="nav navbar-nav menu-top">
                </ul>

                <ul class="nav navbar-nav navbar-right menu-top-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle btn-setting" data-toggle="dropdown" role="button" aria-expanded="false"><span class="li_settings"></span></a>
                    <ul class="dropdown-menu drop-right wow flipInX" role="menu" data-wow-duration="0.5s" data-wow-delay="0s">
                      <li><a href="#"><i class="fa fa-dot-circle-o"></i>Perfil</a></li>
                      <li><a href="<?= Url::to(['site/logout']) ?>" data-method="post"><i class="fa fa-power-off"></i>Cerrar sesion</a></li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-collapse -->

            </div><!-- /.container-fluid -->
          </nav>
      </header>
      <!-- / HEADER -->

      <!-- MENU LEFT -->
      <aside class="collapse" id="collapse-2">
          <div id="sidebar" class="nav-collapse ">
              <ul class="sidebar-menu-fixed" id="nav-accordion2">
                    <li class="mt">
                        <a class="" href="<?= Url::to(['site/index']) ?>">
                            <i class="fa fa-inbox"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-users"></i>
                            <span>Usuarios</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= Url::to(['usuario/index']) ?>"><i class="fa fa-dot-circle-o"></i>Admin</a></li>
                            <li><a href="<?= Url::to(['usuario/create']) ?>"><i class="fa fa-dot-circle-o"></i>Crear</a></li>
                        </ul>
                    </li>

                    
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class=" fa fa-building"></i>
                            <span>Inmuebles</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= Url::to(['inmueble/index']) ?>"><i class="fa fa-dot-circle-o"></i>Admin</a></li>
                            <li><a href="<?= Url::to(['inmueble/create']) ?>"><i class="fa fa-dot-circle-o"></i>Crear</a></li>
                            <li><a href="<?= Url::to(['inmueble/imagen']) ?>"><i class="fa fa-dot-circle-o"></i>Alta Imagenes</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class=" fa fa-gavel"></i>
                            <span>Remates</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= Url::to(['remate/index']) ?>"><i class="fa fa-dot-circle-o"></i>Admin</a></li>
                            <li><a href="<?= Url::to(['remate/create']) ?>"><i class="fa fa-dot-circle-o"></i>Crear</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class=" fa fa-child"></i>
                            <span>Propietarios</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= Url::to(['propietario/index']) ?>"><i class="fa fa-dot-circle-o"></i>Admin</a></li>
                            <li><a href="<?= Url::to(['propietario/create']) ?>"><i class="fa fa-dot-circle-o"></i>Crear</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class=" fa fa-cogs"></i>
                            <span>Complementos</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?= Url::to(['presentacion/index']) ?>"><i class="fa fa-desktop"></i>Slider</a></li>
                            <li><a href="<?= Url::to(['barrio/index']) ?>"><i class="fa fa-globe "></i>Barrios</a></li>
                            <li><a href="<?= Url::to(['ciudad/index']) ?>"><i class="fa fa-globe "></i>Ciudades</a></li>
                            <li><a href="<?= Url::to(['departamento/index']) ?>"><i class="fa fa-globe"></i>Dptos</a></li>
                        </ul>
                    </li>                    
              </ul>

              
          </div>
      </aside>
      <!-- / MENU LEFT -->

      <section class="main-content">
          <div class="contenedor-contenido">
              <?= Breadcrumbs::widget([
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
              ]) ?>

              <?= $content ?>
          </div>
      </section>
      

      <!--FOOTER-->
      <footer class="footer">
          <div class="text-center">
              2015 - P&G Inmobiliaria 
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!-- / FOOTER -->
    </div>
    <?php } ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
