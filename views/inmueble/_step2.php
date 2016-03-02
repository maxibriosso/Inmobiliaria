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

   <?= $form->field($dataset, 'amueblado')->checkbox() ?>

   <?= $form->field($dataset, 'garage')->checkbox() ?>

   <?= $form->field($dataset, 'jardin')->checkbox() ?>
                
   <?= $form->field($dataset, 'parrillero')->checkbox() ?>
                    
</div> 
<div class="col-md-6">
                
   <?= $form->field($dataset, 'destacado')->checkbox() ?>

   <?= $form->field($dataset, 'favorito')->checkbox() ?>
                        
   <?= $form->field($dataset, 'activo')->checkbox() ?>
            
   <?= $form->field($dataset, 'prestamo_bancario')->checkbox() ?>

</div>