<?php

namespace app\controllers;

use Yii;
use app\models\Imagen;
use app\models\ImagenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Inmueble;



/**
 * ImagenController implements the CRUD actions for Imagen model.
 */
class ImagenController extends Controller
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

    /**
     * Lists all Imagen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImagenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Imagen model.
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
     * Creates a new Imagen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Imagen();

        if ($model->load(Yii::$app->request->post())) {
            
            $model->imagen = UploadedFile::getInstances($model, 'imagen');
            $inmueble = Inmueble::findOne($model->id_inmueble);
            if($model->validate()){
                $a=0;
                foreach ($model->imagen as $file) {
                   
                    $nuevaImagen  = new Imagen();

                    $ext = end((explode(".", $file->name)));

                    // generate a unique file name
                    $path =  Yii::$app->security->generateRandomString().".{$ext}";
                    
                    $nuevaImagen->id_inmueble = $model->id_inmueble;
                    $nuevaImagen->ruta = $path;
                    $nuevaImagen->titulo = $model->titulo;
                    $nuevaImagen->descripcion = $model->descripcion;
                    $nuevaImagen->destacada = $model->destacada;
                    $nuevaImagen->estado = $model->estado;

                    if($nuevaImagen->save(false)){
                        $file->saveAs('uploads/' . $path);
                    }
                
                }
                 return $this->redirect(['view', 'id' => $nuevaImagen->id]);
            }


            //$model->save();
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Imagen model.
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
     * Deletes an existing Imagen model.
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
     * Finds the Imagen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Imagen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Imagen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
