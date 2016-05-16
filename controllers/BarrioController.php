<?php

namespace app\controllers;

use Yii;
use app\models\Barrio;
use app\models\BarrioSearch;
use yii\web\Controller;
use app\models\Ciudad;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use pheme\grid\actions\TogglebAction;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\HtmlHelpers;
use yii\helpers\ArrayHelper;
/**
 * BarrioController implements the CRUD actions for Barrio model.
 */
class BarrioController extends Controller
{
    public function behaviors()
    {
         return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view','delete','toggle','ciudad'],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            // everything else is denied
                        ],
                    ],
        ];
    }
    
    public function actions()
    {
        return [
            'toggle' => [
                'class' => TogglebAction::className(),
                'modelClass' => 'app\models\Barrio',
                // Uncomment to enable flash messages
                'setFlash' => true,
            ]
        ];
    }
    /**
     * Lists all Barrio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BarrioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Barrio model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Barrio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Barrio();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post('barrio-form'))) {
            //echo "<script>console.log( 'Entro a primer if' );</script>";
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $model->estado=1;
            //echo "<script>console.log( 'Entro a segundo if if' );</script>";
            if($model->save()){
                //echo "<script>console.log( 'Entro a save' );</script>";
                //$model->refresh();
                //Yii::$app->response->format = Response::FORMAT_JSON;
                //return [
                //    'message' => '¡Éxito!',
                //];
                echo 1;
            } else {
                //Yii::$app->response->format = Response::FORMAT_JSON;
                echo 0;
                //return ActiveForm::validate($model);
            }
        
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Barrio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }*/
        /*if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                $model->refresh();
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'message' => '¡Éxito!',
                ];
            } else {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }*/
        if ($model->load(Yii::$app->request->post())) {
            //$model->estado=1;
            //echo "<script>console.log( 'Entro a segundo if if' );</script>";
            if($model->save()){
                //$model->refresh();
                //Yii::$app->response->format = Response::FORMAT_JSON;
                //return [
                //    'message' => '¡Éxito!',
                //];
                echo 2;
            } else {
                //Yii::$app->response->format = Response::FORMAT_JSON;
                echo 0;
                //return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Barrio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Barrio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Barrio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Barrio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCiudad($id){
        echo HtmlHelpers::dropDownList(Ciudad::className(), 'id_departamento', $id, 'id', 'nombre');
    }

    
}
