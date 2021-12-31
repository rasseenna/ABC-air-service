<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Engineer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="engineer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'type')->dropdownList([
        'Technician'=>'Technician',
        'Service Engineer'=>'Service Engineer',
        'Mechanic'=>'Mechanic'
    ],
    ['prompt'=>'Select Engineer Type']
);
    ?>
        <?php echo $form->field($model, 'component')->dropdownList([
        'Fuselage'=>'Fuselage',
        'Wings'=>'Wings',
        'Empennage'=>'Empennage',
        'Power Plant'=>'Power Plant',
        'Landing Gear'=>'Landing Gear'
    ],
    ['prompt'=>'Select Component in which Engineer Specialise']
);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
