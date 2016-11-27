<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Presentacion;
use app\models\PresentacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// Para guardar imagenes
use yii\web\UploadedFile;
/**
 * PresentacionController implements the CRUD actions for Presentacion model.
 */
class PresentacionController extends Controller
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
     * Lists all Presentacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PresentacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Presentacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

     public function actionUpl(){
        
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
             var_dump($_POST);
            exit();
            $searchname= explode(":", $data['searchname']);
            $searchby= explode(":", $data['searchby']);
            $searchname= $searchname[0];
            $searchby= $searchby[0];
            $search = // your logic;
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'search' => $search,
                'code' => 100,
            ];
      }



    }

    /**
     * Creates a new Presentacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Presentacion();

        if ($model->load(Yii::$app->request->post())) {
            //var_dump($_POST);
            //exit();
            
            //Imagen de fondo
            $file = UploadedFile::getInstance($model, 'ruta');
            $ext = end((explode(".", $file->name)));
            $path = 'slide_index'.Yii::$app->security->generateRandomString().".{$ext}";
            $file->saveAs('uploads/' . $path);
            $model->ruta = $path;

            //Imagen left
            $file2 = UploadedFile::getInstance($model, 'ruta_img');
            $ext2 = end((explode(".", $file2->name)));
            $path2 = 'slide_index'.Yii::$app->security->generateRandomString().".{$ext2}";
            $file2->saveAs('uploads/' . $path2);
            $model->ruta_img = $path2;

            if($model->save()){
                return $this->redirect(['index']);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Presentacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img1=$model->ruta;
        $img2=$model->ruta_img;

        if ($model->load(Yii::$app->request->post())) {
            echo "<script>alert('".$model->ruta."');</script>";
            if(is_null($model->ruta)){
                $model->ruta=$img1;
            }else{
                //Imagen de fondo
                $file = UploadedFile::getInstance($model, 'ruta');
                $ext = end((explode(".", $file->name)));
                $path = 'slide_index'.Yii::$app->security->generateRandomString().".{$ext}";
                $file->saveAs('uploads/' . $path);
                $this->resize_crop_image(1366, 550, 'uploads/'.$path, 'uploads/'.$path);
                $model->ruta = $path;
            }
            echo "<script>alert('".$model->ruta_img."');</script>";
            if(is_null($model->ruta_img)){
                $model->ruta=$img2;
            }else{            
                //Imagen left
                $file2 = UploadedFile::getInstance($model, 'ruta_img');
                $ext2 = end((explode(".", $file2->name)));
                $path2 = 'slide_index'.Yii::$app->security->generateRandomString().".{$ext2}";
                $file2->saveAs('uploads/' . $path2);
                $model->ruta_img = $path2;
            }

            if($model->save()){
                return $this->redirect(['index']);
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Presentacion model.
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
     * Finds the Presentacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Presentacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Presentacion::findOne($id)) !== null) {
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
