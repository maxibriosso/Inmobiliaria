 <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Propietario;
use app\models\Barrio;
use app\models\Usuario;



/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */
/* @var $form yii\widgets\ActiveForm */

?>             

<div class="col-md-6">
     <?= $form->field($dataset, 'id_barrio')->dropDownList(ArrayHelper::map(Barrio::find()->all(), 'id', 'nombre'))?>

     <?= $form->field($dataset, 'id_propietario')->dropDownList(ArrayHelper::map(Propietario::find()->all(), 'id', 'nombre'))?>

     <?= $form->field($dataset, 'nombre')->textInput(['maxlength' => true]) ?>

     <?= $form->field($dataset, 'valor')->textInput() ?>
</div> 
<div class="col-md-6">

     <?= $form->field($dataset, 'estado')->dropDownList([ 'A Estrenar' => 'A Estrenar', 'Reciclado' => 'Reciclado', 'Nuevo' => 'Nuevo', 'Reparaciones Menores' => 'Reparaciones Menores', 'Impecable' => 'Impecable', 'Para Reciclar' => 'Para Reciclar', 'En Construccion' => 'En Construccion', 'En pozo' => 'En pozo', ], ['prompt' => '']) ?>

     <?= $form->field($dataset, 'direccion')->textInput(['maxlength' => true])?>

     <?= $form->field($dataset, 'titulo')->textInput(['maxlength' => true])?>

</div>