<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Aircraft;
use app\models\Engineer;
use yii\helpers\ArrayHelper;
 // use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Maintenance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintenance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $aircrafts = Aircraft::find()->all();
    $listData = ArrayHelper::map($aircrafts,'id','registration_number');

    echo $form->field($model, 'registration_number')->dropDownList(
        $listData,
        ['prompt'=>'Select Aircraft']
        );
    ?>

    <?= $form->field($model, 'task_description')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'task_duration')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'due_date')->textInput(['maxlength' => true]) ?>
    <?php // $form->field($model,'due_date')->widget(DatePicker::className(),['clientOptions' => ['dateFormat' => 'yy-mm-dd']]) ?>
    <?= $form->field($model, 'due_date')->widget(\yii\jui\DatePicker::class, [
        //'language' => 'ru',
        'dateFormat' => 'php:d-m-Y',
        'clientOptions' => [
            'changeMonth' => true,
            //'changeYear' => true,
            'showButtonPanel' => true,
            'minDate' => 'date("d-m-Y")',
            'yearRange' => '1990:date(Y)',
            'showToday'=> false,
        ],
        'options' => ['class' => 'form-control', 'readOnly' => true, 'placeholder' => 'Enter the Publish Date', 'value' => date('d-m-Y')],
    ])
    ?>

    <?php 
    $engineers  = Engineer::find()->all();
    $listData = ArrayHelper::map($engineers,'id','name','type');

    echo $form->field($model, 'engineer')->dropDownList(
        $listData,
        ['prompt'=>'Select Engineer']
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
