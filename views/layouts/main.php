<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

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
          <div id="inicio"></div>
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
                          <li><a href="#inicio">Inicio</a></li>
                          <li><a href="#aplicacion">Aplicacion</a></li>
                          <li><a href="#equipo">Nosotros</a></li>
                          <li><a href="#equipo">Nosotros</a></li>
                          <li><a href="<?= Url::to(['site/login']) ?>">Login</a></li>
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
                      <!--<li class="drop-titulo"><p class="text-center">Setting</p></li>-->
                      <li><a href="#"><i class="fa fa-dot-circle-o"></i>Action</a></li>
                      <li><a href="#"><i class="fa fa-dot-circle-o"></i>Another action</a></li>
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
                        <a class="" href="index.html">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-desktop"></i>
                            <span>UI Elements</span>
                        </a>
                        <ul class="sub">
                            <li><a href="tablas.html"><i class="fa fa-dot-circle-o"></i>Tablas</a></li>
                            <li><a href="#"><i class="fa fa-dot-circle-o"></i>Buttons</a></li>
                            <li><a href="#"><i class="fa fa-dot-circle-o"></i>Panels</a></li>
                        </ul>
                    </li>

                    
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class=" fa fa-bar-chart-o"></i>
                            <span>Charts</span>
                        </a>
                        <ul class="sub">
                            <li><a href="#"><i class="fa fa-dot-circle-o"></i>Morris</a></li>
                            <li><a href="#"><i class="fa fa-dot-circle-o"></i>Chartjs</a></li>
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
