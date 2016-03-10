<?php

namespace app\controllers;

use Yii;
use app\models\Inmueble;
use app\models\Imagen;
use app\models\InmuebleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// Para guardar imagenes
use yii\web\UploadedFile;

/**
 * InmuebleController implements the CRUD actions for Inmueble model.
 */
class InmuebleController extends Controller
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
     * Lists all Inmueble models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InmuebleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inmueble model.
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
     * Creates a new Inmueble model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inmueble();
  
        $model->id_usuario = \Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $model->coord = Yii::$app->request->bodyParams['markets'];
            if($model->save() ){
                
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionImagen(){
      
        
        $model = new Imagen();
        
        if (Yii::$app->request->isAjax) {
            $model->estado = 1;

            $data = Yii::$app->request->post();
         
             var_dump($_POST);
            exit();

            $model->imagen = UploadedFile::getInstances($model, 'imagen');


            $id = $_POST['id'];
            $check = $_POST['check'];
          
             $a = 0;
             $c = 1;
             foreach ($model->imagen as $file) {

                    $nombre= explode(":", $data['new_'.$a]);

                    $descripcion= explode(":", $data['init_'.($a+1)]);
                    

                    $model2 = new Imagen();

                    $ext = end((explode(".", $file->name)));

                    // genera nombre unico de archivo
                    $path =  Yii::$app->security->generateRandomString().".{$ext}";
           
                    $file->saveAs('uploads/' . $path);
                    
                    $model2->id_inmueble   =  (int)$id;
                    $model2->estado        =  (int)$model->estado;
                    if($c == (int)$check){
                        $model2->destacada     =  (int)1;
                    }else{
                         $model2->destacada     =  (int)0;
                    }
                    
                    $model2->descripcion   =  $descripcion[0];
                    $model2->titulo        =  $nombre[0];
                    $model2->ruta = $path;

                    $model2->fecha_creacion = date("Y/m/d");

                    $model2->save(false);
                   
                    $a = $a + 2;
                    $c++; 
            }
            $output = ['success'=>'Imagen guardada.'];
            return json_encode($output) ;      
        }else {
            return $this->render('altaImagenes', [
                'model' => $model,
            ]);
        }



    }

    /**
     * Updates an existing Inmueble model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->coord = Yii::$app->request->bodyParams['markets'];
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


     public function actionUpdateimage($id)
    {
        $model = new Imagen();
        $imagenes = Imagen::find()
            ->where(['id_inmueble' => $id])
            ->orderBy('id')
            ->all();
        $array = array();
        $arrayPreviewConf = array();
        $arrayDesc = array();
        $destacada = null;
    
        foreach ($imagenes as $imagen) {

            $img = "<img style='height:160px' src='".Yii::$app->request->baseUrl .'/uploads/'.$imagen->ruta."'>";
            $initialPreviewConfig = ['caption' => "$imagen->titulo", 'width' => '120px', 'url' => "http://localhost/Inmobiliaria/web/inmueble/deleteimage", 'key' => $imagen->id];
            $descripcion = ['{TAG_VALUE}' => "$imagen->descripcion",'{TAG_CSS_NEW}' => "$imagen->id"];
            
            array_push($array,$img);
            array_push($arrayPreviewConf,$initialPreviewConfig);
            array_push($arrayDesc,$descripcion);

            if($imagen->destacada){
                $destacada = $imagen->id;
            }
           

        }  
   
        if (Yii::$app->request->isAjax) {

            $model->estado = 1;

            $data = Yii::$app->request->post();

            $model->imagen = UploadedFile::getInstances($model, 'imagen');

            $check = $_POST['check'];

            $a = 0;
            $c = 1;

            foreach ($imagenes as $img) {
                    $nombre= explode(":", $data['new_'.$a]);

                    $descripcion= explode(":", $data['init_'.($a+1)]);
                    
                    $img->descripcion   =  $descripcion[0];
                    $img->titulo        =  $nombre[0];

                    if($c == (int)$check){
                        if($img->destacada!= (int)1){
                            $img->destacada =  (int)1;
                        }

                    }else{
                         $img->destacada = (int)0;
                    }

                    $img->fecha_creacion = date("Y/m/d");

                    $img->save(false);
                   
                    $a = $a + 2;
                    $c++; 



            }
          
            foreach ($model->imagen as $file) {

                    $nombre= explode(":", $data['new_'.$a]);

                    $descripcion= explode(":", $data['init_'.($a+1)]);
                    

                    $model2 = new Imagen();

                    $ext = end((explode(".", $file->name)));

                    // genera nombre unico de archivo
                    $path =  Yii::$app->security->generateRandomString().".{$ext}";
           
                    $file->saveAs('uploads/' . $path);
                    
                    $model2->id_inmueble   =  (int)$id;
                    $model2->estado        =  (int)$model->estado;

                    if($c == (int)$check){
                        if($model2->destacada!= (int)1){
                            $model2->destacada =  (int)1;
                        }

                    }else{
                         $model2->destacada = (int)0;
                    }
                    
                    $model2->descripcion   =  $descripcion[0];
                    $model2->titulo        =  $nombre[0];
                    $model2->ruta = $path;

                    $model2->fecha_creacion = date("Y/m/d");

                    $model2->save(false);
                   
                    $a = $a + 2;
                    $c++; 
            }

            $output = ['respuesta'=>'Imagen guardada.'];
            return json_encode($output) ;
        } else {
            return $this->render('updateImage', [
                'model' => $model,
                'imagenes' => $array,
                'previewconf' => $arrayPreviewConf,
                'descripcion' => $arrayDesc,
                'destacada' => $destacada,
                'id' => $id,
 

            ]);
        }
    }

     public function actionDeleteimage()
    {   
            
        if (Yii::$app->request->isAjax) {
            
            $key = $_POST['key'];
            $idInmueble = $_POST['idInmueble'];



            $imagen = Imagen::find()
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
     * Deletes an existing Inmueble model.
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
     * Finds the Inmueble model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inmueble the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inmueble::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
