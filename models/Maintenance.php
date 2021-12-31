<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maintenance".
 *
 * @property int $id
 * @property int $registration_number
 * @property string $task_description
 * @property string $task_duration
 * @property string $due_date
 * @property string $component
 * @property int $engineer
 *
 * @property Engineer $engineer0
 * @property Aircraft $registrationNumber
 */
class Maintenance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'maintenance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['registration_number', 'task_description', 'task_duration', 'due_date',  'engineer'], 'required'],
         //   [['registration_number', 'engineer'], 'integer'],
         //   [['task_description'], 'string', 'max' => 255],
         //   [['task_duration', 'due_date'], 'string', 'max' => 55],
            [['engineer'], 'exist', 'skipOnError' => true, 'targetClass' => Engineer::className(), 'targetAttribute' => ['engineer' => 'id']],
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
            'task_description' => 'Task Description',
            'task_duration' => 'Task Duration',
            'due_date' => 'Due Date',
            'engineer' => 'Engineer',
        ];
    }

    /**
     * Gets query for [[Engineer0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEngineer0()
    {
        return $this->hasOne(Engineer::className(), ['id' => 'engineer']);
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
