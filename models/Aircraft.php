<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aircraft".
 *
 * @property int $id
 * @property string $registration_number
 * @property string $manufacturer
 * @property string $serial_number
 * @property string $model
 *
 * @property Flightlog[] $flightlogs
 * @property Maintenance[] $maintenances
 */
class Aircraft extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aircraft';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['registration_number', 'manufacturer', 'serial_number', 'model'], 'required'],
            [['registration_number', 'manufacturer', 'serial_number', 'model'], 'string', 'max' => 55],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registration_number' => 'Aircraft Registration Number',
            'manufacturer' => 'Manufacturer',
            'serial_number' => 'Serial Number',
            'model' => 'Model',
        ];
    }

    /**
     * Gets query for [[Flightlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlightlogs()
    {
        return $this->hasMany(Flightlog::className(), ['registration_number' => 'id']);
    }

    /**
     * Gets query for [[Maintenances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenances()
    {
        return $this->hasMany(Maintenance::className(), ['registration_number' => 'id']);
    }
}
