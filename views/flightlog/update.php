<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Flightlog */

$this->title = 'Update Flightlog: ';
$this->params['breadcrumbs'][] = ['label' => 'Flightlogs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="flightlog-update">
<style>
body{
 background-image: url("../images/aircraft4.jpg") !important;
 background-repeat: no-repeat !important;
 background-size: cover !important;  
}
.help-block {
    color: red !important;
}
</style>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
