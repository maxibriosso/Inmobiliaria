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
use yii\imagine\Image;
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
                        $this->resize_crop_image(710, 530, 'uploads/'.$path, 'uploads/'.$path);

                        //Image::thumbnail( 'uploads/'.$path , 400, 300)->save('uploads/'.$path, ['quality' => 100]);

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
            $img = Yii::$app->request->baseUrl .'/uploads/'.$image->ruta;
            $initialPreviewConfig = ['url' => "http://localhost/Inmobiliaria/web/remate/deleteimage", 'key' => $image->id];

            array_push($array,$img);
            array_push($arrayPreviewConf,$initialPreviewConfig);
           

        }  

        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            
            $model->ubicacion = Yii::$app->request->bodyParams['markets2'];
            
            if($model->save()) {
                
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
                        $this->resize_crop_image(710, 530, 'uploads/'.$path, 'uploads/'.$path);
                        //Image::thumbnail( 'uploads/'.$path , 400, 300)->save('uploads/'.$path, ['quality' => 100]);

                        //Se cargan datos en el modelo.
                        $model2[$a]->id_remate   =  (int)$model->id;
                        $model2[$a]->ruta        =  $path;
                        $model2[$a]->nombre      =  $file->name;
                        $model2[$a]->estado      =  1;
            
                        $model2[$a]->save(false);
                    }

                }


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

    //resize and crop image by center
    protected function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80)
    {
        $imgsize = getimagesize($source_file);
        $width = $imgsize[0];
        $height = $imgsize[1];
        $mime = $imgsize['mime'];
     
        switch($mime){
            case 'image/gif':
                $image_create = "imagecreatefromgif";
                $image = "imagegif";
                break;
     
            case 'image/png':
                $image_create = "imagecreatefrompng";
                $image = "imagepng";
                $quality = 7;
                break;
     
            case 'image/jpeg':
                $image_create = "imagecreatefromjpeg";
                $image = "imagejpeg";
                $quality = 80;
                break;
     
            default:
                return false;
                break;
        }
         
        $dst_img = imagecreatetruecolor($max_width, $max_height);
        $src_img = $image_create($source_file);
         
        $width_new = $height * $max_width / $max_height;
        $height_new = $width * $max_height / $max_width;
        //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
        if($width_new > $width){
            //cut point by height
            $h_point = (($height - $height_new) / 2);
            //copy image
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
        }else{
            //cut point by width
            $w_point = (($width - $width_new) / 2);
            imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
        }
         
        $image($dst_img, $dst_dir, $quality);
     
        if($dst_img)imagedestroy($dst_img);
        if($src_img)imagedestroy($src_img);
    }


}
