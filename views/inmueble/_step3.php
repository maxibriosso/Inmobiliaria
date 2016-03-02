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

<div class="col-md-12">

    <?= $form->field($dataset, 'descripcion')->textarea(['rows' => 6])?>

</div>
<div class="col-md-6">

    <?= $form->field($dataset, 'piso')->textInput()?>

    <?= $form->field($dataset, 'tipo')->dropDownList([ 'Casa' => 'Casa', 'Apartamento' => 'Apartamento', 'Local' => 'Local', 'Terreno' => 'Terreno', 'Oficina' => 'Oficina', ], ['prompt' => ''])?>

    <?= $form->field($dataset, 'cantidad_banios')->textInput()?>

</div>
<div class="col-md-6">                  

    <?= $form->field($dataset, 'cantidad_habitaciones')->textInput()?>

    <?= $form->field($dataset, 'superficie')->textInput()?>

    <?= $form->field($dataset, 'operacion')->dropDownList([ 'Compra' => 'Compra', 'Alquiler' => 'Alquiler', ], ['prompt' => ''])?>
                
</div>