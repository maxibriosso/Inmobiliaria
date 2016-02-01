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

        <div class="form-group">
            <h3>1</h3>
            <section>
                <div class="col-md-6">
                    <?= $form->field($model, 'id_barrio')->dropDownList(ArrayHelper::map(Barrio::find()->all(), 'id', 'nombre'))?>

                    <?= $form->field($model, 'id_propietario')->dropDownList(ArrayHelper::map(Propietario::find()->all(), 'id', 'nombre'))?>

                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'valor')->textInput() ?>
                </div>        
                <div class="col-md-6">
                    <?= $form->field($model, 'estado')->dropDownList([ 'A Estrenar' => 'A Estrenar', 'Reciclado' => 'Reciclado', 'Nuevo' => 'Nuevo', 'Reparaciones Menores' => 'Reparaciones Menores', 'Impecable' => 'Impecable', 'Para Reciclar' => 'Para Reciclar', 'En Construccion' => 'En Construccion', 'En pozo' => 'En pozo', ], ['prompt' => '']) ?>

                    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>                
                </div>      

              
            </section>
            <h3>2</h3>
            <section>
                <div class="col-md-6">
                    <?= $form->field($model, 'amueblado')->checkbox(); ?>

                    <?= $form->field($model, 'garage')->checkbox(); ?>

                    <?= $form->field($model, 'jardin')->checkbox(); ?>
                
                    <?= $form->field($model, 'parrillero')->checkbox(); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'destacado')->checkbox(); ?>

                    <?= $form->field($model, 'favorito')->checkbox(); ?>
                        
                    <?= $form->field($model, 'activo')->checkbox(); ?>
            
                    <?= $form->field($model, 'prestamo_bancario')->checkbox(); ?>
                </div>
            </section>
            <h3>3</h3>
            <section>
                <div class="col-md-6">
                    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'piso')->textInput() ?>

                    <?= $form->field($model, 'tipo')->dropDownList([ 'Casa' => 'Casa', 'Apartamento' => 'Apartamento', 'Local' => 'Local', 'Terreno' => 'Terreno', 'Oficina' => 'Oficina', ], ['prompt' => '']) ?>

                    <?= $form->field($model, 'cantidad_banios')->textInput() ?>                    
                </div>
                <div class="col-md-6">
                    <!--<?= $form->field($model, 'coord')->textarea(['rows' => 6]) ?>-->

                    <?= $form->field($model, 'cantidad_habitaciones')->textInput() ?>

                    <?= $form->field($model, 'superficie')->textInput() ?>

                    <?= $form->field($model, 'operacion')->dropDownList([ 'Compra' => 'Compra', 'Alquiler' => 'Alquiler', ], ['prompt' => '']) ?>
                </div>

                <div class="col-md-12">
                <!--Alta modelo imagen-->
                    <?php echo $form->field($imagen, 'imagen[]')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*' , 'multiple'=>true],
                        'pluginOptions' => [
                            'showUpload' => false,
                            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                            'browseLabel' =>  'Imagen'
                        ]
                    ]); ?>

                    
                </div>
            </section>
             <h3>4</h3>
            <section>
              
                <div class="col-md-6" >
                    <!--<?= $form->field($model, 'coord')->textarea(['rows' => 6]) ?>-->

                     <article>
                    </article>

                   <!-- <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                   </div> -->
                </div>

               
            </section>
            
        </div>

    

    <?php ActiveForm::end(); ?>
