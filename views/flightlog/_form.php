<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Aircraft;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Flightlog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flightlog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 

$aircrafts=Aircraft::find()->all();

$listData=ArrayHelper::map($aircrafts,'id','registration_number');

echo $form->field($model, 'registration_number')->dropDownList(
        $listData,
        ['prompt'=>'Select...']
        );

        ?>

    <?= $form->field($model, 'total_flight_hours')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
