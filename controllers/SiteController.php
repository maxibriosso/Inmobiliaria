<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Session;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\InfoSite;
use app\models\Solicitud;
use app\models\Usuario;
use app\models\Presentacion;
use app\models\PresentacionSearch;
use app\models\Parametro;
use app\models\ParametroSearch;
use app\models\Inmueble;
use app\models\InmuebleSearch;
use app\models\SolicitudSearch;
use yii\data\ActiveDataProvider; 

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $data = Inmueble::find()
            ->where(['destacado' => 1])->andWhere(['activo'=> 1])
            ->orderBy('id')
            ->all();

        $site = new InfoSite();
        $site->nro_usuarios=Usuario::find()->count();
        $site->nro_inmubles=Inmueble::find()->Where(['activo'=> 1])->count();
        $site->nro_comentarios=Solicitud::find()->count();
        //Inmuebles con menos de un mes
        //$sql = 'SELECT * FROM Inmueble WHERE fecha_creacion BETWEEN (NOW() - interval 30 day) AND NOW()';
        
        //Ultimos 10 inmuebles ingresados
        $sql='SELECT * FROM Inmueble ORDER BY id DESC LIMIT 10';
        $ultima = Inmueble::findBySql($sql)->andWhere(['activo'=> 1])->all();

        //Todos los inmuebles
        $dataProvider = Presentacion::find()->all();

        $searchModel = new SolicitudSearch();
        $solic = $searchModel->obtener(Yii::$app->request->queryParams);

        $parametro=Parametro::findBySql('SELECT * FROM Parametro WHERE nombre="img_pred"')->one();
        $session = Yii::$app->session;
        //if (!$session->has('img_pred'))
            $session->set('img_pred', $parametro->valor);
        
        $buscador = new InmuebleSearch();

        if($buscador->load(Yii::$app->request->get()))
        {
            if ($buscador->validate())
            {
                
                $dataSearch = $buscador->search(Yii::$app->request->queryParams);

                return $this->render('busqueda', [
                    'dataProvider' => $dataSearch,
                ]);
            }
            else{
                $form->getErrors();
            }
        }else{

            return $this->render('index', [
            'pre' => $dataProvider,
            'des' => $data,
            'ultima' => $ultima,
            'solic'=> $solic,
            'searchModel' => $searchModel,
            'buscador' => $buscador,
            'site' => $site,
            ]);
        }
    }

    public function actionLogin()
    {
        $this->layout = "backend";
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContacto()
    {
        /*$model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }*/
        $model = new Solicitud();

        if ($model->load(Yii::$app->request->post())) {
            $model->estado = 1;
            $model->leida = 0;
            if($model->save()){
                Yii::$app->session->setFlash('contactoFormSubmitted');
                return $this->refresh();
            }  
        }

        return $this->render('contacto', [
                    'model' => $model,
                ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAlquileres()
    {
        $searchModel = new InmuebleSearch();
        $searchModel->operacion = 'Alquiler';


        $parametro=Parametro::findBySql('SELECT * FROM Parametro WHERE nombre="img_pred"')->one();
        $session = Yii::$app->session;
        //if (!$session->has('img_pred'))
            $session->set('img_pred', $parametro->valor);

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=8;

        return $this->render('alquileres',[
            'searchModel' => $searchModel,
            'listDataProvider' => $dataProvider
            ]);
    }

    public function actionEmpresa()
    {
        return $this->render('empresa');
    }

    public function actionVentas()
    {
        $searchModel = new InmuebleSearch();
        $searchModel->operacion = 'Venta';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=8;
        
        $parametro=Parametro::findBySql('SELECT * FROM Parametro WHERE nombre="img_pred"')->one();
        $session = Yii::$app->session;
        //if (!$session->has('img_pred'))
            $session->set('img_pred', $parametro->valor);

        return $this->render('ventas',[
            'searchModel' => $searchModel,
            'listDataProvider' => $dataProvider
            ]);
    }
    public function actionServicios()
    {
        return $this->render('servicios');
    }
    public function actionBusqueda()
    {
        
    }

    public function actionDetalle($id)
    {
        $searchModel = new InmuebleSearch();
        $data2 = Inmueble::find()->where(['id' => $id])->one();
        $parametro=Parametro::findBySql('SELECT * FROM Parametro WHERE nombre="img_pred"')->one();
        $session = Yii::$app->session;
        $session->set('img_pred', $parametro->valor);

        return $this->render('detalle', [
            'model' => $data2,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($id)
    {
        $model = Solicitud::find()->andWhere(['id'=> $id])->one();

        $ruta=Parametro::findBySql('SELECT * FROM Parametro WHERE nombre="cpt_param"')->one();
        $parametro=Parametro::findBySql('SELECT * FROM Parametro WHERE nombre="dft_user"')->one();

        return $this->renderAjax('view', [
            'model' => $model,
            'ruta' => $ruta,
            'parametro' => $parametro,
        ]);
    }
}
