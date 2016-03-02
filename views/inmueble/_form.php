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


<?php $form = ActiveForm::begin([
    'id'=>'formid',   
    'options' => ['enctype' => 'multipart/form-data','role' => 'form']]) ?>
<?php
$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Datos Inmueble',
            'icon' => 'glyphicon glyphicon-home',
            'content' => $this->render('_step1', ['form' => $form, 'dataset' => $model]),
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
            'content' => $this->render('_step2', ['form' => $form, 'dataset' => $model]),
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
            'content' =>$this->render('_step3', ['form' => $form, 'dataset' => $model]),
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
            'content' => $this->render('_step4', ['form' => $form, 'dataset' => $model]),
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

<script type="text/javascript">
var coordGuardadas = <?php echo json_encode($model->coord); ?>; 
</script>
