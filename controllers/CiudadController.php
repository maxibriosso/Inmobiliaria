<?php

namespace app\controllers;

use Yii;
use app\models\Ciudad;
use app\models\CiudadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use pheme\grid\actions\TogglebAction;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\HtmlHelpers;
use yii\helpers\ArrayHelper;
/**
/**
 * CiudadController implements the CRUD actions for Ciudad model.
 */
class CiudadController extends Controller
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
                        'only' => ['index','create','update','view','delete','toggle'],
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
                'modelClass' => 'app\models\Ciudad',
                // Uncomment to enable flash messages
                'setFlash' => true,
            ]
        ];
    }
    /**
     * Lists all Ciudad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CiudadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ciudad model.
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
     * Creates a new Ciudad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ciudad();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post('ciudad-form'))) {
            //echo "<script>console.log( 'Entro a primer if' );</script>";
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->estado=1;
            if($model->save()){
                //return $this->redirect(['view', 'id' => $model->id]);
                echo 1;
            }else{
                echo 0;
            }
        }
        else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ciudad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

/*        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
*/
        if ($model->load(Yii::$app->request->post())) {

            if($model->save()){
                //return $this->redirect(['view', 'id' => $model->id]);
                echo 2;
            }else{
                echo 0;
            }   
            
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ciudad model.
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
     * Finds the Ciudad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ciudad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ciudad::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
