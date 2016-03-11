<?php

namespace app\controllers;

use Yii;
use app\models\Remate;
use app\models\RemateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Imagen_remate;
// Para guardar imagenes
use yii\web\UploadedFile;

/**
 * RemateController implements the CRUD actions for Remate model.
 */
class RemateController extends Controller
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
     * Lists all Remate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RemateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Remate model.
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
     * Creates a new Remate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Remate();
        $imagen = new Imagen_remate();

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $imagen->load(Yii::$app->request->post())) {
            $model->estado=1;
            if($model->save() && !empty($imagen->ruta)){
                $img = UploadedFile::getInstances($imagen, 'ruta');
                $imagen->estado = 1;
                $imagen->id_remate= $model->id;
                $a = 0;
                foreach ($img as $file) {
                    $a++;
                    $model2[$a] = new Imagen_remate();
                    if($a == 1){
                        $model2[$a]->destacada     =1;
                    }
                    else{
                        $model2[$a]->destacada     =  (int)$imagen->destacada;
                    }
                    $ext = end((explode(".", $file->name)));

                    // generate a unique file name
                    $path = 'remate'.Yii::$app->security->generateRandomString().".{$ext}";
                    
                    $file->saveAs('uploads/' . $path);
                    
                    $model2[$a]->id_remate   =  (int)$imagen->id_remate;
                    $model2[$a]->ruta = $path;
                    $model2[$a]->nombre        =  $imagen->nombre;
                    $model2[$a]->estado        =  (int)$imagen->estado;
                    
                

                    $model2[$a]->save(false);

               
                }
                
                //return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index']);
            }
            /*if ($model->load(Yii::$app->request->post())) {
            $model->estado=1;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }*/
        } else {
            return $this->render('create', [
                'model' => $model,
                'imagen'=> $imagen,
            ]);
        }
    }

    /**
     * Updates an existing Remate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $imagen = new Imagen_remate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'imagen'=> $imagen,
            ]);
        }
    }

    /**
     * Deletes an existing Remate model.
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
     * Finds the Remate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Remate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Remate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
