<?php

namespace app\controllers;

use Yii;
use app\models\Parametro;
use app\models\ParametroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParametroController implements the CRUD actions for Parametro model.
 */
class ParametroController extends Controller
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
        ];
    }

    /**
     * Lists all Parametro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParametroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Parametro model.
     * @param integer $id
     * @param string $nombre
     * @return mixed
     */
    public function actionView($id, $nombre)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $nombre),
        ]);
    }

    /**
     * Creates a new Parametro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Parametro();

        $model->id_usuario = \Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id, 'nombre' => $model->nombre]);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Parametro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $nombre
     * @return mixed
     */
    public function actionUpdate($id, $nombre)
    {
        $model = $this->findModel($id, $nombre);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'nombre' => $model->nombre]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Parametro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $nombre
     * @return mixed
     */
    public function actionDelete($id, $nombre)
    {
        $this->findModel($id, $nombre)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Parametro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $nombre
     * @return Parametro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $nombre)
    {
        if (($model = Parametro::findOne(['id' => $id, 'nombre' => $nombre])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
