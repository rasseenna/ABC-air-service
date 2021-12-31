<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Aircraft;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\FlightlogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flightlog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>


<?php 

$aircrafts=Aircraft::find()->all();

$listData=ArrayHelper::map($aircrafts,'id','registration_number');

echo $form->field($model, 'registration_number')->dropDownList(
        $listData,
        ['prompt'=>'Select...']
        );

        ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
