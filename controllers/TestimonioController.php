<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Testimonio;
use app\models\TestimonioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// Para guardar imagenes
use yii\web\UploadedFile;
use pheme\grid\actions\TogglebAction;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\HtmlHelpers;
use yii\helpers\ArrayHelper;

/**
 * TestimonioController implements the CRUD actions for Testimonio model.
 */
class TestimonioController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view','delete'],
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
                'modelClass' => 'app\models\Testimonio',
                // Uncomment to enable flash messages
                'setFlash' => true,
            ]
        ];
    }
    /**
     * Lists all Testimonio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestimonioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Testimonio model.
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
     * Creates a new Testimonio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Testimonio();

        if ($model->load(Yii::$app->request->post())) {
            $model->estado = 1;

            //var_dump($_POST);
            //exit();
            
            $file = UploadedFile::getInstance($model, 'ruta');
            $ext = end((explode(".", $file->name)));
            // generate a unique file name
            $path = 'testimonio'.Yii::$app->security->generateRandomString().".{$ext}";
   
            $file->saveAs('uploads/' . $path);

            $model->ruta = $path;

            if($model->save())
                return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Testimonio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Testimonio model.
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
     * Finds the Testimonio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Testimonio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Testimonio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
