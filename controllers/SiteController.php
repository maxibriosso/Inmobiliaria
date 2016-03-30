<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Solicitud;
use app\models\Presentacion;
use app\models\PresentacionSearch;
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

        $sql = 'SELECT * FROM Inmueble WHERE fecha_creacion BETWEEN (NOW() - interval 30 day) AND NOW()';
        $ultima = Inmueble::findBySql($sql)->andWhere(['activo'=> 1])->all();

        $dataProvider = Presentacion::find()->all();

        $searchModel = new SolicitudSearch();
        $solic = $searchModel->obtener(Yii::$app->request->queryParams);

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

            $dataProvider = new ActiveDataProvider([
                'query' => Inmueble::find()->where(['operacion' => 'Alquiler'])->orderBy('id DESC'),
                'pagination' => [
                    'pageSize' => 8,
                ],
            ]);

            return $this->render('alquileres',[
            'buscador' => $buscador,
            'listDataProvider' => $dataProvider

            ]);
        }
    }
    public function actionEmpresa()
    {
        return $this->render('empresa');
    }
    public function actionVentas()
    {
        

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

            $dataProvider = new ActiveDataProvider([
                'query' => Inmueble::find()->where(['operacion' => 'Venta'])->orderBy('id DESC'),
                'pagination' => [
                    'pageSize' => 8,
                ],
            ]);

            return $this->render('ventas',[
            'buscador' => $buscador,
            'listDataProvider' => $dataProvider

            ]);
        }
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
        //$data = Inmueble::findByPk($id);
        $data2 = Inmueble::findModel($id);

        return $this->render('detalle', [
            'model' => $data2,
        ]);
    }
}
