<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Barrio;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Remate */
/* @var $form yii\widgets\ActiveForm */

$baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
$this->registerJsFile($baseUrl.'/js/localizacionMapaRem.js');

?>

<div class="row content-form">
<?php $form = ActiveForm::begin([
    'id'=>'formRemateid',   
    'options' => ['enctype' => 'multipart/form-data']]); 
?>

        <div class="col-md-6">
            <?=$form->field($model, 'id_barrio')->dropDownList(ArrayHelper::map(Barrio::find()->all(), 'id', 'nombre')); ?>
            <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'titulo')->textInput() ?>

            <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6">
             
             <input type="hidden" name="markets2" id="markets2" value="coordenadas">    
             <div id="map_remate" class="col-md-12"  style="width:100%;height:380px;"></div>
        </div>
        <div class="col-md-12">

        <?= $form->field($imagen, 'ruta[]')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*' , 'multiple'=>true, 'id'=>'imgRemate'],
            'pluginOptions' => [
            'showUpload'=> false,
            'uploadAsync'=> false,
            'maxFileCount'=> 5,
            'initialPreview'=>$imagenes,
            'initialPreviewConfig'=>$previewconf,
            'initialPreviewAsData'=>true,
            'overwriteInitial'=> false,
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Imagen'
            ]
        ]);?>


        </div>
        <div class="col-md-12 form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
var coord = <?php echo json_encode($model->ubicacion); ?>; 
</script>
