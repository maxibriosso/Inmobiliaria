<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Propietario;
use app\models\Barrio;
use app\models\Usuario;
use kartik\switchinput\SwitchInput;
use toxor88\switchery\Switchery;

/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="col-md-6">

   <?= 

   $form->field($dataset, 'amueblado')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX,
            'pluginOptions' => [
                'onText' => 'Si',
                'offText' => 'No',
            ],
        ]);
   ?>

   <?= 


    $form->field($dataset, 'garage')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX,
            'pluginOptions' => [
                'onText' => 'Si',
                'offText' => 'No',
            ],
        ]);

   ?>

   <?= 


/*       $form->field($dataset, 'jardin')->widget(Switchery::classname(),[
            'name'=>'jardin',
            'clientOptions' => [
                'color'              => '#337ab7',
                'secondaryColor'     => '#232323',
                'jackColor'          => '#fff',
                'jackSecondaryColor' => null,
                'className'          => 'switchery',
                'disabled'           => false,
                'disabledOpacity'    => 0.6,
                'speed'              => '0.1s',
                'size'               => 'default',
            ],
        ])->label(false);*/

       $form->field($dataset, 'jardin')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX,
            'pluginOptions' => [
                'onText' => 'Si',
                'offText' => 'No',
            ],
        ]);

   ?>
                
   <?= 
        $form->field($dataset, 'parrillero')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX,
            'pluginOptions' => [
                'onText' => 'Si',
                'offText' => 'No',
            ],
        ]);
    ?>
                    
</div> 
<div class="col-md-6">
                
   <?= 
        $form->field($dataset, 'destacado')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX,
            'pluginOptions' => [
                'onText' => 'Si',
                'offText' => 'No',
            ],
        ]);
   ?>

   <?= $form->field($dataset, 'favorito')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX,
            'pluginOptions' => [
                'onText' => 'Si',
                'offText' => 'No',
            ],
        ]); 
    ?>
                        
   <?= 
        $form->field($dataset, 'activo')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX,
            'pluginOptions' => [
                'onText' => 'Si',
                'offText' => 'No',
            ],
        ]);
    ?>
            
   <?= 
        $form->field($dataset, 'prestamo_bancario')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX,
            'pluginOptions' => [
                'onText' => 'Si',
                'offText' => 'No',
            ],
        ]);

   ?>

</div>