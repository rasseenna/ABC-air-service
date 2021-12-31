<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flightlog".
 *
 * @property int $id
 * @property int $registration_number
 * @property string $total_flight_hours
 *
 * @property Aircraft $registrationNumber
 */
class Flightlog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flightlog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['registration_number', 'total_flight_hours'], 'required'],
            [['registration_number'], 'integer'],
            [['total_flight_hours'], 'string', 'max' => 55],
            [['registration_number'], 'exist', 'skipOnError' => true, 'targetClass' => Aircraft::className(), 'targetAttribute' => ['registration_number' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registration_number' => 'Registration Number',
            'total_flight_hours' => 'Total Flight Hours',
        ];
    }

    /**
     * Gets query for [[RegistrationNumber]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrationNumber()
    {
        return $this->hasOne(Aircraft::className(), ['id' => 'registration_number']);
    }
}
