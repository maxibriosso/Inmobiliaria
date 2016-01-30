<?php

namespace app\controllers;

use Yii;
use app\models\Imagen;
use app\models\ImagenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;




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
        $model->estado = 1;

        if ($model->load(Yii::$app->request->post())) {
            
            $model->imagen = UploadedFile::getInstances($model, 'imagen');
            
            if($model->validate()){
                
                foreach ($model->imagen as $file) {

                    $ext = end((explode(".", $file->name)));

                    // generate a unique file name
                    $path =  Yii::$app->security->generateRandomString().".{$ext}";
                    
                    $connection = new \yii\db\Connection([
                    'dsn' => 'mysql:host=localhost;dbname=inmobiliaria',
                    'username' => 'root',
                    'password' =>  '',
                            ]);
                    $connection->open();
                    $connection->createCommand()->insert('imagen', [
                    'id_inmueble' => (int)$model->id_inmueble,
                    'imagen' => file_get_contents( $file->tempName ),
                    'destacada' => (int)$model->destacada,
                    'ruta' => $path,
                    'titulo' => $model->titulo,
                    'descripcion' => $model->descripcion,
                    'estado' => 1,])
                    ->execute();


                
                }

                $insert_id =  $connection->getLastInsertID();
                 return $this->redirect(['view', 'id' => $insert_id]);
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
