<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'ABC-Air Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<style>
body{
 background-image: url("../images/aircraft2.jpg") !important;
 background-repeat: no-repeat !important;
 background-size: cover !important;  
}
</style>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

</br>

</br>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            &nbsp; &nbsp;
            &nbsp; &nbsp;
            &nbsp; &nbsp;
            
                <?= Html::a('Sign Up', ['site/signup'], ['class' => 'btn btn-lg btn-success']) ?>
                
            </div>
        </div>
        

    <?php ActiveForm::end(); ?>


</div>
