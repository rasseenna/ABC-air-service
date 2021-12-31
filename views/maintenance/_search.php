<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Aircraft;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\MaintenanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintenance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php // $form->field($model, 'id') ?>

    <?php 

$aircrafts=Aircraft::find()->all();

$listData=ArrayHelper::map($aircrafts,'id','registration_number');

echo $form->field($model, 'registration_number')->dropDownList(
        $listData,
        ['prompt'=>'Select...']
        );

        ?>

    <?php // $form->field($model, 'task_description') ?>

    <?php // $form->field($model, 'task_duration') ?>

    <?php // $form->field($model, 'due_date') ?>

    <?php // echo $form->field($model, 'engineer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
