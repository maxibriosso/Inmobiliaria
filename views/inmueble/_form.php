<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Propietario;
use app\models\Barrio;
use app\models\Usuario;


//Modulo para subir imagenes
use kartik\file\FileInput;


/* @var $this yii\web\View */
/* @var $model app\models\Inmueble */
/* @var $form yii\widgets\ActiveForm */

?>


<?php $form = ActiveForm::begin([
    'id'=>'formid',   
    'options' => ['enctype' => 'multipart/form-data']]) ?>
<?php
$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Datos Inmueble',
            'icon' => 'glyphicon glyphicon-home',
            'content' => 
                    '  <div class="col-md-6">'.
                    $form->field($model, 'id_barrio')->dropDownList(ArrayHelper::map(Barrio::find()->all(), 'id', 'nombre')).

                    $form->field($model, 'id_propietario')->dropDownList(ArrayHelper::map(Propietario::find()->all(), 'id', 'nombre')).

                    $form->field($model, 'nombre')->textInput(['maxlength' => true]). 

                    $form->field($model, 'valor')->textInput() .
                    '</div> <div class="col-md-6">'.

                    $form->field($model, 'estado')->dropDownList([ 'A Estrenar' => 'A Estrenar', 'Reciclado' => 'Reciclado', 'Nuevo' => 'Nuevo', 'Reparaciones Menores' => 'Reparaciones Menores', 'Impecable' => 'Impecable', 'Para Reciclar' => 'Para Reciclar', 'En Construccion' => 'En Construccion', 'En pozo' => 'En pozo', ], ['prompt' => '']) .

                    $form->field($model, 'direccion')->textInput(['maxlength' => true]).

                    $form->field($model, 'titulo')->textInput(['maxlength' => true]).

                    '</div>'
                ,
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => ['class' => 'btn btn-success'],
                 ],
             ],
        ],
        2 => [
            'title' => 'Caracteristicas',
            'icon' => 'glyphicon glyphicon-ok',
            'content' => 
                    '<div class="col-md-6">'.

                    $form->field($model, 'amueblado')->checkbox().

                    $form->field($model, 'garage')->checkbox().

                    $form->field($model, 'jardin')->checkbox().
                
                    $form->field($model, 'parrillero')->checkbox().
                    
                    ' </div> <div class="col-md-6">'.
                
                    $form->field($model, 'destacado')->checkbox().

                    $form->field($model, 'favorito')->checkbox().
                        
                    $form->field($model, 'activo')->checkbox().
            
                    $form->field($model, 'prestamo_bancario')->checkbox().

                    ' </div>'
                     ,
            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => ['class' => 'btn btn-success'],
                 ],
                'prev' => [
                    'title' => 'Anterior', 
                    'options' => ['class' => 'btn btn-success'],
                 ],
             ],
            
        ],
        3 => [
            'title' => 'Descripcion',
            'icon' => 'glyphicon glyphicon-pencil',
            'content' => 
                    '<div class="col-md-12">'.

                    $form->field($model, 'descripcion')->textarea(['rows' => 6]).

                    '</div><div class="col-md-6">'.

                    $form->field($model, 'piso')->textInput().

                    $form->field($model, 'tipo')->dropDownList([ 'Casa' => 'Casa', 'Apartamento' => 'Apartamento', 'Local' => 'Local', 'Terreno' => 'Terreno', 'Oficina' => 'Oficina', ], ['prompt' => '']).

                    $form->field($model, 'cantidad_banios')->textInput(). 

                    '</div><div class="col-md-6">'.                  

                    $form->field($model, 'cantidad_habitaciones')->textInput().

                    $form->field($model, 'superficie')->textInput().

                    $form->field($model, 'operacion')->dropDownList([ 'Compra' => 'Compra', 'Alquiler' => 'Alquiler', ], ['prompt' => '']).
                
                    '</div><div class="col-md-12">'.

                    $form->field($imagen, 'imagen[]')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*' , 'multiple'=>true],
                        'pluginOptions' => [
                            'showUpload' => false,
                            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                            'browseLabel' =>  'Imagen'
                        ]
                    ]).

                   '</div>',

            'buttons' => [
                'next' => [
                    'title' => 'Siguiente', 
                    'options' => ['class' => 'btn btn-success'],
                 ],
                'prev' => [
                    'title' => 'Anterior', 
                    'options' => ['class' => 'btn btn-success' ],
                 ],
             ],
        ],
        4 => [
            'title' => 'Ubicacion',
            'icon' => 'glyphicon glyphicon-globe',
            'content' => 
                '<input type="hidden" name="markets" id="markets" value="coordenadas">    
                <div id="map_canvas" class="col-md-12"  style="width:300px;height:300px;border:1px solid black;">
                </div>',
            'buttons' => [
                'prev' => [
                    'title' => 'Anterior', 
                    'options' => ['class' => 'btn btn-success'],
                 ],
                'save' => [
                    'title' => 'Guardar', 
                    'options' => ['class' => 'btn btn-success', 'type' => 'submit'],
                 ],
             ],
        ],
      
    ],
    'complete_content' => "You are done!", // Optional final screen
    'start_step' => 1, // Optional, start with a specific step
];
?>

<?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>
 

<?php ActiveForm::end(); ?>
