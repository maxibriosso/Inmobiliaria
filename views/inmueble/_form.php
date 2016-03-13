<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Propietario;
use app\models\Barrio;
use app\models\Usuario;


$baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
$this->registerJsFile($baseUrl.'/js/localizacionMapa.js');
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
                    'options' => ['class' => 'btn btn-success btn-wizard-a'],
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
                    'options' => ['class' => 'btn btn-success  btn-wizard-a'],
                 ],
                'prev' => [
                    'title' => 'Anterior', 
                    'options' => ['class' => 'btn btn-success  btn-wizard-b'],
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
                    'options' => ['class' => 'btn btn-success  btn-wizard-a'],
                 ],
                'prev' => [
                    'title' => 'Anterior', 
                    'options' => ['class' => 'btn btn-success  btn-wizard-b' ],
                 ],
             ],
        ],
        4 => [
            'title' => 'Ubicacion',
            'icon' => 'glyphicon glyphicon-globe',
            'content' => $this->render('_step4', ['form' => $form, 'dataset' => $model]),
            'buttons' => [
                'save' => [
                    'title' => 'Guardar', 
                    'options' => ['class' => 'btn btn-success  btn-wizard-a', 'type' => 'submit'],
                 ],
                'prev' => [
                    'title' => 'Anterior', 
                    'options' => ['class' => 'btn btn-success  btn-wizard-s'],
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



