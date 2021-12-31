<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AircraftSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aircrafts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aircraft-index">
<style>
body{
 background-image: url("../images/aircraft4.jpg") !important;
 background-repeat: no-repeat !important;
 background-size: cover !important;  
}
</style>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aircraft', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id',
            'registration_number',
            'manufacturer',
            'serial_number',
            'model',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
