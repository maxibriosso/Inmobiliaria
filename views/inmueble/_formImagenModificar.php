<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Inmueble;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Imagen */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="imagen-form">

    <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data','id'=>'formImg2']]) ?>

    <?= $form->field($model, 'imagen[]')->fileInput(['multiple' => true, 'accept' => 'image/*','id'=>'img2']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?> 


</div>
<script type="text/javascript">
var imagenes = <?php echo json_encode($imagenes); ?>;
var conf = <?php echo json_encode($previewconf); ?>;
var desc = <?php echo json_encode($descripcion); ?>;
var idInmueble = <?php echo json_encode($id); ?>;
var destacada = <?php echo json_encode($destacada); ?>;





</script>