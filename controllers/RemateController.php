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
use pheme\grid\actions\TogglebAction;
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
                'modelClass' => 'app\models\Remate',
                // Uncomment to enable flash messages
                'setFlash' => true,
            ]
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

        $array = array();
        $arrayPreviewConf = array();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            //Se carga ubicacion del remate.
            $model->ubicacion = Yii::$app->request->bodyParams['markets2'];
            //Se carga el estado del remate.
            $model->estado = 1;
            //Si se guarda el remate se dan de alta las imagenes del mismo.
            if($model->save()){

                $img = UploadedFile::getInstances($imagen, 'ruta');

                if(!empty($img)){
                    $a = 0;
                    foreach ($img as $file) {
                        $a++;
                        $model2[$a] = new Imagen_remate();
                        if($a == 1){
                            $model2[$a]->destacada     = 1;
                        }
                        else{
                            $model2[$a]->destacada     = 0;
                        }
                        $ext = end((explode(".", $file->name)));

                        // generate a unique file name
                        $path = 'remate'.Yii::$app->security->generateRandomString().".{$ext}";
                        //Se guarda la imagen en uploads.
                        $file->saveAs('uploads/' . $path);
                        //Se cargan datos en el modelo.
                        $model2[$a]->id_remate   =  (int)$model->id;
                        $model2[$a]->ruta        =  $path;
                        $model2[$a]->nombre      =  $file->name;
                        $model2[$a]->estado      =  1;
            
                        $model2[$a]->save(false);
                    }

                }
                
                
                //return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'imagen'=> $imagen,
                'imagenes' => $array,
                'previewconf' => $arrayPreviewConf,
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

        $imagenes = Imagen_remate::find()
            ->where(['id_remate' => $id])
            ->orderBy('id')
            ->all();
        $array = array();
        $arrayPreviewConf = array();
    
        foreach ($imagenes as $image) {

            $img = "<img style='height:160px' src='".Yii::$app->request->baseUrl .'/uploads/'.$image->ruta."'>";
            $initialPreviewConfig = ['caption' => "$image->nombre", 'width' => '120px', 'url' => "http://localhost/Inmobiliaria/web/remate/deleteimage", 'key' => $image->id];
            
            array_push($array,$img);
            array_push($arrayPreviewConf,$initialPreviewConfig);
           

        }  

        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->ubicacion = Yii::$app->request->bodyParams['markets2'];
            
            if($model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'imagen' => $imagen,
                'imagenes' => $array,
                'previewconf' => $arrayPreviewConf,
            ]);
        }
    }

    //Borra imagenes del remate 
    public function actionDeleteimage()
    {   
            
        if (Yii::$app->request->isAjax) {
            
            $key = $_POST['key'];


            $imagen = Imagen_remate::find()
            ->where(['id' => (int)$key])
            ->one();
            
            $image = 'C:\wamp\www\Inmobiliaria\web' . '/uploads/' . $imagen->ruta;

            if (unlink($image)) {
                $imagen->delete();
                
            }
           
            $output = ['respuesta'=>'Imagen eliminada.'];
            return json_encode($output) ;
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
