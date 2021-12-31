<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Aircraft */

$this->title = $model->registration_number;
$this->params['breadcrumbs'][] = ['label' => 'Aircrafts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aircraft-view">
<style>
body{
 background-image: url("../images/aircraft4.jpg") !important;
 background-repeat: no-repeat !important;
 background-size: cover !important;  
}
</style>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'id',
            'registration_number',
            'manufacturer',
            'serial_number',
            'model',
        ],
    ]) ?>

</div>
